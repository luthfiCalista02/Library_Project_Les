<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request){
        // $data = [
        //     'databuku' => Buku::all(),
        //     'penerbit' => Penerbit::all(),
        //     'kategori' => Kategori::all()

        // ];
        // return view('bukus', $data);
        return view('page.buku.index');
    }

    public function indexx(Request $request){
        $data = [
            'databuku' => Buku::all(),
            'penerbit' => Penerbit::all()

        ];
        return view('databuku', $data );
    }
public function buku(Request $request){
    // dd($request->all());
    $request->validate([
        'judul_buku'   => 'required',
        'penulis'      => 'required',
        'penerbit'     => 'required',
        'tahun_terbit' => 'required'
    ]);
    $dataBuku = [
        'judul_buku'   => $request->judul_buku,
        'penulis'      => $request->penulis,
        'penerbit'     => $request->penerbit,
        'tahun_terbit' => $request->tahun_terbit,
        'kategori_id'  => '12345',
        'status'       => 'Aktif',
        'pictures'     => 'Default.jpg'
    ];
    Buku::create($dataBuku);
    echo "data berhasil disimpan";
}

public function edit(Request $request, $id){
    $data = [
        'datadetailbuku' => Buku::where('id', $id)->first()
    ];
    return view('editbuku', $data);
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
Buku::where('id', $id)->update($dataSimpan);
    return redirect('/lihatbuku');
}

public function hapus(Request $request, $id){
Buku::where('id', $id)->delete();
return redirect('/lihatbuku');
}
}
