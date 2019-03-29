<?php

namespace App\Http\Controllers\CwAdmin;

use App\Http\Controllers\Controller;
use App\Customer;
use App\Produce;
use App\Notification;



class DashboardController extends Controller
{
    public function dashboard() {
    	$items = \DB::table('cw_selling_unit')
            ->join('cw_produce', 'cw_produce.selling_unit_id', '=', 'cw_selling_unit.id')
            ->select('cw_produce.*','cw_selling_unit.unit')
            ->get();
      	$customerCount = Customer::get()->count();
    	$produceCount = Produce::get()->count();
    	$notificationCount = Notification::get()->count();
        return view('cwadmin.dashboard.dashboard', compact('customerCount','produceCount','notificationCount','items'));
   }
  	 
  	 	
  
}
