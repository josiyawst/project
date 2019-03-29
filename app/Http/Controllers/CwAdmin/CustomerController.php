<?php

namespace App\Http\Controllers\CwAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\CustomerRole;

use Redirect;
use Validator;

class CustomerController extends Controller
{
    /* Page events */
    public function index()
    {
        $items = Customer::with('customer_role')->orderBy('id', 'desc')->get();
        return view('cwadmin.customers.index', compact('items'));
    }

    public function show($id)
    {
        $item = Customer::with('customer_role')->findorFail($id);
        return view('cwadmin.customers.show', compact('item'));
    }

    public function create()
    {
        $roles = CustomerRole::where('status', 1)->orderBy('id', 'asc')->get();
        return view('cwadmin.customers.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, Customer::$rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput($request->input())->withErrors($validator);
        }

        Customer::create($data);

        return redirect('/cwadmin/users')->with('message', 'User added.');
    }

    public function edit($id)
    {
        $roles = CustomerRole::where('status', 1)->orderBy('id', 'asc')->get();
        $item = Customer::findorFail($id)->toArray();
        return view('cwadmin.customers.edit', compact('item', 'roles'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];

        $validator = Customer::validateUpdate($data, $id);
        if ($validator->fails()) {
            return Redirect::back()->withInput($request->input())->withErrors($validator);
        }

        $customer = Customer::findorfail($id);
        $customer->update($data);

        return redirect('cwadmin/users')->with('message', 'User updated.');
    }

    public function destroy($id)
    {
//        $customer = Customer::where('id', $id)->get();
        Customer::destroy($id);

        return redirect('/cwadmin/users')->with('message', 'User deleted.');
    }

    public function activate($id)
    {
        Customer::where('id', $id)->update(['status' => 1]);
        return redirect('/cwadmin/users')->with('message', 'User status activated.');
    }

    public function deactivate($id)
    {
        Customer::where('id', $id)->update(['status' => 0]);
        return redirect('/cwadmin/users')->with('message', 'User status deactivated.');
    }
}
