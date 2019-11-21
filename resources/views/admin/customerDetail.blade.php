@extends('layouts.elements.layout')
<style type="text/css">
    table thead tr th {font-size: 14px;}
    td{font-size: 14px;}
    body {height: 100% !important;}
    .box {
    margin-bottom: 0px  !important;
    box-shadow: none  !important;
    padding: 5px;
    padding-top: 0;
    }
.content-wrapper { 
   overflow: auto;
    height: 603px !important;
    }
.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.breadcrumb .fa {
    font-size: 15px;
    color: #3c8dbc;
}
</style>
@section('content')
   <ol class="breadcrumb" style="padding: 15px 8px!important">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">Customer Details</li>
</ol>
 <div class="box">
  <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="example1" style="table-layout: fixed;word-wrap: break-word;background-color: #fff;">
                <thead>
                    <tr>
                      <th>S.No</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>User Name</th>
                      <th>Email</th>
                    </tr>
              </thead>
              <tbody>
                  
                @foreach($custDetail as $cust_Detail)   
                <tr>
                    <td style="text-align: center;">{{ $cust_Detail->id }}</td>
                    <td>{{$cust_Detail->first_name}}</td>
                    <td>{{$cust_Detail->last_name}}</td>
                    <td>{{$cust_Detail->name}}</td>
                    <td>{{$cust_Detail->email}}</td>
                </tr>
                @endforeach

        </tbody>
    </table>
</div>
</div>
</div>
 <div style="float: right;margin-right: 4rem">
    
    </div>
            
    @endsection