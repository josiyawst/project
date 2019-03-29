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
                <a href="{{ url('/mnadmin/dashboard')}}">
                    Home
                </a>
                <i class="fa fa-angle-right">
                </i>
                <a href="{{ url('/mnadmin/staffs')}}">
                    Staffs
                </a>
                <i class="fa fa-angle-right">
                </i>
                <a href="#">
                    Edit
                </a>
            </li>
        </ul>
    </div>

    <!-- Page title section -->
    <h1 class="page-title">
        Staffs Management
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
                                {!! Form::open(['url' => '/mnadmin/staff/update', 'id' => 'EditForm', 'name' => 'EditForm','class' => 'form-horizontal form-row-seperated', 'files' => true, 'method' => 'post','enctype' => 'multipart/form-data']) !!}

                                <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="id" id="id" value="{{$item['id']}}">
                                <div class="form-body">
                                    <div class="row">

                                        <!-- Left side section -->
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Select Role / User Group
                                                    <span class="required">
                                                    *
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                                name="group_id" id="group_id" tabindex="-1"
                                                                aria-hidden="true" required>
                                                            @foreach($groups as $data)
                                                                <option value="{{ $data->id }}" {{ $data->id == $item['group_id'] ? "selected" : "" }}>
                                                                    {{ $data->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Staff Name
                                                    <span class="required">
                                                    *
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <input type="text" class="form-control" name="name" id="name"
                                                               value="{{ $item['name'] }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Phone
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <input type="text" class="form-control" name="phone" id="phone"
                                                               value="{{ $item['phone'] }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Email
                                                    <span class="required">
                                                    *
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <input type="text" class="form-control" name="email" id="email"
                                                               value="{{ $item['email'] }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Address
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <input type="text" class="form-control" name="address"
                                                               id="address" value="{{ $item['address'] }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Nationality
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <input type="text" class="form-control" name="nationality"
                                                               id="nationality" value="{{ $item['nationality'] }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Salary (%)
                                                    <span class="required">
                                                    *
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <input type="text" class="form-control" name="salary_percentage"
                                                               id="salary_percentage"
                                                               value="{{ $item['salary_percentage'] }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right side section -->
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">
                                                    Staff Image
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileupload-new thumbnail"
                                                             style="width: 200px; height: 150px;">
                                                            <?php if($item['image'] != ''){ ?>
                                                            <a class="mix-preview fancybox-button"
                                                               href="{{ URL::asset('assets/uploads/staffs/'.$item['image'] )}}">
                                                                <img src="{{ URL::asset('assets/uploads/staffs/'.$item['image'] )}}"
                                                                     width="127" height="127">
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 127px; max-height: 127px; line-height: 20px;">
                                                        </div>
                                                        <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new">
                                                                Select image
                                                            </span>
                                                            <span class="fileinput-exists">
                                                                Change
                                                            </span>
                                                            <input type="file" name="image" id="imgUploadSec">
                                                        </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists"
                                                               data-dismiss="fileinput">
                                                                Remove
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <br/>Image uploaded should be of dimension 700 x 770 px.
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <div class="form-group form-md-line-input">
                                                    <label class="control-label col-md-12">
                                                        Date of Joining
                                                    </label>
                                                    <div class="col-md-12">
                                                        <div class="input-icon right">
                                                            <i class="fa">
                                                            </i>
                                                            <input class="form-control form-control-inline date-picker"
                                                                   size="16" type="text" name="date_of_joining"
                                                                   id="date_of_joining" autocomplete="off" readonly
                                                                   value="{{ date('M d, Y', strtotime($item['date_of_joining'])) }}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <div class="form-group form-md-line-input">
                                                    <label class="control-label col-md-12">
                                                        Passport Number
                                                    </label>
                                                    <div class="col-md-12">
                                                        <div class="input-icon right">
                                                            <i class="fa">
                                                            </i>
                                                            <input type="text" class="form-control"
                                                                   name="passport_number" id="passport_number"
                                                                   value="{{ $item['passport_number'] }}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <div class="form-group form-md-line-input">
                                                    <label class="control-label col-md-12">
                                                        Visa Renewal Date
                                                    </label>
                                                    <div class="col-md-12">
                                                        <div class="input-icon right">
                                                            Click <a data-toggle="modal"
                                                                     href="{{ url('mnadmin/staff/visa_renewal_dates/'.$item['id']) }}">here</a>
                                                            to update visa
                                                            renewal dates
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <div class="form-group form-md-line-input">
                                                    <label class="control-label col-md-12">
                                                        Vacation Date
                                                    </label>
                                                    <div class="col-md-12">
                                                        <div class="input-icon right">
                                                            Click <a data-toggle="modal"
                                                                     href="{{ url('mnadmin/staff/vacation_dates/'.$item['id']) }}">here</a>
                                                            to update vacation dates
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <div class="form-group form-md-line-input">
                                                    <label class="control-label col-md-12" style="padding-bottom: 5px;">
                                                        Admin Panel Access
                                                    </label>
                                                    <div class="col-md-12">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" name="admin_panel_access"
                                                                   id="admin_panel_access"
                                                                   class="md-check" {{$item['admin_panel_access'] == 1 ? "checked" : "" }} />
                                                            <label for="admin_panel_access">
                                                            <span class="inc">
                                                            </span>
                                                                <span class="check">
                                                            </span>
                                                                <span class="box">
                                                            </span> Allow Access
                                                            </label>
                                                        </div>
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
                                                    onclick="window.location='{{ url('mnadmin/staffs') }}'">
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
        document.title = " Magic Needle : Staffs";
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
                            group_id: {
                                required: true
                            },
                            name: {
                                required: true, regextitle: true
                            },
                            // phone: {
                            //     required: true
                            // },
                            email: {
                                required: true
                            },
                            // address: {
                            //     required: true
                            // },
                            // nationality: {
                            //     required: true
                            // },
                            salary_percentage: {
                                required: true
                            },
                            // date_of_joining: {
                            //     required: true
                            // },
                            // passport_number: {
                            //     required: true
                            // },
                            visa_renewal_date: {
                                required: true
                            },
                            vacation_date: {
                                required: true
                            },
                            // image: {
                            //     required: false, accept: "png|jpeg|jpg"
                            // },
                        },

                        messages: {
                            group_id: {
                                required: "Please select role."
                            },
                            name: {
                                required: "Please enter name.", regextitle: "Invalid characters."
                            },
                            // phone: {
                            //     required: "Please enter phone."
                            // },
                            email: {
                                required: "Please enter email"
                            },
                            // address: {
                            //     required: "Please enter address."
                            // },
                            // nationality: {
                            //     required: "Please enter nationality."
                            // },
                            salary_percentage: {
                                required: "Please enter salary percentage."
                            },
                            // date_of_joining: {
                            //     required: "Please select joining date."
                            // },
                            // passport_number: {
                            //     required: "Please enter passport number."
                            // },
                            visa_renewal_date: {
                                required: "Please select visa renewal date."
                            },
                            vacation_date: {
                                required: "Please select vacation date."
                            },
                            // image: {
                            //     required: "Please select an image.",
                            //     accept: "Only png, jpeg, and jpg file formats accepted."
                            // }
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
            $("#email").change(function () {
                if ($("#email").val() != '') {
                    var elemVal = $("#email").val();
                    var id = $("#id").val();
                    $.ajax({
                        url: "{{ config('global.basepath') }}mnadmin/staff/exists/" + elemVal + "/" + id,
                        cache: false,
                        success: function (html) {
                            if (html == 1) {
                                alert("Email already exists.");
                            }
                        }
                    });
                }
            });

            $("#salary_percentage").inputFilter(function(value) {
                return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 100);
            });
        });
    </script>
@endsection