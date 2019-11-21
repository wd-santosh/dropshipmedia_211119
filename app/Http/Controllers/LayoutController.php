<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use App\Models\customer_orders_model;

class LayoutController extends Controller
{
	public function custvideo($id)
	{
		$customer=customer_orders_model::where('id', $id)->first();
		$user = Auth::user();
		$filesArray = array();		
		if (file_exists('public/customer_videos/customer_'.$user->id.'_'.$id)) {
			$path = 'public/customer_videos/customer_'.$user->id.'_'.$id.'/output';
		    $files = $this->scan_dir($path);		        
		    if(is_array($files) && sizeof($files)>0){
				foreach($files as $videofile){
					if($videofile != '.' && $videofile != '..'){
						array_push($filesArray,$path.'/'.$videofile);
					}
				}	
			}
		}		
		return view('layouts/editVideo/customerEditVideo')->with(['customer_data'=>$customer,'files'=>$filesArray]);
	} 
    public function scan_dir($dir) {
	    $ignored = array('.', '..', '.svn', '.htaccess');

	    $files = array();    
	    foreach (scandir($dir) as $file) {
	        if (in_array($file, $ignored)) continue;
	        $files[$file] = filemtime($dir . '/' . $file);
	    }

	    arsort($files);
	    $files = array_keys($files);

	    return ($files) ? $files : false;
	}
}
