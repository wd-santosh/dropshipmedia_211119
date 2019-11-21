<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EditorController extends Controller
{
    public function __construct()
    {
		//$this->middleware('auth');
	}
	public function apply(Request $request)
	{
		$cleanData = $request->post('video_data');		
		
			if($cleanData["logosize"] != "" && $cleanData["logoposition"] != "")
			{
				$pos = "";
			if($cleanData['logoposition'] != "")
			{				
				if($cleanData['logoposition'] == "topleft"){
					$pos = "overlay=10:10";		
				}
				if($cleanData['logoposition'] == "topcenter"){
					$pos = "overlay=(main_w-overlay_w)/2:10";		
				}
				if($cleanData['logoposition'] == "topright"){
					$pos = "overlay=(main_w-overlay_w)-10:10";	
				}
				if($cleanData['logoposition'] == "centerleft"){
					$pos = "overlay=5:(main_h-overlay_h)/2";
				}
				if($cleanData['logoposition'] == "center"){
					$pos = "overlay=(main_w-overlay_w)/2:(main_h-overlay_h)/2";
				}
				if($cleanData['logoposition'] == "centerright"){
					$pos = "overlay=(main_w-overlay_w)/2:10";
				}
				if($cleanData['logoposition'] == "bottomleft"){
					$pos = "overlay=5:main_h-overlay_h";
				}
				if($cleanData['logoposition'] == "bottomcenter"){
					$pos = "overlay=main_w-overlay_w/2:main_h-overlay_h";
				}
				if($cleanData['logoposition'] == "bottomright"){
					$pos = "overlay=main_w-overlay_w-10:main_h-overlay_h-10";
				}
			}
			$command = FFMPEG_PATH." -i ".public_path('videos\BigBuckBunny_320x180.mp4')." -i ".public_path('logo\logo.jpg')."  -filter_complex \"".$pos."\" -filter_complex \"[0:v][1:v]scale=".$cleanData['logosize'].":-1\" ".public_path('out\logo.mp4');			
			echo $command;
			shell_exec($command);
			}
			
			
			if($cleanData["audio"] != "")
			{
				$aud = str_replace(" ","-",$cleanData["audio"]);
				$aud = strtolower($aud);
				$aud = $aud.'.mp3';
				$apath = public_path("audio\sounds\\".$aud);
				$command = FFMPEG_PATH." -i ".public_path('videos\BigBuckBunny_320x180.mp4')." -i ".$apath." -c copy -map 0:v:0 -map 1:a:0 ".public_path('out\audio.mp4');
			
				shell_exec($command);
			}
			
		
	}
	public function index(){
		$sounds = DB::table('videosounds')->get();	
		$titles = DB::table('videotitles')->get();	
		$transitions = DB::table('videotransitions')->get();
		$affects = DB::table('videoaffects')->get();		
		$colors = array('black'=>'#000000','blue'=>'#0000FF','green'=>'#00FF00','grey'=>'#7D7D7D','orange'=>'#FF8A00','red'=>'#FF0000','white'=>'#FFFFFF');
	//	$command = FFMPEG_PATH." -i ".public_path('videos\BigBuckBunny_320x180.mp4')." -i ".public_path('audio\posters\bensound-acousticbreeze.png')." -filter_complex \" overlay=(main_w-overlay_w)/2:(main_h-overlay_h)/2\"" .public_path('output\output.mp4');
		//$output = shell_exec($command);	
		
		
		
		//$commad2 = FFMPEG_PATH." -i ".public_path('videos\BigBuckBunny_320x180.mp4')." -vf \"[in]drawtext=fontfile=".public_path('font\fontawesome-webfont.ttf').": text='First Line': fontcolor=red: fontsize=40: x=(w-text_w)/2: y=if(lt(t\,3)\,(-h+((3*h-200)*t/6))\,(h-200)/2):enable='between(t,2.9,50)',drawtext=fontfile=".public_path('font\fontawesome-webfont.ttf').": text='Second Line': fontcolor=yellow: fontsize=30: x=if(lt(t\,4)\,(-w+((3*w-tw)*t/8))\,(w-tw)/2): y=(h-100)/2:enable='between(t,3.5,50)',drawtext=fontfile=".public_path('font\fontawesome-webfont.ttf').": text='Third Line': fontcolor=blue: fontsize=50: x=if(lt(t\,5)\,(2*w-((3*w+tw)*t/10))\,(w-tw)/2): y=h/2:enable='between(t,4.5,50)',drawtext=fontfile=".public_path('font\fontawesome-webfont.ttf').": text='Fourth Line': fontcolor=black: fontsize=20: x=(w-text_w)/2: y=if(lt(t\,6)\,(2*h-((3*h-100)*t/12))\,(h+100)/2):enable='between(t,5.5,50)'[out]\" ".public_path('output\outputanimate.mp4');
		
		//$output2 = shell_exec($commad2);	
		
		//$frameRate = shell_exec(FFPROBE_PATH." -v 0 -of csv=p=0 -select_streams v:0 -show_entries stream=r_frame_rate ".public_path('videos\BigBuckBunny_320x180.mp4'));
		
		$folder = public_path('output');
		$fonts = public_path('font');			
		$files = glob($folder . '/*');

		foreach($files as $file){
		    if(is_file($file)){
		       
		        unlink($file);
		    }
		}		
		//$thumbname = FFMPEG_PATH." -i ".public_path('videos\BigBuckBunny_320x180.mp4')." -ss 00:00:01.000 -vframes 1 ".public_path('thumbnail')."\output.png";		
		//shell_exec($thumbname);
		//$extractFrames = FFMPEG_PATH." -i ".public_path('videos\BigBuckBunny_320x180.mp4')." -y -t 10 -q 4 -strict experimental -threads 1 -an ".public_path('output')."\big_buck_bunny_frame_.%12d.24_40._t.._u.86613_db085_1565631147.u_.jpg";
		//shell_exec($extractFrames);
		
		$files1 = scandir($folder);
		$fontsFiles = scandir($fonts);
		return view('editor',['colors'=>$colors,'frate'=>"",'sounds'=>$sounds,'titles'=>$titles, 'transitions'=>$transitions,'affects'=>$affects,'files'=>$files1,'fonts'=>$fontsFiles]);
	}
}
