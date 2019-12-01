@extends('layouts.customerlayout.dashboard')
@section('content')
<style type="text/css">
	.dataTables_paginate{
		width: 62%;
		float: right;
	}
</style>
 <section class="content-header">
      <h1>
        Order Details
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order Details</li>
      </ol>
    </section>
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
		              <h3 class="box-title" style="width:100%;">Order Details:: Order ID #{{$order[0]->id}} - Price: (0)<span style="float:right;">Order Date: {{$order[0]->created_at}}</span></h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            	@if($order[0]->logo)
							<img src="{{ asset($order[0]->logo)}}" alt="Image" width="50px" height="50px">
						@else
							<img src="{{ asset('img/no_logo.png')}}" alt="Image" width="50px" height="50px">
						@endif
						<br/>
						<hr/>
						
						<table class="table table-bordered customedatatable" style="margin-top: 0px !important;">
								<thead>
									<th>S.No</th>
									<th>Website Link</th>
									<th>Product Link</th>
									<th>Video</th>
									<th>Status</th>
								</thead>
								<tbody>
									@php $counter = 1; @endphp
									@if(sizeof($order)>0)
										@foreach($order as $ord)
											<tr>
												<td>{{$counter}}</td>	
												<td>{{$ord->website_link}}</td>	
												<td>{{$ord->product_link}}</td>	
												<td>NA</td>	
												<td>NA</td>	
											</tr>
											@php $counter++; @endphp
										@endforeach
									@endif
									@if(sizeof($items)>0)
										@foreach($items as $ord_items)
											<tr>
												<td>{{$counter}}</td>	
												<td>{{$ord_items->website_link}}</td>	
												<td>{{$ord_items->product_link}}</td>	
												<td>NA</td>	
												<td>NA</td>	
											</tr>
											@php $counter++; @endphp
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
@endsection