@extends('layout.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Pinjam Buku</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Pinjam Buku
            </h6>
            <br>
            <a href="/pinjambuku" class="btn btn-warning pull-right">Kembali</span></a>
        </div>
        <div class="card-body">
            <div>
                <form action="" id="form-buatpinjam">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Tanggal Pinjam</label>
                            <input type="date" name="tanggalpinjam" id="" class="form form-control">
                        </div>
                    </div>
                </form>
                <div class="row mt-2">
                        <div class="col-md-6">
                            <button class="btn btn-primary" onclick="buatPinjaman()">Buat Peminjaman</button>
                        </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <input type="text" name="idbuku" id="idbuku" class="form form-control">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success" onclick="cariBuku()">Cari Buku</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nama Buku</label>
                        <input type="text" name="namabuku" id="namabuku" class="form form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Kategori</label>
                        <input type="text" name="kategoribuku" id="kategoribuku" class="form form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Jumlah Buku</label>
                        <input type="text" name="" id="" class="form form-control">
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button class="btn btn-primary" onclick="">Pilih</button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Judul Buku</td>
                                    <td>Jumlah Pinjam</td>
                                    <td>Option</td>
                                </tr>
                            </thead>
                            <tbody id="databuku">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('jsfooter')
//untuk menyisipkan file JS
<script>
    var idTransaksi;
    function buatPinjaman() {
        $.ajax({
            url: window.location.origin+'/simpantransaksi' ,
            type: "POST",
            dataType: "JSON",
            data: $('#form-buatpinjam').serialize(),

            success: function(res){
                //fungsi ketika berhasil
                console.log(res.idtransaksi)
                idTransaksi=res.idtransaksi
            },
            error: function(res){
                //fungsi ketika gagal
            }
        })
    }

    //cari buku
    function cariBuku(){
        $.ajax({
            url: window.location.origin+'/caribuku/'+$('#idbuku').val(),
            type: "GET",
            dataType: "JSON",
            success: function(res){
                console.log(res)
                $('#namabuku').val(res.data.judul_buku)
                $('#kategoribuku').val(res.data.kategori.nama_kategori)
            },
            error: function(res){
                alert("Data buku tidak ditemukan!")
            }
        })
    }
</script>
@endpush
