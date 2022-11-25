<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminLogin extends Controller
{
    public function login()
    {
        return view('ap.login');
    }

    public function do_login(Request $request)
    {
        $admin = Admin::where('email', '=', $request->email)
            ->where('password', '=', $request->password)
            ->first();

        if ($admin) {
            $request->session()->put('Admin', $admin->name);

            return redirect('adminpanel');

        } else {
            return redirect()->back()->with('errors', 'Wrong password or account doesn\'t exist');
        }
    }
}
