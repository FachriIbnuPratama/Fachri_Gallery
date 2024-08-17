@extends('layout')

@section('content')
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #87CEFA;
    margin: 0;
    padding: 20px;
}

h1 {
    color: #333;
    text-align: center;
}

form {
    background-color: #fff;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

form div {
    margin-bottom: 15px;
}

form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

form input[type="text"],form select,form input[type="file"] {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

form input[type="text"]:focus,form select:focus,form input[type="file"]:focus {
    border-color: #4CAF50;
    outline: none;
}

form img {
    display: block;
    margin: 0 auto 20px;
    border-radius: 4px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

form button {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

form button:hover {
    background-color: #45a049;
}

a {
    display: block;
    margin-bottom: 20px;
    color: #0a0678;
    text-decoration: none;
    text-align: center;
    font-size: 16px;
}   

a:hover {
    text-decoration: underline;
}

</style>
<center>
    <h1>Edit Foto</h1>
        <a href="{{ route('foto.index') }}" class="back-button">Kembali ke Tampilan utama</a>
            <form action="{{ route('foto.update', $foto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <label for="album">Album</label>
                <select name="album" id="album" required="required">
                    <option value="">Pilih Album</option>
                    @foreach($album as $a)
                        @php
                            $selected = $a->id == $foto->album_id ? "selected" : "";
                        @endphp
                        <option value="{{ $a->id }}" {{ $selected }}>{{ $a->nama_album}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" placeholder="Judul Foto" value="{{ $foto->judul }}" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" placeholder="Deskripsi Foto" value="{{ $foto->deskripsi }}" required>
            </div>
            <img src="{{ asset("storage/{$foto->lokasi_file}") }}" alt="{{ $foto->judul}}" width="30%" />
            <div>
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" accept="image/*" required>
            </div>
        <button type="submit">Simpan</button>
    </form>
</center>
@endsection


                                                        <!-- W=Fonzz -->
  