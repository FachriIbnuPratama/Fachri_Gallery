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
    <h1>Tambah Foto</h1>
        <a href="{{ route('foto.index') }}" >Kembali ke Tampilan utama</a>
            <form action="{{ route('foto.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="album">Album</label>
                <select name="album" id="album" required="required">
                    <option value="">Pilih Album</option>
                    @foreach($album as $a)
                        <option value="{{ $a->id }}">{{ $a->nama_album}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" placeholder="Judul Foto" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Foto" required></textarea>
            </div>
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" accept="image/*" required>
            </div>
            <div>
                <button type="submit">Simpan</button>
            </div>
    </form>
</center>
@endsection


                                                        <!-- W=Fonzz -->
  