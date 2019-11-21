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
a.editAddVideo {
    margin-right: 1rem;
    background: #337ab7;
    padding: 2px 2rem;
    text-align: center;
    border-radius: 4px;
    cursor: pointer;
}
.removevideostyle{background-color: #dd4b39; 
    padding: 2px 2rem; 
    text-align: center; 
    border-radius: 4px;
    cursor: pointer;
}
.fa{    font-size: 15px;
    color: #fff;
  }
.breadcrumb .fa {
    font-size: 15px;
    color: #3c8dbc;
}  
td video {
    width: 120px;
    height: 65px;
}
</style>
@section('content')
  @if(Session::has('msg'))
    <label class="alert-danger">{{session('msg')}}</label>
  @endif
  @if(Session::has('meesg'))
    <label class="alert-danger">{{session('meesg')}}</label>
  @endif
 <div>
    <div style="float: right;margin: 1rem;">
    <a href="#" class="btn btn-primary btn-sm " style="padding: 4px 2rem;letter-spacing: 1px;" data-toggle="modal" data-target="#addEmployeeVideoModalForm">
      Add Video
    </a>
  </div>
   <!--datatables-->                
  <ol class="breadcrumb" style="padding: 15px 8px!important">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active"> Add Video Style</li>
  </ol>
    <div class="box">
  <div class="box-body">
    <div class="table-responsive">
     <table id="example1" class="table table-bordered table-striped" style="table-layout: fixed;word-wrap: break-word;background-color: #fff;">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Video</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        
         @foreach ($users as $admin_video)
         <tr>
          <td>{{ $admin_video->id }}</td>
          <td><video controls>
            <source src="{{ asset($admin_video->links)}}" type="video/mp4">
         </video></td>
          <td id="vidName">{{ $admin_video->name }}</td>
          <td id="vidDesc">{{ $admin_video->description }}</td>
          <td><a id="{{ $admin_video->id }}" class="editAddVideo btn-primary" >
              <i class="fa fa-edit"></i>
            </a>
             <a href="{{ url('admin/deletevideo',$admin_video->id ) }}" class="btn-danger removevideostyle" ><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>
@include('layouts.partials.addVideoModal')
@endsection