<?php

namespace App\Http\Controllers;
use Auth;
use Session;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function admin_login_view() {
        $page_title = "  Admin Login | Pamilya Muna Party List";
        return view('admin.login', compact('page_title'));
    }

    public function doLogin() { 
        $email = request()->email;
        $password = request()->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {
            if (Auth::user()->status == 1) {
                return redirect()->intended('/dashboard');  
            }
            return redirect()->back()->with('danger', 'Your account is blocked.');  
        }
        else {
            return redirect()->back()->with('danger', 'Invalid username or password.');  
        }
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->intended('/admin/login');
    }
}
