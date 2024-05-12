<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request){
        return view('page.buku.kategori');
    }

    public function indexx(Request $request){
        $data = [
            'datakategori' => Kategori::all()
        ];
        return view('datakategori', $data );
    }

    public function kategori(Request $request){
        //dd($request->all());
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan'    => 'required'
        ]);
        $dataKategori = [
            'nama_kategori'   => $request->nama_kategori,
            'keterangan'      => $request->keterangan,
            'status'       => 'Aktif',
        ];
        Kategori::create($dataKategori);
        echo "data berhasil disimpan";
    }

    public function edit(Request $request, $id){
        $data = [
            'datadetailkategori' => Kategori::where('id', $id)->first()
        ];
        return view('editkategori', $data);
    }
public function ubah(Request $request, $id){
    //dd($request->all());
    $request->validate([
        'nama_kategori'  => 'required',
        'keterangan'     => 'required',
    ]);
    $dataSimpan = [
        'nama_kategori'  => $request->nama_kategori,
        'keterangan'     => $request->keterangan,
        'status'         => 'Aktif'
    ];
    Kategori::where('id', $id)->update($dataSimpan);
        return redirect('/lihatkategori');
}

public function hapus(Request $request, $id){
    Kategori::where('id', $id)->delete();
    return redirect('/lihatkategori');
}
}
