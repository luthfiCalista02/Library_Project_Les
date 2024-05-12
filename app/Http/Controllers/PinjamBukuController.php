<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinjamBukuController extends Controller
{
    public function index(Request $request){
        return view('page.pinjambuku.index');
    }

    public function tambahpeminjaman(Request $request){
        return view('page.pinjambuku.create');
    }

    public function simpantransaksi(Request $request){
        return response()->json([
            'tanggal'       => $request->tanggalpinjam,
        ]);
    }
}
