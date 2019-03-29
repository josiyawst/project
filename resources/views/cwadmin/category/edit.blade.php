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
                <a href="{{ url('/cwadmin/category')}}">
                    Category
                </a>
                <i class="fa fa-angle-right">
                </i>
                <a href="#">
                    Edit Category
                </a>
            </li>
        </ul>
    </div>

    <!-- Page title section -->
    <h1 class="page-title">
        Category Management
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
                                {!! Form::open(['url' => '/cwadmin/category/update', 'id' => 'EditForm', 'name' => 'EditForm','class' => 'form-horizontal form-row-seperated', 'files' => true, 'method' => 'post','enctype' => 'multipart/form-data']) !!}

                                <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="id" id="id" value="{{$item['id']}}">
                                <div class="form-body">
                                    <div class="row">

                                        <!-- Left side section -->
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                   Select Parent
                                                    <span class="required">
                                                    *
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                                name="parent_id" id="parent_id" tabindex="-1"
                                                                aria-hidden="true" required>
                                                                <option value="0">
                                                                    --- Parent ---
                                                                </option>
                                                                 @foreach($data as $data1)
                                                                <option value="{{ $data1->id }}" {{ $data1->id == $item['parent_id'] ? "selected" : "" }}>
                                                                    {{ $data1->category }}
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
                                                        <input type="text" class="form-control" name="category" id="category"
                                                               value="{{ $item['category'] }}"/>
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
                                                    onclick="window.location='{{ url('cwadmin/categories') }}'">
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
        {{--document.title = "{{ config('global.site_title') }} : Users";--}}
        document.title = "{{ config('global.site_title') }} : Users";
        $(document).ready(function () {
            var FormValidation = function () {
                var r = function () {
                    var e = $("#EditForm"),
                        r = $(".alert-danger", e),
                        i = $(".alert-success", e);
                    e.validate({
                        errorElement: "span",
                        errorClass: "help-block help-block-error",
                        focusInvalid: false,
                        ignore: "",
                        rules: {
                            parent_id: {
                                required: true
                            },
                            category: {
                                required: true
                            },
                        },

                        messages: {
                            parent_id: {
                                required: "Please select parent.",
                            },
                            category: {
                                required: "Please enter category.",
                            },
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
gnhfmgmjhyg