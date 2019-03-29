<?php

namespace App\Http\Controllers\CwAdmin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserGroup;
use Auth;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            $user = User::with('user_group')->where('email', $email)->get();
            \Session::put('authorization', $user[0]->user_group);
            \Session::put('auth_group_id', $user[0]->user_group['id']);
            \Session::put('auth_user_id', $user[0]->id);
            \Session::put('auth_user_name', $user[0]->name);
            if ($user[0]->status == 0)
                return redirect('/cwadmin/login')->with('error_message', 'Access denied! Please contact administrator.');
            switch ($user[0]->user_group['id']) {
                case 1://super admin dashboard
                    return redirect()->intended('/cwadmin/dashboard');
            }

        } else {
            return redirect('/cwadmin/login')->with('error_message', 'Email or password is incorrect!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/cwadmin/login')->with('message', 'You have been successfully logged out!');;
    }

    public function view_set_password($email)
    {
        return view('auth.set_password', compact('email'));
    }

    public function save_set_password(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $email = decrypt($email);
        $count = User::where('email', $email)->where('reset_pwd_status', 1)->count();

        if ($count == 1) {
            $new = $data['new_password'];
            $confirm = $data['confirm_password'];
            if ($new == $confirm) {
                $hashed_password = \Hash::make($new);
                User::where('email', $email)->update(['password' => $hashed_password, 'reset_pwd_status' => 2]);
                return redirect('/cwadmin/login')->with('message', 'Password set successfully.');
            } else {
                return redirect()->back()->with('error_message', 'New & Confirm Password does not match.');
            }
        } else {
            return redirect('/cwadmin/login')->with('error_message', 'Reset password link has expired.');
        }
    }

    public function send_email_link(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $count = User::where('email', $email)->count();
        $user = User::where('email', $email)->get();
        if ($count == 1) {
            $contents = '';
            $contents .= 'A link to reset the password has been generated. Please click ';
            $contents .= "<a href='" . url('/') . "/cwadmin/reset/password/view/" . encrypt($email) . "' target='_blank' style='color:#fd8827;font-family:Tahoma, Geneva, sans-serif; line-height:22px; font-size:15px; font-weight:bold;' >here</a> to reset your password.";
            $subject = "Reset Password";
            $user_name = $user[0]->name;
            $display_name = \Config::get('app.display_name');
            $from = \Config::get('app.from_email');
            $to = $email;
            send_single_email($contents, $subject, $display_name, $to, $from, $user_name);

            User::where('email', $email)->update(['reset_pwd_status' => 1]);
            return redirect('/cwadmin/login')->with('message', 'Reset password link sent to your registered email.');
        } else {
            return redirect('/cwadmin/login')->with('error_message', 'Please enter a valid registered email address.');
        }
    }

    public function view_reset_password($email)
    {
        $email = decrypt($email);
        $user = User::where('email', $email)->first();
        if ($user != null && $user->reset_pwd_status == 1) {
            return view('auth.reset_password', compact('email'));
        } else if ($user != null && $user->reset_pwd_status == 2) {
            return redirect('/cwadmin/login')->with('error_message', 'Reset password link has expired.');
        } else {
            return redirect('/cwadmin/login')->with('error_message', 'Reset password link is not valid.');
        }
    }

    public function save_reset_password(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $count = User::where('email', $email)->where('reset_pwd_status', 1)->count();
        if ($count == 1) {
            $new = $data['new_password'];
            $confirm = $data['confirm_password'];
            if ($new == $confirm) {
                $hashed_password = \Hash::make($new);
                User::where('email', $email)->update(['password' => $hashed_password, 'reset_pwd_status' => 2]);
                return redirect('/cwadmin/login')->with('message', 'Password reset successfully.');
            } else {
                return redirect()->back()->with('error_message', 'New & Confirm Password does not match.');
            }
        } else {
            return redirect('/cwadmin/login')->with('error_message', 'Reset password link has expired.');
        }
    }
}
