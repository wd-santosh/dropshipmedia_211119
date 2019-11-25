@extends('layouts.partials.header')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="wrapper">
    <input type="hidden" value="{{ Auth::id() }}" id="custId">
    <input type="hidden" value="{{ request()->route('id') }}" id="custOrderId">
    <section>
      <img class="hero-bg-top" src="img/bg-top-left.svg" alt="top left icon" aria-hidden="true">
      <div class="container m-50 mtop-70">
          <div class="row">
            <div class="col-lg-1 col-md-1 mb-md-0 mb-4 title">
              <div class="float-left create-pro">
                <a href="#" title="Gender: Who is the audience you are targeting"><h1>?</h1></a>
            </div>
        </div> 
        <div class="col-lg-11 col-md-1 mb-md-0 mb-4 title create-video-small">
            <h3 class="text-center"><b>Create Video</b></h3>
        </div>
    </div>
</div> 
</section>
<section>
    <div class="container m-50" id='websiteLink'>
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <h4 class="text-left"  style="display:-webkit-inline-box;"><b>Website Link :</b></h4>           
                
                <input type="text" class="form-check-input filled-in inputwebsiteLink" style="position: relative;margin-left: 2rem;width:40%;">
                <label class="form-check-label"></label>
                
            </div> 
        </div> 
    </div>  
</section>
<section>
    <div class="container m-50" id='productLink'>
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <h4 class="text-left"  style="display:-webkit-inline-box;"><b>Product Link :</b></h4>           
                @if(!empty($selectdOrder->product_link))
                <input type="text" class="form-check-input filled-in inputProductLink" id="abc1" name="product_link[]" value="{{ $selectdOrder->product_link }}" id="{{ $selectdOrder->id }}" style="position: relative;margin-left: 2rem;width:40%;">
                <label class="form-check-label"></label>            
                @else
                <input type="text" class="form-check-input filled-in inputProductLink" id="abc1" name="product_link[]" style="position: relative;margin-left: 2rem;width:40%;">
                <label class="form-check-label"></label>
                @endif
                
            </div> 
        </div> 
    </div>  
</section>

<div class="col-lg-1 col-md-1 mb-md-0 mb-4 title"></div>
<div class="col-lg-3 col-md-1 mb-md-0" style="margin-left:110px;" id="image"> 
<form class="md-form mb-5"  method="POST">
    <div class="file-field" style="display: flex;">                       
        <div class="inp-fil btn-primary btn-sm float-left" id="logo">                            
            <span class="icon-size"><i class="fa fa-arrow-up" aria-hidden="true"></i></span>                             
            <input type="file" name="logo" accept="image/*" id="uploadedLogo" class="imageLogo" onchange=SelectdLogo(this);>                           
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload Logo" name="logo" id="file" class="logo">
        </div>
        <div id="appendLogo" style="display:flex">
        </div>                       
    </div>                  
</form>
</div>

<section class="section-blue">
    <div class="container m-50" id="video_order">
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <h4 class="text-left text-color"><b>Select Orders:</b></h4>
                                
                <select name="delivery_day" class="mdb-select md-form colorful-select dropdown-primary DelivrDat" id="urlInput" style="display: block !important;width: 30%;" onchange="showDiv(this)">
                  
                  <option value="1">1 </option>
                  <option value="2">2</option>
                  <option value="3">3 </option>
                  <option value="4">4 </option>
                  <option value="5">5 </option>
                  <option value="6">6 </option>
                  <option value="7">7 </option>
                  <option value="8">8 </option>
                  <option value="9">9 </option>
                  <option value="10">10 </option>
                </select>
                <div>
               </div>
                <!--/Blue select-->      
            </div>
        </div>
    </div>
</section>

<div class="col-lg-1 col-md-1 mb-md-0 mb-4 title"></div>
<section class="section-blue">
    <div class="container m-50 mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <h4 class="text-left text-color"><b>Do you want a thumbnail? (Yes or No) **This will be additional $15.00 added on to their check out basket**</b></h4>
                <hr>
                @foreach($music as $musicData)
                <div class="mb-1 selectedMusic" id="musicType_{{ $musicData->id }}"> 
                    @if(!empty($selectdOrder->music))
                    @if( $selectdOrder->music == $musicData->id )
                    <input type="checkbox" class="form-check-input filled-in music_{{ $musicData->id }}" name="thumbnail_select[]" id="xyz1" checked="checked" id="">
                    <label class="form-check-label selectMusicType" for="">{{ $musicData->music }}</label>
                    @else
                    <input type="checkbox" class="form-check-input filled-in music_{{ $musicData->id }}" name="thumbnail_select[]" id="xyz1" id="">
                    <label class="form-check-label selectMusicType" for="">{{ $musicData->music }}</label>
                    @endif
                    @endif
                    @if(empty($selectdOrder->music))
                    <input type="checkbox" class="form-check-input filled-in music_{{ $musicData->id }}" name="thumbnail_select[]" id="xyz1" id="">
                    <label class="form-check-label selectMusicType" for="">{{ $musicData->music }}</label>
                    @endif
                </div>
                @endforeach           
            </div>
        </div>
    </div>
</section>

<section class="hero-bg-section termsandconditions">
  <img class="hero-bg-bottom" src="img/right-blue_morph.svg" alt="blue icon" aria-hidden="true">
  <div class="container m-50">
    <div class="row">
        <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
            <h4 class="text-left text-color"><b>Terms & Conditions:</b></h4>
            <hr>
            @php $counter = 1; @endphp
            @foreach($gender as $data)
            <div class="mb-1 selectedGender" id="master_{{ $data->id }}">
                @if(!empty($selectdOrder->gender))
                @if( $selectdOrder->gender == $data->id )               
                <input type="checkbox" class="form-check-input filled-in gdr_{{ $data->id }}" checked="checked" id="gdr_{{ $data->id }}">
                <label class="form-check-label selectType" for="">{{ $data->gender }}</label> 
                @else
                <input type="checkbox" class="form-check-input filled-in gdr_{{ $data->id }}" id="gdr_{{ $data->id }}">
                <label class="form-check-label selectType" for="">{{ $data->gender }}</label>
                @endif 
                @endif 
                @if(empty($selectdOrder->gender))
                <input type="checkbox" class="form-check-input filled-in gdr_{{ $data->id }}" id="gdr_{{ $data->id }}">
                <label class="form-check-label selectType" for="">{{ $data->gender }}</label>
                @endif 
            </div>
            @endforeach
        </div>
    </div>
</div>
</section>
<!-- <section class="section-blue">
    <div class="container m-50 mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <h4 class="text-left text-color"><b>12-24hour Delivery ($35.00 will be deducted.)</b></h4>
                <hr>
                
                <div class="mb-1 selectedMusic"> 
                    <input type="checkbox" class="form-check-input filled-in" name="thumbnail_select[]" id="xyz1" checked="checked" id="">   
                </div>
                <label></label>
                         
            </div>
        </div>
    </div>
</section> -->

<section class="section-blue">
  <div class="container m-50 create-pro text-center">
    <div class="row">
        <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
            <a href="#"><button class="btn waves-effectss btn-blue waves-effect waves-light">BACK</button></a>
            <a href="javascript:void(0);">
                <button class="btn waves-effectss btn-blue waves-effect waves-light Next">NEXT</button>
            </a>
        </div>
    </div>
</div>
</section>
</div>

@endsection