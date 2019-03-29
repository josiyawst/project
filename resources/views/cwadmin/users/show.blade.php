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
                    View
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

    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-full-width">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-reorder">
                                    </i><?php echo __('View Details') ?>
                                </div>

                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                </div>
                            </div>

                            <div class="portlet-body form locations">
                                <div class="form-body">
                                    <div class="row">

                                        <!-- Left side section -->
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Role / User Group
                                                    <span class="required">
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            {{$item['user_group']->title}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Name
                                                    <span class="required">
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            {{$item['name']}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Phone
                                                    <span class="required">
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            {{$item['phone']}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Email
                                                    <span class="required">
                                                </span>
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            {{$item['email']}}
                                                        </label>
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
                                                        <label class="form-control show-bold">
                                                            {{$item['address']}}
                                                        </label>
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
                                                        <label class="form-control show-bold">
                                                            {{$item['nationality']}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Salary (%)
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            {{$item['salary_percentage']}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right side section -->
                                        <div class="col-md-6">
                                            <div class="form-group last" style="margin-bottom: 130px">
                                                <label class="control-label col-md-4">
                                                    Photo
                                                </label>
                                                <div class="col-md-8">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileupload-new thumbnail text-center"
                                                             style="width: 170px; height: 120px;">

                                                            <?php if($item['image'] != ''){ ?>
                                                            <a class="mix-preview fancybox-button"
                                                               href="{{ URL::asset('assets/uploads/staffs/'.$item['image'] )}}">
                                                                <img src="{{ URL::asset('assets/uploads/staffs/'.$item['image'] )}}"
                                                                     width="120" height="120">
                                                            </a>
                                                            <?php } ?>

                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 127px; max-height: 127px; line-height: 20px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Date of Joining
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            {{date('M d, Y', strtotime($item['date_of_joining']))}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Passport Number
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            {{$item['passport_number']}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Visa Renewal Date
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            {{$visa_renewal_date == 'N.A' ? '' : date('M d, Y', strtotime($visa_renewal_date))}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Vacation Date
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            {{ $vacation_date == 'N.A' ? '' : date('M d, Y', strtotime($vacation_date))}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-12">
                                                    Rejoined Date
                                                </label>
                                                <div class="col-md-12">
                                                    <div class="input-icon right">
                                                        <i class="fa">
                                                        </i>
                                                        <label class="form-control show-bold">
                                                            <?php if($rejoined_date == null) { ?>
                                                            N.A
                                                            <?php } else { ?>
                                                            {{$rejoined_date == 'N.A' ? '' : date('M d, Y', strtotime($rejoined_date))}}
                                                            <?php } ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions fluid">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="{{ url('/mnadmin/staff/edit/'.$item->id) }}" class="btn blue">
                                                Edit
                                            </a>
                                            <a href="{{ url('/mnadmin/staffs') }}" class="btn default">
                                                Back
                                            </a>
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
@section('scripts')
    <script>
        // Title
        document.title = " Magic Needle : Staffs";
    </script>
@endsection