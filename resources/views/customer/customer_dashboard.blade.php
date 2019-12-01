@extends('layouts.customerlayout.dashboard')
@section('content')
<style type="text/css">
	.dataTables_filter{
		float:right;
	}
	.dataTables_paginate{
		width: 62%;
		float: right;
	}
</style>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{sizeof($customer)}}</h3>

              <p>All Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>0</h3>

              <p>Completed</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>0</h3>

              <p>Under Process</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>Incomplete</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">    
      		<div class="col-xs-12">
      			<div class="box box-primary">
		            <div class="box-header">
		              <h3 class="box-title">All Orders List</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            	<table class="table table-bordered customedatatable" style="margin-top: 0px !important;">
							<thead>
								<th scope="col">S.No</th>
								<th scope="col">Website Link</th>
								<th scope="col">Product Link</th>
								<th scope="col">Image Uploaded</th>
								<th scope="col">Video Status</th>
								<th scope="col">Order Date</th>
								<th scope="col">Delivery Days Status</th>
								<th scope="col">Details</th>
								<th scope="col">Action</th>
							</thead>   
							<tbody>
								@if(!$customer->isEmpty())
									@foreach($customer as $customer_order)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $customer_order->website_link }}</td>
											<td>{{ $customer_order->product_link }}</td>
											<td>
												@if($customer_order->logo)
													<img src="{{ asset($customer_order->logo)}}" alt="Image" width="50px" height="50px">
												@else
													N/A
												@endif	
											</td>
											<td>
												@if($customer_order->employe_video && $customer_order->change_stop_scroll == '1')
												    Video Uploaded By Staffmember	
												@elseif($customer_order->change_stop_scroll == '2')
													Video in Progress												
												@else
												Video in Progress
												@endif
											</td>
											<td>{{ $customer_order->created_at }}</td>
											<td>@if($customer_order->dilvery_day == 'Yes')
       											<p class="counter" title="{{(strtotime($customer_order->customer_order_time) * 1000)}}" style="margin-top: 1rem;"></p>
										        @else
										        <p class="counter" title="{{(strtotime($customer_order->customer_order_time) * 1000)}}" style="margin-top: 1rem;"></p>
										        @endif
										    </td>
										    <td><a href="{{ url('/order/details',$customer_order->id) }}">View</a></td>										    
											<td class="videoEdit_{{ $customer_order->id }}">

											@if($customer_order->video_upload_time <= date('Y-m-d H:i:s'))
											<div id="approveShow_{{ $customer_order->id }}"> 
											</div>
											@elseif($customer_order->change_stop_scroll == 2)
											<div id="approveShow_{{ $customer_order->id }}" disabled>
											<a class="btn btn-primary" href="javascript:void(0);" id="dispute_{{ $customer_order->id }}" disabled>Rewise</a>
											</div>
											@elseif($customer_order->change_stop_scroll == 0)
											<div id="approveShow_{{ $customer_order->id }}" disabled>
											<a class="btn btn-primary" href="javascript:void(0);" id="dispute_{{ $customer_order->id }}" disabled>Rewise</a>
											</div>
											 @elseif($customer_order->change_stop_scroll == 1)

											<div id="approveShow_{{ $customer_order->id }}" style="float: left;" class="HideRewise">
											<a class="btn btn-primary openDisputeModal" href="javascript:void(0);" id="dispute_{{ $customer_order->id }}" title="Revise"><i class="fa fa-file-video-o" style="font-size: 15px; color: #fff;"></i></a>
											</div>
											
											@else
											<div style="float: left;">

											<a class="btn btn-primary" href="javascript:void(0);" title="Revise" disabled><i class="fa fa-file-video-o" style="font-size: 15px; color: #fff;"></i></a>
											</div>
											@endif
											@if($customer_order->employe_video)
											<a class="btn btn-sm btn-danger" href="{{ url('video/download',$customer_order->id) }}" style=" margin-left:3px;" title="Download"> <i class="fa fa-download" style="font-size: 17px; color: #fff;"></i></a>
											<div class="ApprovedBtns">
											        <button class="btn btn-sm btn-primary cancelrevise" id="{{ $customer_order->id }}" style=" margin-left: 3px;">Approved</button>
											        
											</div>
											<div id="approveShow_{{ $customer_order->id }}" style="float:left;">
											<a class="btn btn-primary openDisputeModal" href="javascript:void(0);" id="dispute_{{ $customer_order->id }}" title="Revise">Rewise</a>
											</div>
											 @endif
											 
											 </td>
										</tr>
									@endforeach
								@endif
							</tbody>
						</table>
		            </div>
		        </div>    
      		</div>      		
      </div>
      <!-- /.row (main row) -->
    </section>
    <div class="modal fade" id="addComments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold">Rewise</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div> 
<form action="javascript:void(0);" class="customerVideo" method="post">
<div class="modal-body mx-3">
<div class="md-form mb-5">

<input type="checkbox" name="scroll" id="change_scroll" value="2"> Leave Revisions below: We will get back to you within 12-24hours or less, if you have purchased express delivery, we are doing our very best to attended to you<br><br><br>
<h5>Add Rewise</h5>
<input type="text" name="Customer_Comment" id="cust_comment">
<input type="hidden" id="orderIdForCommentVideo" name="orderid" value=""> 
</div>
</div>
<div class="modal-footer d-flex justify-content-center" style="text-align: center">
<button class="btn btn-deep-orange" id="addCommentsForVideo" 
style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Rewise</button>
</div>
</form>
</div>
</div>
</div>
    <!-- /.content -->
@endsection