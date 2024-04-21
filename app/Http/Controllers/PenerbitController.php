<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index(Request $request){
        return view('penerbit');
    }

    public function indexx(Request $request){
        $data = [
            'datapenerbit' => Penerbit::all()
        ];
        return view('datapenerbit',$data );
    }

    public function Penerbit(Request $request){
        //dd($request->all());
        $request->validate([
            'nama_penerbit' => 'required',
            'keterangan'    => 'required'
        ]);
        $dataPenerbit = [
            'nama_penerbit'   => $request->nama_penerbit,
            'keterangan'      => $request->keterangan,
            'status'       => 'Aktif',
        ];
        Penerbit::create($dataPenerbit);
        echo "data berhasil disimpan";
    }

    public function edit(Request $request, $id){
        $data = [
            'datadetailpenerbit' => Penerbit::where('id', $id)->first()
        ];
        return view('editpenerbit', $data);
    }
public function ubah(Request $request, $id){
    //dd($request->all());
    $request->validate([
        'nama_penerbit'  => 'required',
        'keterangan'     => 'required'
    ]);
    $dataSimpan = [
        'nama_penerbit'  => $request->nama_penerbit,
        'keterangan'     => $request->keterangan,
        'status'         => 'Aktif'
    ];
    Penerbit::where('id', $id)->update($dataSimpan);
        return redirect('/lihatpenerbit');
}

public function hapus(Request $request, $id){
    Penerbit::where('id', $id)->delete();
    return redirect('/lihatpenerbit');
}
}
