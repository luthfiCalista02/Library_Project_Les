<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
//login
public function index(Request $request){
    return view('login2');
}

public function register(Request $request){
    return view('register');
}

public function registered(Request $request){
    //dd($request->all());
    $request->validate([
        'name_lengkap'  => 'required',
        'email'         => 'required',
        'password'      => 'required',
        'jenis_kelamin' => 'required'
    ]);
    $dataStore = [
        'name_lengkap'  => $request->name_lengkap,
        'email'         => $request->email,
        'role'          => 'Peminjam',
        'jenis_kelamin' => $request->jenis_kelamin,
        'pictures'      => 'Default.jpg',
        'password'      => Hash::make($request->password)
    ];
    User::create($dataStore);
    echo "data berhasil disimpan";
}

public function ceklogin(Request $request){
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        echo "Login Berhasil";
        return redirect('/buku');
    } else {
        echo "Login Gagal";
    }
}

public function logout(Request $request){
    $request->session()->invalidate();
    $request->session()->regenerate();
    return redirect('/');
}
}
