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
                <a href="{{ url('/cwadmin/users') }}">
                    Users
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
                        </i>Users Listing
                    </div>
                </div>

                <div class="portlet-body flip-scroll">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ url('/cwadmin/user/create' ) }}"
                                       class="btn btn-success mt-ladda-btn ladda-button btn-circle">
                                        Add New
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column item-list">
                        <thead class="flip-content">
                        <tr>
                            <th class="center" style="display: none;">
                                
                            </th>
                            <th class="center">
                                #
                            </th>
                            <th class="center">
                                Name
                            </th>
                            <th class="center">
                                Primary Phone
                            </th>
                            <th class="center">
                                Role
                            </th>
                            <th class="center">
                                Produce
                            </th>
                            <th class="center">
                                Status
                            </th>
                            <th class="center">
                                View
                            </th>
                            <th class="center">
                                Edit
                            </th>
                            <th class="center">
                                Delete
                            </th>                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(isset($items) && sizeof($items) > 0)  {
                        $slno = 0;
                        foreach ($items as $item):
                        $slno++
                        ?>
                        <tr>
                            <td class="center" style="display: none;">
                                
                            </td>
                            <td class="center">
                                {{ $slno }}
                            </td>
                            <td class="center">
                                {{ $item->name }}
                            </td>
                            <td class="center">
                                {{ $item->primary_phone }}
                            </td>
                            <td class="center">
                                {{ $item->customer_role['role'] }}
                            </td>
                            <td class="center">
                                <a href="{{ url('/cwadmin/produces/customer/'.$item->id) }}"
                                   class="btn btn-outline btn-circle btn-sm yellow">
                                    <span class="fa fa-search">
                                    </span>&nbsp; Show
                                </a>
                            </td>
                            <td>
                                @if($item->status == 1)
                                    <a href="{{ url('/cwadmin/user/deactivate/'.$item->id) }}"
                                       class="btn btn-outline btn-circle btn-sm blue">
									<span class="fa fa-check">
									</span>&nbsp; Active
                                    </a>
                                @else
                                    <a href="{{ url('/cwadmin/user/activate/'.$item->id) }}"
                                       class="btn btn-outline btn-circle btn-sm red">
									<span class="fa fa-times">
									</span>&nbsp; Inactive
                                    </a>
                                @endif
                            </td>
                            <td class="center">
                                <a href="{{ url('/cwadmin/user/view/'.$item->id) }}"
                                   class="btn btn-outline btn-circle btn-sm yellow">
									<span class="fa fa-search">
									</span>&nbsp; View
                                </a>
                            </td>
                            <td class="center">
                                <a href="{{ url('/cwadmin/user/edit/'.$item->id) }}"
                                   class="btn btn-outline btn-circle btn-sm purple">
									<span class="fa fa-pencil">
									</span>&nbsp; Edit
                                </a>
                            </td>
                            <td class="center">
                                <a href="#" class="btn btn-outline btn-circle btn-sm red"
                                   onclick="javascript:deleteRecord({{ $item->id }});">
                                    <i class="fa fa-trash-o">
                                    </i>&nbsp; Delete
                                </a>
                            </td>
                            
                        </tr>
                        <?php endforeach; ?>
                        <?php } ?>
                        </tbody>
                    </table>
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
                    window.location.replace("{{ config('global.base_path') }}cwadmin/user/delete/" + id);
                }
            });
        }
    </script>
@endsection