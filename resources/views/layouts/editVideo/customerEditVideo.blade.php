<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge"> 
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Video Editing</title>
  <style type="text/css">
   .sidebar-menu{
     padding: 0;
     margin: 0;
   }
   .sidebar-menu li{
     list-style: none;
     padding: 5px;
     text-align: left;
     width: 100%;
     color: #FFF;
   }
   .sidebar-menu li a{
     display: block;
     width: 100%;
     padding-left: 24px;
     padding-top: 5px;
     padding-bottom: 11px;
     border-bottom: 1px solid #fff;
     color: #fff;
     text-decoration: navajowhite;
     font-size: 12px;
   }
   .fa{
     font-size: 13px;
     margin-right: 6px;
   }
   .dnone{
     display:none;
   }
   ..evo-pointer {
    float:right;
  }
  .evo-cp-wrap{
    width:172px !important;
  }
  .bt{
    padding: 0;
    font-size: 12px;
    padding-left: 17px;
    padding-right: 17px;
    text-align: center;
  }
</style>
<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
<link id="jquiCSS" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" type="text/css" media="all">
<link href="{{ asset('public/css/evol-colorpicker.min.css')}}" rel="stylesheet">
</head>
<body>
 <main class="app">

   <div class="row grow w-100 h-100 m-0">
    <div class="col-12 bg-default" style="border-bottom:1px solid #cecece;">
      <a class="navbar-brand float-left" href="http://dropshipmedia.com">
        <img src="http://dropshipmedia.com/public/img/logo.png" style="width:70px;margin-left:20px;"></a>
        @if (Auth::check())
        <h5 class="float-left mt-2">Welcome : 
          <h6  class="float-left ml-2" style="margin-top: 13px !important;">{{ ucfirst(Auth::user()->name ) }}</h6></h5>
          @endif

          @if (Auth::check())
          
          <a class="float-right mt-2" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>



        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <a href="{{ url('customer/dashboard') }}" class="btn btn-primary" style="margin-top: 5px;margin-left: 920px;width: 80px">Back</a>


        @else

        <a class="float-right  mt-2" href="" data-toggle="modal" data-target="#orangeModalSubscription"><i class="fas fa-shopping-cart signicon"></i>Sign in</a>

        @endif

      </div>
      <div class="col-2 bg-dark py-3 px-0" style="padding: 0 !important;">
        <section class="sidebar">  
         <ul class="sidebar-menu" data-widget="tree">          
          <li>
            <a href="" data-toggle="modal" data-target="#LogoSettingsModal">
              <i class="fa fa-arrows"></i> <span>Logo Settings</span>                    
            </a>
          </li>
          <li>
            <a href="" data-toggle="modal" data-target="#WaterMarkModal">
              <i class="fa fa-arrows"></i> <span>Watermark</span>
            </a>
          </li> 
          <li>
            <a href="" data-toggle="modal" data-target="#MusicModal">
              <i class="fa fa-arrows"></i> <span>Music</span>
            </a>
          </li> 
          <li>
            <a href="" data-toggle="modal" data-target="#TextSettingsModal">
              <i class="fa fa-arrows"></i> <span>Text Settings</span>
            </a>
          </li>

          <li>
            <a href="" data-toggle="modal" data-target="#CropsModal">
              <i class="fa fa-arrows"></i> <span>Crop</span>
            </a>
          </li> 
          <li>
            <a href="" data-toggle="modal" data-target="#backgroundModel">
              <i class="fa fa-arrows"></i> <span>Background Settings</span>
            </a>
          </li> 

          <li>
            <a href="" data-toggle="modal" data-target="#TransitionsModal">
              <i class="fa fa-arrows"></i> <span>Transitions</span>
            </a>
          </li> 
          <li>
            <a href="" data-toggle="modal" data-target="#LanguageModal">
              <i class="fa fa-arrows"></i> <span>Language Settings</span>
            </a>
          </li> 

          <li>
            <a href="" data-toggle="modal" data-target="#DeleteModal">
              <i class="fa fa-arrows"></i> <span>Delete</span>
            </a>
          </li> 
        </ul> 
      </section>
    </div>
    <div class="main col-10 bg-default h-100 pt-0 ">
    	<div class="row">
    		<div class="col-9">
    			<h4 style="padding: 7px;background: #007BFF;text-align: center;margin-top: 13px;color:#fff;">Video Editing</h4>
    			@if($customer_data->employe_video)
          <video style="width:100%;height:480px;" controls>
            <source src="{{ asset($customer_data->employe_video)}}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
            @else
            Your video is not here.
            @endif
          </div>
          <div class="col-3" style="border-left: 1px solid #cecece;height:550px;overflow-y:scroll;">
           <h5 style="padding: 7px;background: #007BFF;text-align: center;margin-top: 13px;color:#fff;">Output</h5>
           @if(sizeof($files)>0)
           @foreach($files as $file)
           <div class="vidlayers">
             <iframe style="width:100%;height: 142px;" src="/{{$file}}"></iframe>
             <div class="col-md-12" style="border: 1px solid #cecece;">
               <a id="final_{{$customer_data->id}}" class="btn btn-primary bt btnFinal" title="{{$file}}" style="margin-left: 15%;" href="javascript:void(0);">Final</a>
               <a id="delete_{{$customer_data->id}}" title="{{$file}}" class="btn btn-danger bt btnDelete" href="javascript:void(0);">Delete</a>
             </div>	
           </div>
           @endforeach
           @else
           <p style="text-align:center;border:1px solid;font-size:12px;padding:4px;">No Updated Yet!</p>	
           @endif    			
         </div>
       </div>
     </div>
     <div class="row w-100 m-0">
      <div class="col-12 py-3 bg-primary">
        Footer
      </div>
    </div>
  </div>
  
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


