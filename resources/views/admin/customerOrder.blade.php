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
    <li class="active">Customer Orders</li>
</ol>

<div class="box">
  <div class="box-body">
    <div class="table-responsive">
<table class="table   table-bordered table-striped" id="example1" style="table-layout: fixed;word-wrap: break-word;background-color: #fff;">
                      <thead>
                       <tr>
                        <th>Order No.</th>
                        <th>Order Assigned</th>
                        <th>Order Assign Date</th>
                        <th>Order Complete Date</th>
                        <th>Payment Status</th>                       
                      </tr> 
                    </thead>
                    <tbody>                                        
                      @foreach($custOrder as $Cust_Order)
                    
                      <tr>
                        <td style="text-align: center;">{{ $Cust_Order->id }}</td>
                        <td>
                          @if(!empty($Cust_Order->customerData->name))
                            {{$Cust_Order->customerData->name}}
                          @endif
                        </td>  
                        <td>
                          @php $ordrComDate = $Cust_Order->order_assign_time @endphp 
                          @if(!empty($Cust_Order->order_assign_time ))
                          {{ date('Y-m-d h:i:s', strtotime('-3 days', strtotime($ordrComDate))) }}
                          @endif
                        </td>                
                        <td>{{ $Cust_Order->order_assign_time }}</td>
                        
                       <td>  
                        @if(!empty($Cust_Order->customerData->getPaymentStatus))
                          @if($Cust_Order['status'] == 1 )
                            @php echo "Done"; @endphp
                          @else($Cust_Order['status'] == 0 )
                            @php echo ""; @endphp
                          @endif
                        @endif
                      </td> 
                    </tr>                
                                       
                      @endforeach                     

                  </tbody>
     </table>
 </div>
 <div style="float: right;margin-right: 4rem">
    
    </div>
              
                @endsection