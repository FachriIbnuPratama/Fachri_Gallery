@extends('layout')

@section('content')
<!-- ini untuk css jika lebih cantik
Untuk mengatur Style Pada CSS //Index.blade.php  -->
<style>
h1 {
    text-align:center;
    font-size: 50px;
    font-family: "Lucida Handwriting", cursive;
}

table {
    margin-left:auto;
    margin-right:auto;
    width:50%;
}

h1, table {
    margin-bottom:3.0%;
}

/* General link styles */
a.tambah-button {
    display: inline-block;
    padding: 10px 20px;
    margin-left:10px;
    margin-right:auto;
    align:center;
    background-color: #28a745; /* Green background */
    color: white; /* White text */
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

/* Hover effect */
a.tambah-button:hover {
    background-color: #218838; /* Darker green on hover */
}

/* Active effect */
a.tambah-button:active {
    background-color: #1e7e34; /* Even darker green on active/click */
}

a.edit-button {
    display: inline-block;
    padding: 5px 20px;
    margin:10px 0;
    background-color: #00008B; /* Blue background */
    color: white; /* White text */
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

/* Hover effect */
a.edit-button:hover {
    background-color: #00000b; /* Darker blue on hover */
}

/* Active effect */
a.edit-button:active {
    background-color: #ffffff; /* White on hover */
    color: black; /* black text */
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

table {
    width: 90%;
    border-collapse: collapse;
    margin: 20px0;
    font-size: 18px;
    text-align: left;
}

table th, table td {
    padding: 12px;
    border-bottom: 2px solid #ddd;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table img {
    max-width: 100px;
    height: auto;
    display: block;
    margin: 0 auto;
}

table td form {
    margin-top: 10px;
}

table td a {
    display: inline-block;
    margin-bottom: 5px;
    background-color: #0060fa;
    color: white;
    padding: 10px 16px;
    border: none;
    text-decoration: none;
    border-radius: 4px;
    text-align: center;
}

table td a:hover {
    background-color: #0048bd;
}

table td button {
    background-color: #f44336;
    color: white;
    padding: 10px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

table td button:hover {
    background-color: #d32f2f;
}
</style> 
<center>
<h1>Data Foto</h1>
    <a href="{{ route('foto.create') }}" class="tambah-button">+ Tambah</a>
    <br>
    <br>
    <table border="4">
        <thead>
            <tr>
                <center><th>No</th></center>
                <th>Nama Album</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Unggah</th>
                <th style="width: 300px;">Lokasi File</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @forelse($foto as $f)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $f->album->nama_album }}</td>
                    <td>{{ $f->judul }}</td>
                    <td>{{ $f->deskripsi }}</td>
                    <td>{{ date("d-m-Y"), strtotime($f->tanggal_unggah) }}</td>
                    <td><img src="{{ asset("storage/{$f->lokasi_file}") }}" alt="{{ $f->judul }}" /></td>
                    <td>
                        <a href="{{ route('foto.edit', $f->id) }}">Edit</a>
                        ||
                        <br> 
                        <form action="{{ route('foto.destroy', $f->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak terdapat data foto!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</center>
@endsection

 



                                                        <!-- W=Fonzz -->
    