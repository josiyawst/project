@extends('layouts.admin_login')
@section('content')
    <style>
        .alert-success {
            color: #3c763d !important;
            border-color: transparent !important;
        }
    </style>
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        {!! Form::open(['url' => '/cwadmin/authenticate', 'class' => 'form-horizontal login-form', 'files' => true, 'method' => 'POST']) !!}
        <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">

        <h3 class="form-title">
            Login to your account
        </h3>

        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class','alert-success') }}">
                {{ Session::get('message') }}
            </p>
        @endif

        @if(Session::has('logout_message'))
            <p class="alert {{ Session::get('alert-class','alert-success','login-error') }}">
			<span class="alert alert-success">
				{{ Session::get('logout_message') }}
			</span>
            </p>
        @endif

        @if(Session::has('error_message'))
            <p class="alert {{ Session::get('alert-class','bg-danger','login-error') }}">
		<span class="alert-danger">
			{{ Session::get('error_message') }}
		</span>
            </p>
        @endif

        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert">
            </button>
            <!-- INFORMATION MESSAGES-->
            <span>
			Enter email and password.
		</span>
        </div>
        <!-- Adding login form  -->
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-12">
                <div class="input-icon">
                    <i class="fa fa-user">
                    </i>
                    {!! Form::email('email', null, ['class' => 'form-control placeholder-no-fix',
                    'placeholder' => 'E-mail',
                    'id'          => 'email',
                    'oninput'     => 'email_validation(this);',
                    'oninvalid'   => 'email_validation(this);',
                    'required'    => 'true']) !!}
                    {!! $errors->first('email', '
                    <p class="help-block">
                        :message
                    </p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-12">
                <div class="input-icon">
                    <i class="fa fa-lock">
                    </i>
                    {!! Form::password('password', ['class' => 'form-control placeholder-no-fix',
                    'placeholder' => 'Password',
                    'id'          => 'password',
                    'oninput'     => 'password_validation(this);',
                    'oninvalid'   => 'password_validation(this);',
                    'required' => 'true']) !!}
                    {!! $errors->first('password', '
                    <p class="help-block">
                        :message
                    </p>') !!}
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn blue pull-left">
                Login
                <i class="m-icon-swapright m-icon-white">
                </i>
            </button>
        </div>
        <div class="forget-password">
            <h4>
                Forgot your password ?
            </h4>
            <p>
                No worries, click
                <a href="javascript:;" id="forget-password">
                    here
                </a>
                to reset your password.
            </p>
        </div>
    {!! Form::close() !!}
    <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form action="{{ url('/cwadmin/reset/password/link') }}" method="post" class="forget-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h3>
                Forgot Password ?
            </h3>
            <p>
                Enter your email address below to reset your password.
            </p>

            <div class="form-group">
                <div class="input-icon">
                    <i class="fa fa-envelope">
                    </i>
                    <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email"
                           name="email"/>
                </div>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn">
                    <i class="m-icon-swapleft">
                    </i> Back
                </button>
                <input type="submit" class="btn blue pull-right">
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>
    <!-- END LOGIN -->
    <script src="{{ URL::asset('assets/backend/validation/login/login_validation.js') }}" type="text/javascript">
    </script>

@endsection
