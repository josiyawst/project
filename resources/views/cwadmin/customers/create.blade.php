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
                <a href="{{ url('/cwadmin/users')}}">
                    Users
                </a>
                <i class="fa fa-angle-right">
                </i>
                <a href="#">
                    Add
                </a>
            </li>
        </ul>
    </div>

    <!-- Page title section -->
    <h1 class="page-title">
        User Management
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
                                    </i><?php echo __('Enter Details') ?>
                                </div>
                            </div>

                            <div class="portlet-body form">
                                {!! Form::open(['url' => '/cwadmin/user/store', 'id' => 'AddForm', 'name' => 'AddForm','class' => 'form-horizontal form-row-seperated', 'files' => true, 'method' => 'post','enctype' => 'multipart/form-data']) !!}
                                <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                                <div class="form-body">
                                    <div class="row">

                                        <!-- Left side section -->
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="role_id" class="col-md-12">
                                                    Select Role
                                                    <span class="required">
                                                    *
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                                name="role_id" id="role_id" tabindex="-1"
                                                                aria-hidden="true" required>
                                                            @foreach($roles as $data)
                                                                <option value="{{ $data->id }}">
                                                                    {{ $data->role }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                  Category Name
                                                    <span class="required">
                                                    *
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <input type="text" class="form-control" name="categoryname" id="categoryname"
                                                               value="{{ old('categoryname') }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions fluid">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn blue" id="btnSubmit">
                                                Submit
                                            </button>
                                            <button type="button" class="btn default"
                                                    onclick="window.location='{{ url('cwadmin/users') }}'">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/pages/scripts/components-select2.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        // Title
        document.title = "{{ config('global.site_title') }} : Users";
        $(document).ready(function () {
            var FormValidation = function () {
                var r = function () {
                    var e = $("#AddForm"),
                        r = $(".alert-danger", e),
                        i = $(".alert-success", e);
                    e.validate({
                        errorElement: "span",
                        errorClass: "help-block help-block-error",
                        focusInvalid: false,
                        ignore: "",
                        rules: {
                            name: {
                                required: true, regextitle: true
                            },
                            primary_phone: {
                                required: true, phone: true
                            },
                            alternate_phone: {
                                required: false, phone: true
                            },
                            address: {
                                required: true
                            },
                            city_village: {
                                required: true
                            },
                            district: {
                                required: true
                            },
                            taluk: {
                                required: true
                            },
                            area: {
                                required: true
                            },
                            pincode: {
                                required: true, phone: true
                            }
                        },

                        messages: {
                            name: {
                                required: "Please enter name.", regextitle: "Please enter a valid name."
                            },
                            primary_phone: {
                                required: "Please enter primary phone number.",
                                phone: "Please enter a valid primary phone number."
                            },
                            alternate_phone: {
                                phone: "Please enter a valid alternate number."
                            },
                            address: {
                                required: "Please enter address."
                            },
                            city_village: {
                                required: "Please enter city/village."
                            },
                            district: {
                                required: "Please enter district."
                            },
                            taluk: {
                                required: "Please enter taluk."
                            },
                            area: {
                                required: "Please enter area."
                            },
                            pincode: {
                                required: "Please enter pincode.",
                                phone: "Please enter a valid pincode."
                            }
                        },

                        invalidHandler: function (e, t) {
                            i.hide(), r.show(), App.scrollTo(r, -200)
                        },
                        errorPlacement: function (e, r) {
                            var i = $(r).parent(".input-icon").children("i");
                            i.removeClass("fa-check").addClass("fa-warning"), i.attr("data-original-title", e.text()).tooltip({
                                container: "body"
                            })

                        },
                        highlight: function (e) {
                            $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
                        },
                        unhighlight: function (e) {
                        },
                        success: function (e, r) {
                            var i = $(r).parent(".input-icon").children("i");
                            $(r).closest(".form-group").removeClass("has-error").addClass("has-success"), i.removeClass("fa-warning").addClass("fa-check")
                        },
                        submitHandler: function (e) {
                            i.show(), r.hide(), e[0].submit()
                        }
                    })
                }
                return {
                    init: function () {
                        r()
                    }
                }
            }();
            jQuery(document).ready(function () {
                FormValidation.init()
            });
        });
    </script>
@endsection