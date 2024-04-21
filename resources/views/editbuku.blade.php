<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/ubahbuku/{{ $datadetailbuku->id }}" method="POST">
        @csrf
        <small>Nama Buku</small> <br>
        <input type="text" name="nama_buku" id="" value="{{ $datadetailbuku->nama_buku}}" }}"> <br>
        @error('nama_buku')
        <small>{{ $message }}</small> <br>
        @enderror
        <small>Keterangan</small> <br>
        <input type="text" name="keterangan" id="" value="{{ $datadetailbuku->keterangan }}"> <br>
        @error('keterangan')
        <small>{{ $message }}</small> <br>
        @enderror
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
