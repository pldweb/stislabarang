<?php

namespace App\Http\Controllers\Otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;


class OtentikasiController extends Controller
{
    //
    public function index(){
        return view('otentikasi.login');
    }

    public function login(Request $request){
        // dd($request->all());
    //     $data = User::where('email',$request->email)->firstOrFail();
    //     if($data){
    //         if(Hash::check($request->password,$data->password)){
    //         session(['berhasil_login' => true]);
    //         return redirect('/dashboard');
        
    //     }
    //  }
    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        return view('/index');
    }
     return redirect('/')->with('message','username atau Password salah');
    }

    public function logout(Request $request){
        // $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}