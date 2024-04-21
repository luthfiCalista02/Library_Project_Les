<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <small>Nama Lengkap</small> <br>
        <input type="text" name="name_lengkap" id="" value="{{ old('name_lengkap') }}"> <br>
        @error('name_lengkap')
            <small>{{ $message }}</small> <br>
        @enderror
        <small>Email</small> <br>
        <input type="text" name="email" id="" value="{{ old('email') }}"> <br>
        @error('email')
            <small>{{ $message }}</small> <br>
        @enderror
        <small>Password</small> <br>
        <input type="password" name="password" id=""> <br>
        @error('password')
            <small>{{ $message }}</small> <br>
        @enderror
        <small>Jenis Kelamin</small> <br>
        <input type="radio" name="jenis_kelamin" id="" value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'checked' : '' }}> laki-laki
        <input type="radio" name="jenis_kelamin" id="" value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }}> Perempuan <br>
        @error('jenis_kelamin')
            <small>{{ $message }}</small> <br>
        @enderror
        <button type="submit">Register</button>
    </form>
</body>
</html>
