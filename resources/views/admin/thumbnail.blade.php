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
            a.Editthumb {
                margin-right: 1rem;
                background: #337ab7;
                padding: 2px 2rem;
                text-align: center;
                border-radius: 4px;
                cursor: pointer;
            }
            .deletethumimg{background-color: #dd4b39; 
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
            controls {width: 120px !important;
                height: 65px;
            }
    </style>
@section('content')
@if(Session::has('msg'))
<label class="alert-danger">{{session('msg')}}</label>
@endif
@if(Session::has('messges'))
<label class="alert-danger">{{session('messges')}}</label>
@endif
<div>
  <div style="float: right;margin: 1rem;">
    <a href="#" class="btn btn-primary btn-sm " style="padding: 4px 2rem;letter-spacing: 1px;" data-toggle="modal" data-target="#addAdminThumbModalForm">
      Add Video
    </a>
  </div>
  <!--datatables-->                
  <ol class="breadcrumb" style="padding: 15px 8px!important">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active"> Add Thumbnail Video</li>
  </ol>
  <div class="box">
    <div class="box-body">
      <div class="table-responsive">
   <table id="example1" class="table  table-bordered table-striped" style="table-layout: fixed;word-wrap: break-word;background-color: #fff;">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Video</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

     @foreach ($thumb  as $thumb_layout_video)
     <tr>
      <td>{{$thumb_layout_video->id }}</td>
      <td>
      <video controls style="width: 120px;">
        <source src="{{ asset($thumb_layout_video->thum_video)}}"  type="video/mp4">
        </video>
      </td>
         
          <td>
            <a id="{{$thumb_layout_video->id}}" class="Editthumb" >
              <i class="fa fa-edit" ></i></a>
              <a href="{{ url('admin/delthum',$thumb_layout_video->id ) }}" class=" btn-danger deletethumimg"><i class="fa fa-trash"></i></a>  </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
    @include('layouts.partials.thumbnailModal')
    @include('layouts.partials.modal')
    @endsection