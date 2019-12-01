<?php
namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\customer_orders_model;
use App\Models\masters_model;
use App\Models\gender_model;
use App\Models\music_model;
use App\Models\videos_model;
use App\Service;
use App\Models\order_link;
use DB;
use App\Models\non_subscribe_member_model;
use App\Models\subscribe_member_model;
use App\Models\master_thumbnails_model;
use App\Models\customers;
use App\Order;
use App\PayPal;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AudioValidation;
use App\Events\Customer_Order_Event;

class CustomerController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function viewCreateVideos(Request $request, $id = NULL) {
       if(Auth::user()->role_id == 1)
       {
        $gender = gender_model::select('*')->get();
        $music = music_model::select('*')->get();
        if (!empty($id) && $id != NULL) {
          $cusOrdrid = customer_orders_model::findorfail($id);
        } else {
          $cusOrdrid = '';
        }
        return view('create-video')->with(['gender' => $gender, 'music' => $music, 'selectdOrder' => $cusOrdrid]);
      }
      else{
       return view('errors/404');
     }
   }
   public function faq(){
    return view('/faq');
   }
   public function orderDetails(Request $request, $orderId = NULL)
   {
	    try{
	      if(Auth::user()->role_id == 1){
	      	$customer_orders_all = customer_orders_model::where(['customer_id'=>Auth::user()->id])->get();
	        $customer_orders = customer_orders_model::where(['customer_id'=>Auth::user()->id,'id'=>$orderId])->get();
	        $items = order_link::where(['customer_id'=>Auth::user()->id,'customer_order_id'=>$orderId])->get();
	        $customer_orders = customer_orders_model::where(['customer_id'=>Auth::user()->id,'id'=>$orderId])->get();
	        
	        return view('customer.order_details',["customer"=> $customer_orders_all,"order"=> $customer_orders,"items"=>$items]);
	      }else{
	       return view('errors/404');
	     }
	   }catch(\Exception $e){
	    return response()->json(array('status'=>FALSE,'error' => $e->getMessage()));
	  }
  }
  public function customerlist()
  {
	    try{
	      if(Auth::user()->role_id == 1){
	        $customer_orders = customer_orders_model::where(['customer_id'=>Auth::user()->id])->get();
	        return view('customer.customer_dashboard',["customer"=> $customer_orders]);
	      }else{
	       return view('errors/404');
	     }
	   }catch(\Exception $e){
	    return response()->json(array('status'=>FALSE,'error' => $e->getMessage()));
	  }
  }
  public function customerprofile()
  {
	  return view('customer/customerprofile');
  }
  public function downloadvideo($videoId)
  {
	  $book_cover = customer_orders_model::where('id', $videoId)->firstOrFail();
	  $path = public_path(). $book_cover->employe_video;
	  return response()->download($path, $book_cover
	   ->original_filename, ['Content-Type' => $book_cover->mime]);

  }
  public function storeFirstPageData(Request $request) {
    try{		
		  	
		$file = $request->file('logo');
		$logo_file_name = $file->getClientOriginalName();
		$logoPath = public_path() . "/img/order_logo";
	    $priv = 0777;
	    if (!file_exists($logoPath)) {
	       mkdir($logoPath, $priv) ? true : false;
	    }
        $file->move($logoPath, $logo_file_name);
        
        $posts = $request->post();  
        $customerData = new customer_orders_model();
        $customerid=Auth::user()->id;
        $customerData->terms_condition = $posts['terms'];
        $customerData->dilvery_day = $posts['isDeliverSelected'];
        $customerData->thumbnail = $posts['isThumbnailSelected'];
        $customerData->videos_orders = $posts['how_many_orders'];
        $customerData->website_link = $posts['main_website_link'];          
        $customerData->product_link = $posts['main_product_link'];
        $customerData->logo = $logoPath . $logo_file_name;
        $customerData->customer_id = Auth::user()->id;
        $customerData->save();
        if($customerData->dilvery_day == "Yes"){
            $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P1D'));
            $customerData->customer_order_time = $dayAfterTomorrow;
            $customerData->save();
        }
        else
        {
           $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P3D'));
            $customerData->customer_order_time = $dayAfterTomorrow;
            $customerData->save();
        }

        event(new Customer_Order_Event($customerid));
        $cust_orderId = $customerData->id;
        $prod_links = explode(",",$posts['pro_link']);
        $web_link = explode(",",$posts['web_link']);
        for($i=0;$i<count($prod_links);$i++){
            DB::table('order_link')->insertGetId(['customer_id' =>Auth::user()->id,'customer_order_id' =>$cust_orderId,"website_link" =>$web_link[$i], "product_link" => $prod_links[$i]]);
        }
        // Create Order For Customer
	     $transacionId = rand(10000000,99999999);
	     $order = new Order();
	     $order->user_id = Auth::user()->id;
	     $order->transaction_id = $transacionId;
	     $order->service_id = 0;
	     $order->amount = $posts['price'];
	     $order->save(); 
	     return response()->json(array('status'=>TRUE,'message' =>'success','transaction_id' =>encrypt($transacionId)));

	   }catch(\Exception $e){
	     return response()->json(array('status'=>FALSE,'error' => $e->getMessage()));
	   }
   }
   public function selectVideo(Request $request, $id = NULL) {
	  $thumbnailsVideo = master_thumbnails_model::select('*')->get();        
	  $videos = videos_model::select('*')->get();
	  $cusOrderId = $request->id;
	  return view('select-video')->with(['videos' => $videos, 'CusId' => $cusOrderId, 'thumbnails' =>$thumbnailsVideo]);
   }
   public function storeSelectVideoData(Request $request) {
	  if (request()->ajax()) {
	    $posts = $request->post();
	    $customerId = $request->_orderIdForMusic;
	    $selectdVideoByCust = $request->selectedVdeo;
	    $customerOrder = customer_orders_model::findorfail($customerId);
	    $customerOrder->video_id = $selectdVideoByCust ;
	    $customerOrder->thumbnail_video = $request->_thumbVideoId;
	    $customerOrder->save();
	    if ($file = $request->file('music')) {
	      $path = public_path() . "/img/order_music";
	      $priv = 0777;
	      if (!file_exists($path)) {
	        mkdir($path, $priv) ? true : false; //
	      }
	      $name = $file->getClientOriginalName();
	      $file->move($path, $name);               
	      if (!empty($customerId)) {
	        $custumrOrdMusic = customer_orders_model::findorfail($customerId);
	        $custumrOrdMusic->music_type = trim('img/order_music/' . $name);
	        $custumrOrdMusic->save();
	      }
	    }
	    if ($file = $request->file('logo')) {
	      $path = public_path() . "/img/order_logo";
	      $priv = 0777;
	      if (!file_exists($path)) {
	        mkdir($path, $priv) ? true : false; //
	      }
	      $logoName = $file->getClientOriginalName();
	      $file->move($path, $logoName);
	      if (!empty($customerId)) {
	        $custumrOrdLogo = customer_orders_model::findorfail($customerId);
	        $custumrOrdLogo->logo = 'img/order_logo/' . $logoName;
	        $custumrOrdLogo->save();
	      }
	    }
	  }
	  if ($customerOrder) {
	    return response()->json(array('message' => 'success', 'cus_id' => $customerId));
	  } else {
	    return response()->json(array('error' => 'Something went wrong!!'));
	  }
   }
   public function bakToCreateVideo(Request $request) {
      if (request()->ajax()) {
        $posts = $request->post();
        $id = $posts['cusOrderId'];
        $selectdOrderByCust = customer_orders_model::findorfail($id);
      }
      if ($selectdOrderByCust) {
        return response()->json(array('message' => 'success', 'cusSelectdOrder' => $selectdOrderByCust));
      } else {
        return response()->json(array('error' => 'Something went wrong!!'));
      }
   } 
   public function addCustomerComment(Request $request) {
      if (request()->ajax()) {
        $posts = $request->post();           
        $orderIdForComment = $posts['orderIdCom'];
        $findOrderForComment = customer_orders_model::findorfail($orderIdForComment);
        $findOrderForComment->change_stop_scroll = $posts['change_scroll'];
         $findOrderForComment->CommentByCustomer=$posts['cust_comment'];
         $dayAfterTomorrow = (new \DateTime())->add(new \DateInterval('P1D'));
         $findOrderForComment->customer_order_time = $dayAfterTomorrow;
         $findOrderForComment->save();
      }
      if ($findOrderForComment) {
        return response()->json(array('message' => 'success', 'orderIdForComment' => $orderIdForComment));
      } else {
        return response()->json(array('error' => 'Something went wrong!!'));
      }
    }    
    public function ViewcustList(){
      $custDetail=User::where('role_id','1')->get();
      return view('admin/customerDetail')->with('custDetail',$custDetail);
    }
    public function ViewcustOrder(){
     $custOrder = customer_orders_model::with(['customerData', 'customerData.getPaymentStatus'])->get();
     return view('admin/customerOrder',['custOrder'=> $custOrder]);
   }
   public function approvedVideoByCus(Request $request){
    if ($request->isMethod('post') && $request->ajax()){
      $posts = $request->post();
      $custOrder = new customer_orders_model();
      $orderId = $posts['order_id'];        
      $custOrder = customer_orders_model::findorfail($orderId);
      $custOrder->approved_status = 1;
      $custOrder->save();   
    }
    if ($custOrder) {
      return response()->json(array('message' => 'success'));
    } else {
      return response()->json(array('error' => 'Something went wrong!!'));
    }
  }
}
