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
    <h1>Edit Album</h1>
        <a href="{{ route('album.index') }}" >Kembali ke Tampilan utama</a>
            <form action="{{ route('album.update', $album->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <label for="nama_album">Nama Album</label>
                <input type="hidden" value="{{ $album->id }}" name="id" id="id">
                <input type="text" id="nama_album" name="nama_album" value="{{ $album->nama_album }}" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Album" value="{{ $album->deskripsi }}" required></textarea>
            </div>
                <label for="tanggal_dibuat">Tanggal Dibuat</label>
                <input type="date" name="tanggal_dibuat" id="tanggal_dibuat" placeholder="Tanggal Dibuat" value="{{ $album->tanggal_dibuat }}" required>
            </div>
        <button type="submit">Simpan</button>
    </form>
</center>
@endsection


                                                        <!-- W=Fonzz -->
  