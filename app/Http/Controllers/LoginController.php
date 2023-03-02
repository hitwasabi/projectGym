<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    //hi
    function viewLogin(){
        return view('login');
    }

    function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $rs = Auth::attempt(
            ['email'=>$email,'password'=>$password]
        );
        if($rs == true){
            $user = Auth::user();
            if($user->isAdmin ==1){
                return redirect('admin/home');
            }else{
                return redirect('client/home');
            }
        }else{
            return redirect('login');
        }
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
