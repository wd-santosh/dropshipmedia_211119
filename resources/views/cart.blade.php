@extends('layouts.partials.header')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
	.shopping-cart {
	  width: 80%;
		min-height: 229px;
		margin: auto;
		background: #FFFFFF;
		box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
		border-radius: 6px;
		display: flex;
		flex-direction: column;
		margin-bottom: 33px;
	}
	.title {
	  height: 60px;
	  border-bottom: 1px solid #E1E8EE;
	  padding: 20px 30px;
	  color: #5E6977;
	  font-size: 18px;
	  font-weight: 400;
	}	 
	.item {
	  padding: 20px 30px;
	  height: 120px;
	  display: flex;
	}	 
	.item:nth-child(3) {
	  border-top:  1px solid #E1E8EE;
	  border-bottom:  1px solid #E1E8EE;
	}
	.buttons {
	  position: relative;
	  padding-top: 30px;
	  margin-right: 60px;
	}
	.delete-btn,
	.like-btn {
	  display: inline-block;
	  Cursor: pointer;
	}
	.delete-btn {
	  width: 18px;
	  height: 17px;
	  background: url(&quot;delete-icn.svg&quot;) no-repeat center;
	}
	 
	.like-btn {
	  position: absolute;
	  top: 9px;
	  left: 15px;
	  background: url('twitter-heart.png');
	  width: 60px;
	  height: 60px;
	  background-size: 2900%;
	  background-repeat: no-repeat;
	}
	.is-active {
	  animation-name: animate;
	  animation-duration: .8s;
	  animation-iteration-count: 1;
	  animation-timing-function: steps(28);
	  animation-fill-mode: forwards;
	}	 
	@keyframes animate {
	  0%   { background-position: left;  }
	  50%  { background-position: right; }
	  100% { background-position: right; }
	}
	.image {
	  margin-right: 50px;
	}
	 
	.description {
	 padding-top: 10px;
	margin-right: 17px;
	width: 50%;
	}
	 
	.description span {
	  display: block;
	  font-size: 14px;
	  color: #43484D;
	  font-weight: 400;
	}
	 
	.description span:first-child {
	  margin-bottom: 5px;
	}
	.description span:last-child {
	  font-weight: 300;
	  margin-top: 8px;
	  color: #86939E;
	}
	.quantity {
	  padding-top: 10px;
	  margin-right: 60px;
	}
	.quantity input {
	  -webkit-appearance: none;
	  border: none;
	  text-align: center;
	  width: 32px;
	  font-size: 16px;
	  color: #43484D;
	  font-weight: 300;
	}
	 
	button[class*=btn] {
	  width: 30px;
	  height: 30px;
	  background-color: #E1E8EE;
	  border-radius: 6px;
	  border: none;
	  cursor: pointer;
	}
	.minus-btn img {
	  margin-bottom: 3px;
	}
	.plus-btn img {
	  margin-top: 2px;
	}
	 
	button:focus,
	input:focus {
	  outline:0;
	}
	.total-price {
	  width: 83px;
	  padding-top: 10px;
	  text-align: center;
	  font-size: 16px;
	  color: #43484D;
	  font-weight: 300;
	}
	.empty_cart{
		width: 100%;
		border: 1px solid #cecece;
		text-align: center;
		vertical-align: middle;
		height: 31px;
		font-weight: bold;
	 }
</style>
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
            <h3 class="text-center"><b>Cart Items</b></h3>
        </div>
    </div>
</div> 
</section>
<section>
   <div class="shopping-cart">
	  <!-- Title -->
	  <div class="title">Product Summary</div>
	  <!-- Product #1 -->
	  <div class="item">
	   	<div class="empty_cart">No Item in cart</div>
	  </div>   
	</div>
</section>	
</div>
<script type="text/javascript">
	var isLoggedInUser = '{{{ (Auth::user()) ? true : false }}}';
	var APP_URL = {!! json_encode(url('/')) !!}
	var _fixedAmount = 50;
	var isThumbname = false;
    var isDeliver = false;
   var additionalCharges = 0;
</script>
@endsection
<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>