<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class RegisterController extends Controller
{
    public function register(){
        return view('/register');
    }
    public function storeaccount(Request $request){
        $name = $request->get('name');
        $email =$request->get('email');
        $password = $request->get('password');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $isAdmin = $request->get('isAdmin');
        $level = $request->get('level');
        DB::table('users')->insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password),
            'phone'=>$phone,
            'address'=>$address,
            'isAdmin'=>$isAdmin,
            'level'=>$level,
            ]);
        return redirect('/login');
    }
}
