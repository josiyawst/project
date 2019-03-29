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
                View
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
                                                Role
                                                <span class="required">
                                                </span>
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item->customer_role['role'] }}
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
                                                        {{ $item['name'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-12">
                                                Business Name
                                                <span class="required">
                                                </span>
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item['business_name'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-12">
                                                Primary Phone
                                                <span class="required">
                                                </span>
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item['primary_phone'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-12">
                                                Alternate Phone
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item['alternate_phone'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <!-- Right side section -->
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-12">
                                                Address
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item['address'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-12">
                                                City/Village
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item['city_village'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-12">
                                                District
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item['district'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-12">
                                                Taluk
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item['taluk'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-12">
                                                Area
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item['area'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <label class="control-label col-md-12">
                                                Pincode
                                            </label>
                                            <div class="col-md-12">
                                                <div class="input-icon right">
                                                    <i class="fa">
                                                    </i>
                                                    <label class="form-control show-bold">
                                                        {{ $item['pincode'] }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="{{ url('/cwadmin/user/edit/'.$item->id) }}" class="btn blue">
                                            Edit
                                        </a>
                                        <a href="{{ url('/cwadmin/users') }}" class="btn default">
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
    document.title ="{{ config('global.site_title') }} : Users";
</script>
@endsection