@extends('layout')

@section('content')
<center>
<h1>Foto</h1>
    <a href="{{ route('foto.create') }}" class="tambah-button">+ Tambah</a>
    <br>
    <br>
    <table border="4">
        <thead>
            <tr>
                <th>No</th>
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
                    <td><img src="{{ asset("storage/{$f->lokasi_file}") }}" alt="{{ $f->judul }}" width="60%"></td>
                    <td>
                        <a href="{{ route('foto.edit', $f->id) }}">Edit</a>
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
    