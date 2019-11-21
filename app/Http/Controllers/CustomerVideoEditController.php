<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\customer_orders_model;
use App\User;
use DB;

class CustomerVideoEditController extends Controller
{
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
	public function deleteFile(Request $request)
	{
		$cidsplit = $request->post('id');
		$fileURL = $request->post('url');
		$cid = explode('_',$cidsplit);
		$user = Auth::user();		
		if(unlink($fileURL)){
			$path = 'public/customer_videos/customer_'.$user->id.'_'.$cid[1].'/output';
			$files = $this->scan_dir($path);			
		    if(!is_array($files))
		    {
				$path1 = 'public/customer_videos/customer_'.$user->id.'_'.$cid[1].'/last_video';
				$files_last = $this->scan_dir($path1);
				if(is_array($files_last) && sizeof($files_last)>0)
				{
					foreach($files_last as $videofile1){
						$p1 = 'public/customer_videos/customer_'.$user->id.'_'.$cid[1].'/last_video/'.$videofile1;
						unlink($p1);
					}				
				}
			}			
			echo json_encode(array('status'=>TRUE,'response'=>"success"));	
		}else{
			echo json_encode(array('status'=>FALSE,'response'=>"error"));	
		}
	}
	public function saveOutput(Request $request)
	{
		$cid = $request->post('id');
		$idArray = explode('_',$cid);
		
		$fileURL = $request->post('url');
		$user = Auth::user();
		\File::copy(base_path($fileURL),base_path('public/img/video/customer_video_'.$user->id.'_'.$idArray[1].'.mp4'));

		$isUpdate = customer_orders_model::where('id',$idArray[1])->update(['employe_video'=>'/img/video/customer_video_'.$user->id.'.mp4']);
		if($isUpdate){
			$path = 'public/customer_videos/customer_'.$user->id.'_'.$idArray[1].'/output';
			$files = $this->scan_dir($path);			
		    if(is_array($files) && sizeof($files)>0){
				foreach($files as $videofile){
					if($videofile != '.' && $videofile != '..'){
						$p = 'public/customer_videos/customer_'.$user->id.'_'.$idArray[1].'/output/'.$videofile;
						unlink($p);
					}
				}	
			}
			$path1 = 'public/customer_videos/customer_'.$user->id.'_'.$idArray[1].'/last_video';
			$files_last = $this->scan_dir($path1);
			if(is_array($files_last) && sizeof($files_last)>0)
			{
				foreach($files_last as $videofile1){
					$p1 = 'public/customer_videos/customer_'.$user->id.'_'.$idArray[1].'/last_video/'.$videofile1;
					unlink($p1);
				}				
			}
			echo json_encode(array('status'=>TRUE,'response'=>"success"));	
		}else{
			echo json_encode(array('status'=>FALSE,'response'=>"error"));	
		}
	}
	public function logosetting(Request $request){
		$response = "";
		try{			
			$logosize = $request->post('logosize');
			$logoposition = $request->post('logoposition');
			$logopacity = $request->post('logopacity');		
			$vidid =  $request->post('vidid');
			$user = Auth::user();
			if ($request->hasFile('file0')){
				$file = $request->file('file0');				
				$ext = $file->getClientOriginalExtension();
				$filename = "LOGO_CUSTOMERID_".$user->id.'_'.time().'.'.$ext;			
				$destinationPath = 'public/img/order_logo';
				$file->move($destinationPath,$filename);
				DB::table('customer_orders')->where('id', $vidid)->update(['logo' => "img/order_logo/".$filename]);
			}
					
			if (!file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {			  
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid, 0777, true);
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video', 0777, true);
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output', 0777, true);
			}
			$customer = customer_orders_model::where('id', $vidid)->first();
								
			if($logoposition != "")
			{
				$logoPath = '/var/www/html/public/'.$customer->logo;
				$path = 'public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output';
				$files = $this->scan_dir($path);
							    
				$counter = rand(10,9999999999);		
					
				$path = '/var/www/html/public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$counter.'.mp4';
				
				if (!is_array($files)) {
				    $video = $customer->employe_video;
				}
				else{					
					$video = 'customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4';
				}
				
				$audio_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams a -of json /var/www/html/public/'.$video);
				$video_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams v -of json /var/www/html/public/'.$video);				
				$audio_info = json_decode($audio_codec_info_json,TRUE);
				$video_info = json_decode($video_codec_info_json,TRUE);
				$v_codecName = "";
				$a_codecName = "";$pixformat ="";
				if(sizeof($video_info)>0)
				{
					$v_codecName = $video_info['streams'][0]['codec_name'];
					$pixformat = $video_info['streams'][0]['pix_fmt'];
				}
				if(sizeof($audio_info)>0)
				{
					$a_codecName = $audio_info['streams'][0]['codec_name'];
				}				
				switch($logoposition)
				{					
					case "topleft":					
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w*0.01:y=main_h*0.01" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);					
					break;
					case "topright":					
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w-overlay_w-(main_w*0.01):y=main_h*0.01" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
					break;
					case "center":
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=(main_w-overlay_w)/2:y=(main_h-overlay_h)/2" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
					break;
					case "bottomleft":
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w*0.01:y=main_h-overlay_h-(main_h*0.01)" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
					break;
					case "bottomright":					
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w-overlay_w-(main_w*0.01):y=main_h-overlay_h-(main_h*0.01)" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
					break;
				}	
				echo json_encode(array('status'=>TRUE,'response'=>$response));	 
			}
			else
			{
				$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w*0.01:y=main_h*0.01" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
				echo json_encode(array('status'=>TRUE,'response'=>$response));	 
			}		
			if (file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {
				$f = $this->scan_dir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/');
			    \File::copy(base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$f[0]),base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4'));
			}			
		}
		catch(\Exception $e){			
		}
	}
	public function music(Request $request)
	{
		$response = "";
		try{	
		$filepath = "";						
			$vidid =  $request->post('vidid');
			$user = Auth::user();
			if ($request->hasFile('file0')){
				$file = $request->file('file0');				
				$ext = $file->getClientOriginalExtension();
				$filename = "Music_CUSTOMERID_".$user->id.'_'.time().'.'.$ext;			
				$destinationPath = 'public/img/order_logo';
				$file->move($destinationPath,$filename);
				$filepath = 'img/order_logo/'.$filename;
			}
					
			if (!file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {			   
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid, 0777, true);
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video', 0777, true);
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output', 0777, true);
			}
			$customer = customer_orders_model::where('id', $vidid)->first();						
			if($vidid != "")
			{
				$logoPath = '/var/www/html/public/'.$filepath;
				$path = 'public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output';
				$files = $this->scan_dir($path);
							    
				$counter = rand(10,9999999999);				
				$path = '/var/www/html/public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$counter.'.mp4';
				
				if (!is_array($files)) {
				    $video = $customer->employe_video;
				}
				else{					
					$video = 'customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4';
				}
				
				$audio_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams a -of json /var/www/html/public/'.$video);
				$video_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams v -of json /var/www/html/public/'.$video);				
				$audio_info = json_decode($audio_codec_info_json,TRUE);
				$video_info = json_decode($video_codec_info_json,TRUE);
				$v_codecName = "";
				$a_codecName = "";$pixformat ="";
				if(sizeof($video_info)>0)
				{
					$v_codecName = $video_info['streams'][0]['codec_name'];
					$pixformat = $video_info['streams'][0]['pix_fmt'];
				}
				if(sizeof($audio_info)>0)
				{
					$a_codecName = $audio_info['streams'][0]['codec_name'];
				}							
				$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -c copy -map 0:v:0 -map 1:a:0 -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);	 
			}					
			if (file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {
				$f = $this->scan_dir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/');
			    \File::copy(base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$f[0]),base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4'));
			}			
		}
		catch(\Exception $e){			
		}
		echo json_encode(array('status'=>TRUE,'response'=>$response));
	}
	public function textsetting(Request $request)
	{
		$response = "";
		try{	
		$filepath = "";						
			$vidid =  $request->post('vidid');
			
			$logofontsize =  $request->post('logofontsize');
			$logotextcolor =  $request->post('logotextcolor');
			$logotextopacity =  $request->post('logotextopacity');
			
			$user = Auth::user();			
					
			if (!file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video', 0777, true);
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output', 0777, true);
			}
			$customer = customer_orders_model::where('id', $vidid)->first();						
			if($logofontsize != "")
			{
				$logoPath = '/var/www/html/public/'.$filepath;
				$path = 'public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output';
				$files = $this->scan_dir($path);
							    
				$counter = rand(10,9999999999);				
				$path = '/var/www/html/public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$counter.'.mp4';
				
				if (!is_array($files)) {
				    $video = $customer->employe_video;
				}
				else{					
					$video = 'customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4';
				}
				
				$audio_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams a -of json /var/www/html/public/'.$video);
				$video_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams v -of json /var/www/html/public/'.$video);				
				$audio_info = json_decode($audio_codec_info_json,TRUE);
				$video_info = json_decode($video_codec_info_json,TRUE);
				$v_codecName = "";
				$a_codecName = "";$pixformat ="";
				if(sizeof($video_info)>0)
				{
					$v_codecName = $video_info['streams'][0]['codec_name'];
					$pixformat = $video_info['streams'][0]['pix_fmt'];
				}
				if(sizeof($audio_info)>0)
				{
					$a_codecName = $audio_info['streams'][0]['codec_name'];
				}

				$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -vf drawtext="text=\''.$logotextopacity.'\': fontcolor='.$logotextcolor.': fontsize='.$logofontsize.':x=(w-text_w)/2: y=(h-text_h)/2"  -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);	 
			}					
			if (file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {
				$f = $this->scan_dir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/');
			    \File::copy(base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$f[0]),base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4'));
			}			
		}
		catch(\Exception $e){			
		}
		echo json_encode(array('status'=>TRUE,'response'=>$response));
		
	}

	public function markwter(Request $request)
	{
		$response = "";
		try{			
			$logosize = $request->post('logosize');
			$logoposition = $request->post('logoposition');
			$logopacity = $request->post('logopacity');		
			$vidid =  $request->post('vidid');
			$user = Auth::user();
			if ($request->hasFile('file0')){
				$file = $request->file('file0');				
				$ext = $file->getClientOriginalExtension();
				$filename = "LOGO_CUSTOMERID_".$user->id.'_'.time().'.'.$ext;			
				$destinationPath = 'public/img/order_logo';
				$file->move($destinationPath,$filename);
				DB::table('customer_orders')->where('id', $vidid)->update(['logo' => "img/order_logo/".$filename]);
			}
					
			if (!file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid, 0777, true);
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video', 0777, true);
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output', 0777, true);
			}
			$customer = customer_orders_model::where('id', $vidid)->first();						
			if($logoposition != "")
			{
				$logoPath = '/var/www/html/public/'.$customer->logo;
				$path = 'public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output';
				$files = $this->scan_dir($path);
							    
				$counter = rand(10,9999999999);				
				$path = '/var/www/html/public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$counter.'.mp4';
				
				if (!is_array($files)) {
				    $video = $customer->employe_video;
				}
				else{					
					$video = 'customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4';
				}
				
				$audio_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams a -of json /var/www/html/public/'.$video);
				$video_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams v -of json /var/www/html/public/'.$video);				
				$audio_info = json_decode($audio_codec_info_json,TRUE);
				$video_info = json_decode($video_codec_info_json,TRUE);
				$v_codecName = "";
				$a_codecName = "";$pixformat ="";
				if(sizeof($video_info)>0)
				{
					$v_codecName = $video_info['streams'][0]['codec_name'];
					$pixformat = $video_info['streams'][0]['pix_fmt'];
				}
				if(sizeof($audio_info)>0)
				{
					$a_codecName = $audio_info['streams'][0]['codec_name'];
				}				
				switch($logoposition)
				{					
					case "topleft":					
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w*0.01:y=main_h*0.01" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);					
					break;
					case "topright":					
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w-overlay_w-(main_w*0.01):y=main_h*0.01" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
					break;
					case "center":
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=(main_w-overlay_w)/2:y=(main_h-overlay_h)/2" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
					break;
					case "bottomleft":
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w*0.01:y=main_h-overlay_h-(main_h*0.01)" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
					break;
					case "bottomright":					
					$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w-overlay_w-(main_w*0.01):y=main_h-overlay_h-(main_h*0.01)" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
					break;
				}	
				echo json_encode(array('status'=>TRUE,'response'=>$response));	 
			}
			else
			{
				$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -i '.$logoPath.' -filter_complex "[1]scale='.$logosize.':'.$logosize.'[b];[0][b] overlay=x=main_w*0.01:y=main_h*0.01" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);
				echo json_encode(array('status'=>TRUE,'response'=>$response));	 
			}		
			if (file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {
				$f = $this->scan_dir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/');
			    \File::copy(base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$f[0]),base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4'));
			}			
		}
		catch(\Exception $e){			
		} 
	}

