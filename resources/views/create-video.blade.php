@extends('layouts.partials.header')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="wrapper">
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
                
                <input type="text" class="form-check-input filled-in inputwebsiteLink" style="position: relative;margin-left: 0.5rem;width:40%;" id="main_website_link" name="main_website_link">
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
                <input type="text" class="form-check-input filled-in inputProductLink" id="main_product_link" name="main_product_link" style="position: relative;margin-left: 2rem;width:40%;">
                <label class="form-check-label"></label>
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
                                
                <select class="mdb-select md-form colorful-select dropdown-primary DelivrDat" id="how_many_orders" style="display: block !important;width: 30%;" onchange="showDiv(this)" name="how_many_orders">
                  
                  <option value="0">Select </option>
                  <option value="1">One </option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                  <option value="4">Four </option>
                  <option value="5">Five</option>
                  <option value="6">Six</option>
                  <option value="7">Seven</option>
                  <option value="8">Eight</option>
                  <option value="9">Nine</option>
                  <option value="10">Ten</option>
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
                <div class="mb-1 selectedMusic" id="musicType"> 
                	<input type="checkbox" class="form-check-input filled-in" name="thumbnail_select" id="thumbnail_selectyes" value="Yes">
                    <label class="form-check-label selectMusicType" for="thumbnail_selectyes">Yes</label>
                    <br/>
                    <input type="checkbox" class="form-check-input filled-in" name="thumbnail_select" id="thumbnail_selectno" value="No">
                    <label class="form-check-label selectMusicType" for="thumbnail_selectno">No</label>
                </div>                      
            </div>
        </div>
    </div>
</section>
<div class="col-lg-1 col-md-1 mb-md-0 mb-4 title"></div>
<section class="section-blue">
    <div class="container m-50 mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
                <h4 class="text-left text-color"><b>Do you want Deliver video 12 to 24 hours? (Yes or No) **This will be additional $35.00 added on to their check out basket**</b></h4>
                <hr>
                <div class="mb-1 selectedDeliver" id="music"> 
                    <input type="checkbox" class="form-check-input filled-in" name="delivery_select" id="delivery_selectyes" value="Yes">
                    <label class="form-check-label selectDeliverDay" for="delivery_selectyes">Yes</label>
                    <br/>
                    <input type="checkbox" class="form-check-input filled-in" name="delivery_select" id="delivery_selectno" value="No">
                    <label class="form-check-label selectDeliverDay" for="delivery_selectno">No</label>
                </div>                      
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
            <div class="mb-1 selectedGender" id="master">
            	<input type="checkbox" class="form-check-input filled-in" id="terms" name="terms">
                <label class="form-check-label selectType" for="terms"> We will also add a policy/ term box that needs to be checked before continuing order once the Shopify store is completed.</label>
            </div>
        </div>
    </div>
</div>
</section>
<section class="section-blue">
  <div class="container m-50 create-pro text-center">
    <div class="row">
        <div class="col-lg-12 col-md-1 mb-md-0 create-pro">
            <a href="#"><button class="btn waves-effectss btn-blue waves-effect waves-light">BACK</button></a>
            <a href="javascript:void(0);">
                <button class="btn waves-effectss btn-blue waves-effect waves-light Next">CHECKOUT ($<span class="price">50</span>) </button>
            </a>
        </div>
    </div>
</div>
</section>
</div>
<form style="margin:0;" method="POST" action="#" id="frm_paypal"> {{ csrf_field() }}   
</form>
<script type="text/javascript">
	var isLoggedInUser = '{{{ (Auth::user()) ? true : false }}}';
	var APP_URL = {!! json_encode(url('/')) !!}
	var _fixedAmount = 50;
	var isThumbname = false;
    var isDeliver = false;
   var additionalCharges = 0;
</script>
@endsection