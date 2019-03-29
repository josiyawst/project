@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">
                Manage Profile
            </h3>
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ url('/cwadmin/dashboard')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                    <a href="{{ url('/cwadmin/profile')}}">Profile</a>
                </li>
            </ul>
        </div>
    </div>

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

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <div class="row">
        <div class="col-md-6">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-reorder"></i>Update Profile
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url' => '/cwadmin/profile/update', 'id' => 'updateForm', 'name' => 'updateForm','class' => 'form-horizontal', 'method' => 'post']) !!}

                                <style type="text/css">
                                     .form-body {
                                     padding: 20px;
                                     margin-inline-start: 20px;
                                    }
                                 </style>







                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label class="control-label">
                                        Name<span class="required">
													*
												</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter Name"
                                           value="{{ $admin->name }}" oninput="name_validation(this)"
                                           oninvalid="name_validation(this)" required="true">
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label">
                                        Email<span class="required">
													*
												</span>
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{ $admin->email }}"
                                           oninput="email_validation(this)" oninvalid="email_validation(this)"
                                           placeholder="Enter Email" required="true">
                                </div>
                                 <div class="form-group form-md-line-input">
                                    <label class="control-label">
                                        Phone<span class="required">
                                                    *
                                                </span>
                                    </label>
                                    <input type="phone" class="form-control" id="phone" name="phone"
                                           value="{{ $admin->phone }}"
                                           oninput="phone_validation(this)" oninvalid="phone_validation(this)"
                                           placeholder="Enter Phone" required="true">
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label">
                                        Address<span class="required">
                                                    *
                                                </span>
                                    </label>
                                    <input type="address" class="form-control" id="address" name="address"
                                           value="{{ $admin->address }}"
                                           oninput="address_validation(this)" oninvalid="address_validation(this)"
                                           placeholder="Enter Address" required="true">
                                </div>




                                <style type="text/css">
                                .form-horizontal .form-group.form-md-line-input {
                                     padding-top: 10px;
                                     margin: 0 -15px 10px;
                                    }
                                 </style>
                                 <div class="form-group form-md-line-input">
                                    <input type="checkbox" name="facebook_enabled" id="facebook_enabled"
                                    class="md-check" {{$admin['facebook_enabled'] == 1 ? "checked" : "" }} />&nbsp;&nbsp;
                                      <i class="fa fa-facebook-square" style="font-size:15px"></i><input type="text" class="form-control" required="true"style="margin-top:-30px;"id="facebook_url" name="facebook_url" value="{{ $admin->facebook_url }}">
                                </div>
                                
                                 <div class="form-group form-md-line-input">
                                       <input type="checkbox"  id="pinterest_enabled" name="pinterest_enabled" {{$admin['pinterest_enabled'] == 1 ? "checked" : "" }}>&nbsp;&nbsp;<i class="fa fa-pinterest" style="font-size:15px"></i><input type="text" class="form-control" required="true"style="margin-top:-30px;"id="pinterest_url" name="pinterest_url" value="{{ $admin->pinterest_url }}">
                                </div>
                                 <div class="form-group form-md-line-input">
                                       <input type="checkbox" id="twitter_enabled" name="twitter_enabled"{{$admin['twitter_enabled'] == 1 ? "checked" : ""  }}>&nbsp;&nbsp;<i class="fa fa-twitter" style="font-size:15px"></i><input type="text" class="form-control" required="true"style="margin-top:-30px;"id="twitter_url" name="twitter_url" value="{{ $admin->twitter_url }}">
                                </div>
                                 <div class="form-group form-md-line-input">
                                        <input type="checkbox"  id="youtube_enabled" name="youtube_enabled" {{$admin['youtube_enabled'] == 1 ? "checked" : ""  }}>&nbsp;&nbsp;<i class="fa fa-youtube-play" style="font-size:15px"></i><input type="text" class="form-control" required="true"style="margin-top:-30px;"id="youtube_url" name="youtube_url" value="{{ $admin->youtube_url }}">
                                </div>
                                <div class="form-group form-md-line-input">
                                        <input type="checkbox"  id="linkedin_enabled" name="linkedin_enabled"  {{$admin['linkedin_enabled'] == 1 ? "checked" : ""  }}>&nbsp;&nbsp;<i class="fa fa-linkedin" style="font-size:15px"></i><input type="text" class="form-control" required="true"style="margin-top:-30px;"id="linkedin_url" name="linkedin_url" value="{{ $admin->linkedin_url }}">
                                </div>
                                <div class="form-group form-md-line-input">
                                        <input type="checkbox"  id="instagram_enabled" name="instagram_enabled"{{$admin['instagram_enabled'] == 1 ? "checked" : ""  }}>&nbsp;&nbsp;<i class="fa fa-instagram" style="font-size:15px"></i><input type="text" class="form-control" required="true"style="margin-top:-30px;"id="instagram_url" name="instagram_url" value="{{ $admin->instagram_url }}">
                                </div>
                                 
                                        </div>
                                         </div>
                                            </div>
                                        <div class="form-actions left">
                                            <button type="submit" class="btn green">Submit</button>
                        <a href="{{ url('/cwadmin/dashboard')}}" class="btn default">Cancel</a></div>
                {!! Form::close() !!}
                <!-- END FORM-->
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-reorder"></i>Update Password
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url' => '/cwadmin/password/update', 'id' => 'passUpdateForm', 'name' => 'updateForm','class' => 'form-horizontal', 'method' => 'post']) !!}
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label class="control-label">
                                Old Password<span class="required">
													*
												</span>
                            </label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                   placeholder="Enter Current Password" oninput="current_password_validation(this)"
                                   oninvalid="current_password_validation(this)" required="true">
                        </div>

                        <div class="form-group form-md-line-input">
                            <label class="control-label">
                                New Password<span class="required">
													*
												</span>
                            </label>
                            <input type="password" class="form-control" id="new_password" name="new_password"
                                   oninput="new_password_validation(this)" oninvalid="new_password_validation(this)"
                                   placeholder="Enter New Password" required="true">
                        </div>

                        <div class="form-group form-md-line-input">
                            <label class="control-label">
                                Confirm Password<span class="required">
													*
												</span>
                            </label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                   oninput="confirm_password_validation(this)"
                                   oninvalid="confirm_password_validation(this)" placeholder="Enter Confirm Password"
                                   required="true">
                        </div>

                    </div>
                    <div class="form-actions left">
                        <button type="submit" class="btn green">Submit</button>
                        <a href="{{ url('/cwadmin/dashboard')}}" class="btn default">Cancel</a></div>
                {!! Form::close() !!}
                <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.title = "{{ config('global.site_title') }} : Manage Profile";
    </script>
@endsection