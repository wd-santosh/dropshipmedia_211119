@extends('layouts.elements.layout')
@include('layouts.elements.sidebar')
@section('content')
<style>
body.skin-blue.sidebar-mini {background: #ecf0f5;}
    ul.list-group{box-shadow: 0px 4px 9px #cacaca; width: 56%; margin: auto; margin-top: 40px;  margin-bottom: 40px;}
    ul.list-group li.list-group-item{font-size: 16px; padding: 13px;}
    ul.list-group li.list-group-item span {font-weight: bold;}
    .paddingss{padding: 20px !important;}
</style>
<!--order details-->
<ul class="list-group" style="" id="showData">                   
    <li class="list-group-item" style="word-break: break-all;height: auto!important"><b>Product Link :</b>                                                 
        {{ $orderDetails->product_link }}                 
    </li>
    <li class="list-group-item" style="word-break: break-all;height: auto!important"><b>Delivery Day :</b>                                                 
        {{ $orderDetails->delivery_day }}                 
    </li>
   </ul>  




@endsection