<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Video Editor</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
		
		<link id="jquiCSS" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" type="text/css" media="all">
		
		
		<link href="{{ asset('public/css/video-js.css')}}" rel="stylesheet">
		<link href="{{ asset('public/css/evol-colorpicker.min.css')}}" rel="stylesheet">
	
		<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
		
        <!-- Styles -->
        <style>
        	#bg{
				position: absolute;
				width: 100%;
				height: 100%;
				background: #000;
				opacity: .5;
				top: 0;
			}
            html, body {
                background-color:#FFFFFF ;
                color: #4785e8;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .cnt{
				text-align: center;
				width: 100%;
				min-height: 700px;
			}
			.v_menu
			{
				width: 100%;	
				height: 51px;
				border-bottom: 1px solid #FFF;
				background: #00B7F5;
				color: #FFF;
			}
			.v_menu ul
			{
				margin: 0;
				padding: 0;
			}
			.v_menu ul li{
				text-decoration: none;
				list-style: none;
				float: left;
				width: 50px;
				padding: 7px;
				padding-bottom: 7px;
				padding-bottom: 0;
				border-right: 1px solid;
			}
			.v_menu ul li a{
				text-decoration: none;
				color: #FFF;
				font-weight: bold;
				font-size: 12px;
			}
			.v_menu ul li i{
				font-size:17px;
			}
			.content{
				width: 100%;
				height: 100%;
			}
			.main-content
			{
				width: 100%;	
				height: 400px;
				min-width: 1200px;
				background:#78CAF5;
			}
			.menu-list
			{
				width: 13%;
			    border-right: 1px solid #FFF;
			    height: 100%;
			    float: left;
			}
			.main-content-loaded
			{
				width: 36%;
			    border-right: 1px solid #FFF;
			    height: 100%;
			    float: left;
			}
			.main-content-video{
				width: 50%;
			    height: 100%;
			    float: left;
			}
			.frames{
				width: 100%;
				height: 108px;
				border-top: 1px solid #FFF;
				background: #78CAF5;
			}
			.menu-list ul{
				margin:0;
				padding:0;
				display: none;
			}
			.menu-list ul.active{				
				display: block;
			}
			.menu-list ul li{
				margin: 0;
				list-style: none;
				text-align: left;
				padding-left: 20px;
				padding-top: 6px;
				color:#FFF;
				font-weight: bold;
				font-size: 12px; 
			}
			.menu-list ul li.selected{				
				font-weight: bold;
				font-size: 14px;
				background: #00B7F5;
				padding: 7px;				
			}
			.v_menu ul li.selected{
				background:#FFF;
				color: #00B7F5;
			}		
			.v_menu ul li.selected a{
				color: #00B7F5;
			}	
			.my-video-dimensions{
				width:100%;
				height: 100%;
			}	
			.video-js{
				width:100%;
				height: 100%;
			}
			.tools{
				height: 42px;
				width: 100%;
				background: #00B7F5;
				border-top: 1px solid #FFF;
			}
			.tools ul{
				margin: 0;
				padding: 0;
				margin-left: 28px;
			}
			.tools ul li{
				width: 37px;
				float: left;
				list-style: none;
				line-height: 42px;
				color: white;
			}
			.tools ul li i{
				font-size: 18px;
			}
			.loaded-content{
				width: 100%;
				height: 100%;
				display: none;
			}
			.loaded-content ul{
				margin: 0;
				padding: 0;
			}
			.loaded-content ul li.color{
				width: 100px;
				height: 80px;
				list-style: none;
				float: left;
				margin: 10px;  
				margin-bottom: 14px;
				margin-top: 15px;
			}
			.loaded-content ul li.color div{ 
				width: 100%;
				height: 100%;
			}
			.loaded-content ul li.color label{ 
				color: #FFF;
				font-weight: bold;
			}
			.n_data{
				/*margin: 27% auto;*/
			    font-size: 20px;
			    color: #FFF;
			}
			.enabled{
				display: block;
			}
			.menu-list ul li a{
				color: white;
				text-decoration: none;
			}
			.menu-list ul li a.actve{
				text-decoration: underline;
				font-weight: bold;
			}
			.lbltitle
			{
				color: #00B7F5 !important;
			    position: absolute;
			    width: 100%;
			    left: 0;
			    font-size: 12px;
			    top: 35%;
			}
			.divtitles{
				background: #FFF;
				position: relative;
				border: 3px solid #00B7F5;
				border-radius: 9px;
			}
			.frames ul{
				margin: 0;
				padding: 0;
				height: 100%;
				overflow: auto;
				white-space: nowrap;
			}
			.frames ul li{
				list-style: none;
				width: 100px;
				height: 80px;
				margin: 2px;
				display: inline-block;					
			}
			.frames ul li.selectedFrame{
				border:2px solid red;
			}
			.frames ul li img{	
				width: 100%;
				height: 100%;			
			}
			.vinfo{
				width: 202px !important;margin: 0 !important;padding: 0 !important;float: right;margin-right: 21px !important;
			}
			.vinfo li{
				width: 100% !important;font-weight: bold;text-align: right;margin-right: 24px;
			}
			#fontslist ul{
				height: 100%;
				overflow-y: scroll;
			}
			#fontslist ul li{
				list-style: none;
				padding: 5px;
				text-align: left;
				padding-left: 20px;
				border-bottom: 1px solid #00B7F5;
				background: #FFF;
			}
			#fontslist ul li font{			
				color: #00B7F5;
				font-size: 20px;
			}
			.selectedFont{
				background: black !important;
			}
			.medialist .summary{
				padding: 0;
				text-align: center;
				background: #FFF;
				color: #000;				
				font-size: 13px;
				padding: 5px;
			}
			.thumb{
				width: 172px;height: 100px;position: absolute;left: 5%;border: 2px solid;top: 36px;
			}
			.thumb img{
				width:100%;
				height: 100%;
			}
			#colorlist label{
				text-align: left !important;
				color: #FFF;
				font-weight: bold;
			}
			.evo-cp-wrap{
				width:154px !important;
				float: left;
			}
			.anchr
			{
				background: #fff;
				padding: 5px;
				font-size: 12px;
				font-weight: bold;
				text-decoration: none;
				color: #00B7F5;
				margin-top: 9px;
				display: block;
				width: 69px;
				text-align: center;
				border-radius: 4px;
			}
			.evtnli{
				background: #00B7F5;
				padding: 4px;
				margin-bottom: 2px !important;
			}
			.audioselected{
				border: 2px solid red;
			}
			.evo-pointer {
				display:none;
			}
			.eventbtn{
				
			}
			.dnone{
				display: none;
			}
			#loading-image{
				display:none;
				margin: 0 auto !important;
			    width: 6%;
			    position: absolute;
			    top: 50%;
			    left: 49%;
			}
			#applyevent {
			    color: black;
			    background: #00B7F5;
			    padding-left: 10px;
			    padding-right: 10px;
			}
        </style>
       
        @foreach($fonts as $font)
			@if($font != '.' && $font != '..')
				@php $fname = str_replace(".TTF","",$font); @endphp 						
				@php $fname = str_replace(".ttf","",$fname); @endphp 						
				@php $fname = str_replace(".OTF","",$fname); @endphp 						
				@php $fname = str_replace(".otf","",$fname); @endphp 						
				<style type="text/css">
				@font-face {
					font-family: "{{$fname}}";
					src: url("{{ url('/')}}/public/font/{{$font}}")
				};
				</style>
			@endif								
		@endforeach
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">  
            	<div class="v_menu">
            		<ul>
            			<li id="media" class="selected">
            				<i class="fa fa-folder-o" aria-hidden="true"></i>
							<a href="#">Media</a>
						</li>
						<li id="color">
            				<i class="fa fa-file-video-o" aria-hidden="true"></i>
            				<a href="#">Colors</a>
						</li>
            			<li id="audio">
            				<i class="fa fa-music" aria-hidden="true"></i>
            				<a href="#">Audio</a>
						</li>
						<li id="fonts">
            				<i class="fa fa-font" aria-hidden="true"></i>
            				<a href="#">Fonts</a>
            			</li>            			
            			<li id="transition">
            				<i class="fa fa-compress" aria-hidden="true"></i>
            				<a href="#">Transition</a>
            			</li>
            			<li id="affects">
            				<i class="fa fa-star-half-o" aria-hidden="true"></i>
            				<a href="#">Affetcs</a>
            			</li>            			
            		</ul>
            	</div>             
				<div class="main-content">
					<div class="menu-list">
						<ul class="medialist active">
							<li class="selected"><a class="mediaload" href="javascript:void(0);" class="actve">My Videos >></a></li>							<li class="summary">
								<label>Apply Events </label>								
								<ul class="events" style="display: block;">
									
								</ul>
								<div class="eventbtn dnone">
									<a id="applyevent" href="javascript:void(0);">Apply</a>
								</div>
							</li>						
						</ul>
						
					</div>	
					<div class="main-content-loaded">
						<!-- Media Tab -->
						<div class="loaded-content enabled" id="medialist">
							<div class="n_data">
								
								<div class="color" style="position:relative;text-align:left;padding-left:22px;padding-top:5px;">
									<label style="font-weight:bold;">Your Video & Logo</label>
									<div class="thumb">
										<img src="{{ url('/')}}/public/thumbnail/output.png"/>
									</div>
									<div class="thumb" style="left:5%;top:155px;background:#FFF;">
										<img src="{{ url('/')}}/public/logo/logo.jpg"/>
									</div>
								</div>
							<!--<i class="fa fa-plus-square-o" aria-hidden="true"></i>No Video Added Yet!-->
							</div>
						</div>
						<div class="loaded-content" id="colorlist" style="padding: 25px;text-align: left;">
							<!--<div id="cpInline" style="width:100%;"></div>-->
							<label>Select Logo/Text Color</label><br/>
							<input id="logocolor"/>
							<input id="Textcolor"/>
							<br/>
							<a class="anchr" id="lgcolor" href="javascript:void(0);">Set</a><br/>
												
							
							
							<label>Logo Size/Position</label><br/>
							<input id="logosize" name="logosize" placeholder="Size" type="number"/> 
							<select id="logoposition" name="logoposition">
								<option value="">Position</option>
								<option value="topleft">Top Left</option>
								<option value="topcenter">Top Center</option>
								<option value="topright">Top Right</option>
								<option value="centerleft">Center Left</option>
								<option value="center">Center</option>
								<option value="centerright">Center Right</option>
								<option value="bottomleft">Botton Left</option>
								<option value="bottomcenter">Botton Center</option>
								<option value="bottomright">Botton Right</option>
							</select>
							<a class="anchr" id="lgcosize" href="javascript:void(0);">Set </a><br/>
							<label>Font Size</label><br/>
							<input id="fontsize" name="fontsize" type="number" placeholder="Font Size"/> 
							<a class="anchr" id="fontsize_anchr" href="javascript:void(0);">Set </a><br/>							
						</div>						
						
						<!-- Audio Tab -->
						<div class="loaded-content" id="audiolist">
							<ul>
							@foreach($sounds as $audio)
								<li class="color" title="{{$audio->item}}">
									<div style="background-size: 100% 100% !important;background:url({{ asset('public/audio/posters/'.$audio->sound_image)}})"></div>
									<label>{{$audio->item}}</label>
								</li>								
							@endforeach
							</ul>
						</div>
						<!-- Fonts -->
						<div class="loaded-content" id="fontslist">
							<ul>
							@foreach($fonts as $font)
								@if($font != '.' && $font != '..')	
									@php $fname1 = str_replace(".TTF","",$font); @endphp
									@php $fname1 = str_replace(".ttf","",$fname1); @endphp 						
									@php $fname1 = str_replace(".OTF","",$fname1); @endphp 						
									@php $fname1 = str_replace(".otf","",$fname1); @endphp				
									<li><font face="{{$fname1}}">{{$fname1}}</font></li>
								@endif								
							@endforeach
							</ul>
						</div>						
						
						<!-- Titles Tab -->
						<div class="loaded-content" id="titleslist">
							<ul>
							@foreach($titles as $title)
								<li class="color">
									<div class="divtitles"><label class="lbltitle">{{$title->item}}</label></div>
									
								</li>								
							@endforeach
							</ul>
						</div>						
						
						<!-- Transition List -->
						<div class="loaded-content" id="transitionlist">
							<ul>
							@foreach($transitions as $transition)
								<li class="color">
									<div class="divtitles"><label class="lbltitle">{{$transition->item}}</label></div>
									
								</li>								
							@endforeach
							</ul>
						</div>
						
						
						<!-- Affects List -->
						<div class="loaded-content" id="affectslist">
							<ul>
							@foreach($affects as $affect)
								<li class="color">
									<div class="divtitles"><label class="lbltitle">{{$affect->item}}</label></div>
									
								</li>								
							@endforeach
							</ul>
						</div>	
					</div>	
					<div class="main-content-video">
						<video id='my-video' class='video-js'>	
							 <source src="{{ asset('public/videos/BigBuckBunny_320x180.mp4')}}" type="video/mp4">					   
						    <p class='vjs-no-js'>
						      To view this video please enable JavaScript, and consider upgrading to a web browser that
						      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
						    </p>
						  </video>
					</div>	
				</div>
				<div class="tools">
					<ul>
						<li><i class="fa fa-undo" aria-hidden="true"></i></li>
						<li><i class="fa fa-repeat" aria-hidden="true"></i></li>
						<li><i class="fa fa-trash-o" aria-hidden="true"></i></li>
					</ul>
					<ul class="vinfo">
						<li>Frame Rate: {{$frate}}</li>
					</ul>
				</div>
				<div class="frames">
					<ul>
					@foreach($files as $file)
						@if($file != '.' && $file != '..')						
							<li><img src="{{ url('/')}}/public/output/{{$file}}"/></li>
						@endif
					@endforeach
					</ul>
				</div>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>	
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        	<script type="text/javascript" src="{{ asset('public/js/evol-colorpicker.min.js')}}"></script>	
        <script src="{{ asset('public/js/video.js')}}"></script>
        
        <script type="text/javascript">
        var activites = {};
        var APP_URL = {!! json_encode(url('/')) !!}
        $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
   		 });
        $('#loading-image').bind('ajaxStart', function(){
		    $(this).show();
		}).bind('ajaxStop', function(){
		    $(this).hide();
		});
        	videojs(document.getElementById('my-video'), {
        		controls: true,
  				autoplay: false,
  				preload: 'auto'}, function() {			 
			});
        	$(document).on('click','.v_menu ul li',function(e){
        		$('.v_menu ul li').removeClass('selected');        		
        		$(this).addClass('selected');
        		var id = $(this).attr('id');
        		$('.main-content-loaded .loaded-content').removeClass("enabled");
        		$('.main-content-loaded #' + id + 'list').addClass("enabled");
        	});
        	$(document).on('click','.frames ul li',function(){
        		$(this).addClass('selectedFrame');
        	});
        	$(document).on('click','#fontslist ul li',function(){
        		activites.fontname = $(this).find('font').attr('face');
        		$('.events').append('<li class="evtnli">Font Name: '+ $(this).find('font').attr('face') +'</li>');
        		$('#fontslist ul li').removeClass('selectedFont');
        		$(this).addClass('selectedFont');
        		if($('.eventbtn').hasClass('dnone') == true)
        		{
					$('.eventbtn').removeClass('dnone');
				}
        	});   
        	$(document).ready(function(){
        		$('#logocolor').colorpicker();
				$('#Textcolor').colorpicker();
        	}); 
        	$(document).on('click','#lgcolor',function(){
        		activites.logoColor = $('#logocolor').colorpicker("val");
        		activites.textColor = $('#Textcolor').colorpicker("val");
        		$('.events').append('<li class="evtnli">Logo Color: '+ $('#logocolor').colorpicker("val") +'</li>');
        		$('.events').append('<li class="evtnli">Text Color: '+ $('#Textcolor').colorpicker("val") +'</li>');
        		if($('.eventbtn').hasClass('dnone') == true)
        		{
					$('.eventbtn').removeClass('dnone');
				}
        	});        	       	
        	$(document).on('click','#audiolist li',function(){
        		$('#audiolist li').removeClass('audioselected');
        		$(this).addClass("audioselected");
        		activites.audio = $(this).attr("title");
        		$('.events').append('<li class="evtnli">Audio: '+ $(this).attr("title") +'</li>');
        		if($('.eventbtn').hasClass('dnone') == true)
        		{
					$('.eventbtn').removeClass('dnone');
				}
        	});
        	$(document).on('click','#lgcosize',function(){
        		activites.logosize = $('#logosize').val();
        		activites.logoposition = $('#logoposition').val();
        		$('.events').append('<li class="evtnli">Logo Size: '+ $('#logosize').val() +'</li>');
        		$('.events').append('<li class="evtnli">Logo Position: '+ $('#logoposition').val() +'</li>');
        		if($('.eventbtn').hasClass('dnone') == true)
        		{
					$('.eventbtn').removeClass('dnone');
				}
        	});
        	$(document).on('click','#fontsize_anchr',function(){
        		activites.fontsize = $('#fontsize').val();        		
        		$('.events').append('<li class="evtnli">Font Size: '+ $('#logosize').val() +'</li>'); 
        		if($('.eventbtn').hasClass('dnone') == true)
        		{
					$('.eventbtn').removeClass('dnone');
				}
        	});
        	$(document).on('click','#applyevent',function(){
        		 $('#loading-image').show();
        		 $('#bg').show();
        		$.ajax({
				    url : APP_URL + '/editor/apply',
				    type : 'POST',
				    data : {'video_data':activites},
				    dataType:'json',				   
				    success : function(data){              
				        alert('Data: '+data);
				        $('#loading-image').hide();
				    },
				    error : function(request,error){
				        alert("Request: "+JSON.stringify(request));
				    }
				});        		
        	});
        	
        </script>
        <!--<div id="bg"></div>-->
        <div id="loading-image">
        	<img src="{{ asset('public/img/loading.gif')}}"/>
        </div>
    </body>
</html>
