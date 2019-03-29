@extends('layouts.admin')

@section('styles')
    <link href="{{ URL::asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}"
          rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!-- Padding for breadcrumb -->
    <div class="breadcrumb-padding">
    </div>

    <!-- Breadcrumb section -->
    <div class="page-bar">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home">
                </i>
                <a href="{{ url('/cwadmin/dashboard') }}">
                    Home
                </a>
                <i class="fa fa-angle-right">
                </i>
                <a href="{{ url('/cwadmin/videos') }}">
                    Videos
                </a>
            </li>
        </ul>
    </div>

    <!-- Page title section -->
    <h1 class="page-title">
        Video Management
        <small>
        </small>
    </h1>

    <!-- Messages section -->
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class','alert-success') }}">
            {{ Session::get('message') }}
        </p>
    @endif
    @if(Session::has('error_message'))
        <p class="alert {{ Session::get('alert-class','alert-danger') }}">
            {{ Session::get('error_message') }}
        </p>
    @endif
    @if(Session::has('warning_message'))
        <p class="alert {{ Session::get('alert-class','alert-info') }}">
            {{ Session::get('warning_message') }}
        </p>
    @endif
    @if(Session::has('warn_msg'))
        <p class="alert {{ Session::get('alert-class','alert-info') }}">
            {{ Session::get('warn_msg') }}
        </p>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe">
                        </i>Video Listing
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ url('/cwadmin/video/create' ) }}"
                                       class="btn btn-success mt-ladda-btn ladda-button btn-circle">
                                        Add New
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">{{ Form::open(array('url' => '/cwadmin/video/search', 'style' => 'margin:auto;max-width:300px')) }}
  <input type="text" placeholder="Search.." name="search" id="search">
  <button type="submit"><i class="fa fa-search"></i></button>

{{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <style type="text/css">
                    .pull-right{
                        padding-top:10px;
                    }
                </style>

<div class="row">


  @foreach ($items as $user)

        
<div class="col-sm-4">
      <!-- 16:9 -->
    {{ $user->title}}
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $user->youtube_video_url }}"></iframe>
      </div>

      <div class="pull-right">
                                 @if($user->status == 1)
        <a href="{{ url('/cwadmin/video/deactivate/'.$user->id) }}"
                                       class="btn btn-outline btn-circle btn-sm blue">
                                    <span class="fa fa-check">
                                    </span>
                                    </a>
                                @else
        <a href="{{ url('/cwadmin/video/activate/'.$user->id) }}"
                                       class="btn btn-outline btn-circle btn-sm red">
                                    <span class="fa fa-times">
                                    </span>
                                    </a>
                                @endif
      <a href="{{ url('/cwadmin/video/view/'.$user->id) }}"
                                   class="btn btn-outline btn-circle btn-sm yellow">
                                    <span class="fa fa-search">
                                    </span>
                                </a>
       <a href="{{ url('/cwadmin/video/edit/'.$user->id) }}"
                                   class="btn btn-outline btn-circle btn-sm purple">
                                    <span class="fa fa-pencil">
                                    </span>
                                </a>
         <a href="#" class="btn btn-outline btn-circle btn-sm red"
                                   onclick="javascript:deleteRecord({{ $user->id }});">
                                    <i class="fa fa-trash-o">
                                    </i>
                                </a> 
                                </div>                                                

    </div>
      
       @endforeach
 
  </div>


    </div> 
       </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/datatables/datatables.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"
            type="text/javascript"></script>
    <script src="{{ URL::asset('assets/pages/scripts/table-datatables-managed.min.js') }}"
            type="text/javascript"></script>
    <script>
        document.title = "{{ config('global.site_title') }} : Users";

        function deleteRecord(id) {
            bootbox.confirm("Are you sure you want to delete this?", function (result) {
                if (result == true) {
                    window.location.replace("{{ config('global.base_path') }}cwadmin/video/delete/" + id);
                }
            });
        }
    </script>
@endsection