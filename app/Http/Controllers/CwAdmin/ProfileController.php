<?php

namespace App\Http\Controllers\CwAdmin;

use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class ProfileController extends Controller
{
    public function edit()
    {
        $user_id = \Session::get('auth_user_id');
        $admin = User::where('id', $user_id)->first();
        return view('cwadmin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $user_id = \Session::get('auth_user_id');
        $validator = User::superAdminUpdate($data, $user_id);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $cwadmin = User::findorFail($user_id);
        $cwadmin->update($data);
        return redirect('/cwadmin/profile')->with('message', 'Profile updated successfully.');
    }

    public function update_password(Request $request)
    {
        $current = $request['current_password'];
        $new = $request['new_password'];
        $confirm = $request['confirm_password'];
        $user_id = \Session::get('auth_user_id');

        if ($new == $confirm) {
            $current_password = User::where('id', $user_id)->first()->password;
            if (Hash::check($current, $current_password)) {
                $hash_pass = Hash::make($confirm);;
                User::where('id', $user_id)->update(['password' => $hash_pass]);
                return redirect('/cwadmin/profile')->with('message', 'Password updated successfully.');
            } else {
                return redirect('/cwadmin/profile')->with('error_message', 'Current password is wrong.');
            }
        } else {
            return redirect('/cwadmin/profile')->with('error_message', 'New and Confirm password does not match.');
        }
    }


}   
