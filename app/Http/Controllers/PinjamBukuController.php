<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Buku;
use App\Models\Transaksi;
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
       try {
            $request->validate([
                'tanggalpinjam' => 'required'
            ]);

            //proses penyimpanan
            $data = [
                'users_id'   => auth()->user()->id,
                'tgl_pinjam' => $request->tanggalpinjam
            ];

            $simpan = Transaksi::create($data);
            return response()->json([
                "pesan"         => "Data berhasil disimpan",
                "idtransaksi"   => $simpan->id
            ], 200);
       } catch (Exception $error) {

       }
    }

    public function caribuku(Request $request, $id){
        $caribuku = Buku::with(['kategori'])->where('id', $id)->first();
        if ($caribuku) {
            return response()->json([
                'pesan' => "Data buku berhasil ditemukan",
                'data' => $caribuku
            ], 200);
        }
        return response()->json([
            'pesan' => "Gagal mengambil data buku",
            'data' => null
        ], 500);
    }
}
