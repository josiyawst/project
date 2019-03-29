@extends('layouts.admin')

@section('content')
    <!-- Padding for breadcrumb -->
    <div style='padding-bottom:30px;'>
    </div>

    <!-- Breadcrumb section -->
    <div class="page-bar">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home">
                </i>
                <a href="{{ url('/cwadmin/dashboard')}}">
                    Home
                </a>
                <i class="fa fa-angle-right">
                </i>
                <a href="{{ url('/cwadmin/videos')}}">
                    Videos
                </a>
                <i class="fa fa-angle-right">
                </i>
                <a href="#">
                    Show Videos
                </a>
            </li>
        </ul>
    </div>

    <!-- Page title section -->
    <h1 class="page-title">
        Show Management
        <small>
        </small>
    </h1>

    <!-- Messages section -->
    @if ($errors->any())
        <ul class="alert alert-danger ul-alert">
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-full-width">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-reorder">
                                    </i><?php echo __('Edit Details') ?>
                                </div>
                            </div>

                            <div class="portlet-body form locations">
                               

                                <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="id" id="id" value="{{$item['id']}}">
                                <div class="form-body">
                                    <div class="row">

                                        <!-- Left side section -->
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Title
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <input type="text" class="form-control" name="title" id="title"
                                                               value="{{ $item['title'] }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                     YouTube Video URL
                                                    <span class="required">
                                                    *
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>     
                                                 <iframe src="//www.youtube.com/embed/{{ $item['youtube_video_url'] }}"></iframe>
    
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

