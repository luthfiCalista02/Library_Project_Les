<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/lihatbuku">
        @csrf
        <h3>Data Buku</h3>
        <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($databuku as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->judul_buku }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    @if (auth()->user()->role == "pengelola")
                    <a href="/buku/edit/{{ $item->id }}">Edit</a>
                    <a href="/hapusbuku/{{ $item->id }}">Hapus</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </form>
</body>
</html>
