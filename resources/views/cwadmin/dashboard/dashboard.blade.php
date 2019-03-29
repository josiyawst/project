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
    <div class="page-bar1">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home">
                </i>
                <a href="{{ url('/cwadmin/dashboard') }}">
                    Home
                </a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-stack-overflow"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo isset($produceCount) ? $produceCount : "0";?>
                    </div>
                     
                    <div class="desc">
                        Total Produce
                    </div>
                    </br>
                </div>

                <a class="more" href="{{ url('cwadmin/produce') }}">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo isset($customerCount) ? $customerCount : "0";?>
                    </div>
                    
                    <div class="desc">
                        Total Users
                    </div>
                    </br>
                </div>
                <a class="more" href="{{ url('cwadmin/users') }}">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>


        <div class="col-md-4">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-bell"></i>
                </div>
                <div class="details">
                    <div class="number" style="font-size: 28px;">
                        <?php echo isset($notificationCount) ? $notificationCount : "0";?>
                    </div>

                    <div class="desc">
                        Total Notifications
                    </div>
                    </br>
                </div>

                <a class="more" href="{{ url('cwadmin/notifications') }}">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- END DASHBOARD STATS -->


    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list-alt">
                        </i>Recent Produce
                    </div>
                </div>

                <div class="portlet-body">
                  
                    <table class="table table-striped table-bordered table-hover table-checkable order-column item-list">
                        <thead class="flip-content">
                        <tr>
                            <th style="display: none;">

                            </th>
                            <th class="center">
                                #
                            </th>
                            <th class="center">
                               Name
                            </th>
                            <th class="center">
                                Type
                            </th>
                            <th class="center">
                                Selling unit
                            </th>
                            <th class="center">
                             Price/Unit
                            </th>
                            <th class="center">
                              Qty Available
                            </th>
                            
                            <th class="center">
                                View
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
                        <tr class="odd gradeX">
                            <td style="display: none;">
                            </td>
                            <td class="center">
                                {{ $slno }}
                            </td>
                            <td class="center">
                                {{ $item->produce_name }}
                            </td>
                            <td class="center">
                                {{ $item->grade_quality}}
                            </td>
                            
                            <td class="center">
                              
                                {{ $item->unit}}
                            </td>
                        <td class="center">

                               Rs.{{ $item->unit_price}}/-
                            </td>
                            <td class="center">
                                {{ $item->available_quantity}}{{ $item->unit}}
                            </td>
                           
                            <td class="center">
                                <a href="{{ url('/cwadmin/produce/view/'.$item->id) }}"
                                   class="btn btn-outline btn-circle btn-sm yellow">
									<span class="fa fa-search">
									</span>&nbsp; View
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
        document.title = "{{ config('global.site_title') }} : Dashboard";
    </script>
@endsection