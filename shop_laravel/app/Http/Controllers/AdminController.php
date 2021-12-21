<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //

    public function loginAdmin()
    {
      // if(Auth::check())
      // {
      //   return redirect()->to('home');
      // }
        return view('login');
    }
    public function postloginAdmin(Request $request)
    {
      $remember = $request->has('remember-me')?true:false; // neu true se luu token de dang nhap lan sau 
      //auth ho trợ check tài khoản
      if(auth::attempt([
        'email' => $request->email, 
        'password' => $request->password,
      ],$remember))
      {
        // return dd(bcrypt('123456'));
        return redirect()->to('admin/home');
      }
    }
}