@include('layouts.editVideo.customModal')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('public/js/evol-colorpicker.min.js')}}"></script>
<script type="text/javascript">
 var dropdown = document.getElementsByClassName("dropdown-btn");
 var i;

 for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

</body>
</html>
<!--Logo Settings-->

<div class="modal fade" id="MusicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title w-100 font-weight-bold">Background Settings</h4>
    </div>
    <div class="modal-body mx-3">
      <div class="form-group">  
        <input type="hidden" name="id" class="form-control" id="model_id">
        <label>Music File</label><br/>
        <input id="music" name="music" placeholder="Size" type="file"/><br/> 

      </div>
    </div>
    <div class="modal-footer d-flex justify-content-center" style="text-align: center;">
      <img class="dnone" src="{{ asset('public/img/loading_video.gif') }}"/>
      <button class="btn btn-primary MusicSeting" id="videoEdited" c_id="{{$customer_data->id}}">Submit</button>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="backgroundModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title w-100 font-weight-bold">Background Settings</h4>
    </div>
    <div class="modal-body mx-3">
      <div class="form-group">  
        <input type="hidden" name="id" class="form-control" id="model_id">
        <label>Video Background Color</label><br/>
        <input type="text" name="background_color" id="background_color"/> 

      </div>
    </div>
    <div class="modal-footer d-flex justify-content-center" style="text-align: center;">
      <img class="dnone" src="{{ asset('public/img/loading_video.gif') }}"/>
      <button class="btn btn-primary BGSeting" id="videoEdited" c_id="{{$customer_data->id}}">Submit</button>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="LogoSettingsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title w-100 font-weight-bold">Logo Settings</h4>
    </div>
    <div class="modal-body mx-3">
      <div class="form-group">  
        <input type="hidden" name="id" class="form-control" id="model_id">
        <label>Logo</label><br/>
        <input id="logoimg" name="logoimg" placeholder="Size" type="file"/><br/> 
        <label>Logo Size</label><br/>
        <input id="logosize" name="logosize" placeholder="Size" type="number" class="form-control"/> 
        <label>Logo Position</label><br/>
        <select id="logoposition" name="logoposition" class="form-control">
         <option value="">Position</option>
         <option value="topleft">Top Left</option>          
         <option value="topright">Top Right</option>            
         <option value="center">Center</option>         
         <option value="bottomleft">Botton Left</option>
         <option value="bottomright">Botton Right</option>
       </select>       
       <!--<input id="logosizes" name="logopacity" placeholder="Opacity" type="text" class="form-control opacityLog"/>-->          
     </div>
   </div>
   <div class="modal-footer d-flex justify-content-center" style="text-align: center;">
   	<img class="dnone" src="{{ asset('public/img/loading_video.gif') }}"/>
    <button class="btn btn-primary LogoSeting" id="videoEdited" c_id="{{$customer_data->id}}">Submit</button>
  </div>
</div>
</div>
</div>

<!--Text Setting -->

<div class="modal fade" id="TextSettingsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title w-100 font-weight-bold">Text Settings</h4>
    </div>
    <div class="modal-body mx-3">
      <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="text_id">
        <label>Text</label><br/>
        <input id="txtt" name="txtt" placeholder="Text" type="text" class="form-control TxtFonts"/>
        <label>Font Size (in px)</label><br/>
        <input id="txttsize" name="txttsize" placeholder="Size" type="number" class="form-control TxtFonts"/> 
        <label>Text Color</label><br/>
        <input id="txtclr" name="txtclr" placeholder="Color" type="text" class="form-control ColTxt" style="width:143px;float: left;"/>        
      </div>
    </div>
    <div class="modal-footer d-flex justify-content-center" style="text-align: center;">
    	<img class="dnone" src="{{ asset('public/img/loading_video.gif') }}"/>
      <button class="btn btn-primary SettingtTxtModal" c_id="{{$customer_data->id}}">Submit</button>
    </div>
  </div>