	public function transtion(Request $request)
	{
		if (request()->ajax()) {
			print_r(request('id'));
			print_r(request('transitionslog'));
			die;
			
		}  
	}

	public function language(Request $request)
	{
		$user = Auth::user();			
		if (!file_exists('public/customer_videos/customer_'.$user->id)) {
		    mkdir('public/customer_videos/customer_'.$user->id, 0777, true);
		}
		$path = 'public/customer_videos/customer_'.$user->id;
	    $files = scandir($path);
	    $total_files = 0;
	    if(sizeof($files)>2){
			foreach($files as $videofile){
				if($videofile != '.' && $videofile != '..'){
					$total_files++;
				}
			}	
		}
		$counter = $total_files + 1;
		$vidid =  $request->post('vidid');
		$customer = customer_orders_model::where('id', $vidid)->first();	
		$video = $customer->employe_video;
		$path = '/var/www/html/public/customer_videos/customer_'.$user->id.'/'.$counter.'.mp4';
		$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -map 0 -c copy -metadata:s:a:1 language=spa '.$path);
		echo json_encode(array('status'=>TRUE,'response'=>$response));	
	}
	public function background(Request $request)
	{
		$response = "";
		try{			
			$color = $request->post('background_color');					
			$vidid =  $request->post('vidid');
			$user = Auth::user();			
					
			if (!file_exists('public/customer_videos/customer_'.$user->id)) {
			    mkdir('public/customer_videos/customer_'.$user->id, 0777, true);
			}						
			$customer = customer_orders_model::where('id', $vidid)->first();	
			$path = '/var/www/html/public/customer_videos/customer_'.$user->id.'/output.mp4';
			$video = $customer->employe_video;	
								
			if($color != "")
			{				
				$response = shell_exec('ffmpeg -i /var/www/html/public'.$video.' -filter_complex "drawbox=x=0:y=0:w=iw:h=ih:color='.$color.'@0.5:t=max" '.$path);
				
			}						
		}
		catch(\Exception $e){			
		}	
		echo json_encode(array('status'=>TRUE,'response'=>$response));  
		
	}
	public function crop(Request $request)
	{
		$response = "";
		try{	
		$filepath = "";						
			$vidid =  $request->post('vidid');			
			$cropx =  $request->post('cropx');
			$cropy =  $request->post('cropy');
			$cropw =  $request->post('cropw');
			$croph =  $request->post('croph');
						
			$user = Auth::user();			
					
			if (!file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid, 0777, true);
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video', 0777, true);
			    mkdir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output', 0777, true);
			}
			$customer = customer_orders_model::where('id', $vidid)->first();						
			if($cropx != "")
			{
				$logoPath = '/var/www/html/public/'.$filepath;
				$path = 'public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output';
				$files = $this->scan_dir($path);
							    
				$counter = rand(10,9999999999);				
				$path = '/var/www/html/public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$counter.'.mp4';
				
				if (!is_array($files)) {
				    $video = $customer->employe_video;
				}
				else{					
					$video = 'customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4';
				}
				
				$audio_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams a -of json /var/www/html/public/'.$video);
				$video_codec_info_json = shell_exec('ffprobe -v quiet -show_streams -select_streams v -of json /var/www/html/public/'.$video);				
				$audio_info = json_decode($audio_codec_info_json,TRUE);
				$video_info = json_decode($video_codec_info_json,TRUE);
				$v_codecName = "";
				$a_codecName = "";$pixformat ="";
				if(sizeof($video_info)>0)
				{
					$v_codecName = $video_info['streams'][0]['codec_name'];
					$pixformat = $video_info['streams'][0]['pix_fmt'];
				}
				if(sizeof($audio_info)>0)
				{
					$a_codecName = $audio_info['streams'][0]['codec_name'];
				}				
				echo 'ffmpeg -i /var/www/html/public/'.$video.' -filter:v "crop='.$cropw.':'.$croph.':'.$cropx.':'.$cropy.'" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path;
				$response = shell_exec('ffmpeg -i /var/www/html/public/'.$video.' -filter:v "crop='.$cropw.':'.$croph.':'.$cropx.':'.$cropy.'" -c:v '.$v_codecName.' -s hd1080 -pix_fmt '.$pixformat.' -c:a '.$a_codecName.' '.$path);	 
			}					
			if (file_exists('public/customer_videos/customer_'.$user->id.'_'.$vidid)) {
				$f = $this->scan_dir('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/');
			    \File::copy(base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/output/'.$f[0]),base_path('public/customer_videos/customer_'.$user->id.'_'.$vidid.'/last_video/output.mp4'));
			}			
		}
		catch(\Exception $e){			
		}
		echo json_encode(array('status'=>TRUE,'response'=>$response)); 
	}

	public function delete(Request $request)
	{
		if (request()->ajax()) {
			print_r(request('id'));
			print_r(request('deletelog'));
			die;
			
		}  
	}

}