</div>
</div>
<!--End Text Setting -->

<!--Water Mark -->

<div class="modal fade" id="WaterMarkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title w-100 font-weight-bold">Water Mark</h4>
    </div>
    <div class="modal-body mx-3">
      <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="model_id">
        <label>Watermark Image</label><br/>
        <input id="wimg" name="wimg" placeholder="Size" type="file"/><br/> 
        <label>Watermark Size</label><br/>
        <input id="wsize" name="wsize" placeholder="Size" type="number" class="form-control"/> 
        <label>Watermark Position</label><br/>
        <select id="wposition" name="wposition" class="form-control">
         <option value="">Position</option>
         <option value="topleft">Top Left</option>          
         <option value="topright">Top Right</option>            
         <option value="center">Center</option>         
         <option value="bottomleft">Botton Left</option>
         <option value="bottomright">Botton Right</option>
       </select>   
     </div>
   </div>
   <div class="modal-footer d-flex justify-content-center" style="text-align: center;">
     <img class="dnone" src="{{ asset('public/img/loading_video.gif') }}"/>
     <button class="btn btn-primary MarkModal" id="videoEdited" c_id="{{$customer_data->id}}">Submit</button>
   </div>
 </div>
</div>
</div>
<!--End Water Mark -->

<!--Transitions -->

<div class="modal fade" id="TransitionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title w-100 font-weight-bold">Transitions</h4>
    </div>
    <div class="modal-body mx-3">
      <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="trans_id">
        <label>Logo Position</label><br/>
        <input id="orangeForm-name" class="form-control validate FindTrans" name="transitionslog" type="text">
      </div>
    </div>
    <div class="modal-footer d-flex justify-content-center" style="text-align: center;">
      <img class="dnone" src="{{ asset('public/img/loading_video.gif') }}"/>
      <button class="btn btn-primary TransitionBtns" c_id="{{$customer_data->id}}">Submit</button>
    </div>
  </div>
</div>
</div>

<!--Language Setting -->

<div class="modal fade" id="LanguageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title w-100 font-weight-bold">Language</h4>
    </div>
    <div class="modal-body mx-3">
      <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="trans_id">
        <label>Logo Positions</label><br/>
        <input id="orangeForm-name" class="form-control validate FindLang" name="Languagelog" type="text">
      </div>
    </div>
    <div class="modal-footer d-flex justify-content-center" style="text-align: center;">
      <img class="dnone" src="{{ asset('public/img/loading_video.gif') }}"/>
      <button class="btn btn-primary LanguageBtn" c_id="{{$customer_data->id}}">Submit</button>
    </div>
  </div>
</div>
</div>

<!--Crop -->

<div class="modal fade" id="CropsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title w-100 font-weight-bold">Crop</h4>
    </div>
    <div class="modal-body mx-3">
      <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="trans_id">
        <label>Crop X Positions</label><br/>
        <input class="form-control validate Findcrop" id="cropxpos" name="cropxpos" type="text"/>
        <label>Crop Y Positions</label><br/>
        <input class="form-control validate Findcrop" id="cropypos" name="cropypos" type="text"/>
        <label>Crop Width</label><br/>
        <input class="form-control validate Findcrop" id="cropwidth" name="cropwidth" type="text"/>
        <label>Crop Height</label><br/>
        <input class="form-control validate Findcrop" id="cropheight" name="cropheight" type="text"/>
      </div>
    </div>
    <div class="modal-footer d-flex justify-content-center" style="text-align: center;">
      <img class="dnone" src="{{ asset('public/img/loading_video.gif') }}"/>
      <button class="btn btn-primary CropBtn" c_id="{{$customer_data->id}}">Submit</button>
    </div>
  </div>
</div>
</div>

<!--Delete -->

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title w-100 font-weight-bold">Delete</h4>
    </div>
    <div class="modal-body mx-3">
      <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="trans_id">
        <label>Delete Positions</label><br/>
        <input id="orangeForm-name" class="form-control validate FindDelete" name="deletelog" type="text">
      </div>
    </div>
    <div class="modal-footer d-flex justify-content-center" style="text-align: center;">
      <img class="dnone" src="{{ asset('public/img/loading_video.gif') }}"/>
      <button class="btn btn-primary DeleteBtn" c_id="{{$customer_data->id}}">Submit</button>
    </div>
  </div>
</div>
</div>
<script src="{{ asset('public/js/editscript.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){        		
   $('#txtclr').colorpicker();
 }); 
</script>


