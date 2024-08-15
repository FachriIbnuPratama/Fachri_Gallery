@extends('layout')

@section('content')
<center>
    <h1>Tambah Album</h1>
        <a href="{{ route('album.index') }}" >Kembali ke Tampilan utama</a>
            <form action="{{ route('album.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nama_album">Nama Album</label>
                <input type="text" name="nama_album" id="nama_album" placeholder="Nama Album" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Album" required></textarea>
            </div>
            <div>
                <label for="tanggal_dibuat">Tanggal Dibuat</label>
                <input type="date" name="tanggal_dibuat" id="tanggal_dibuat" placeholder="Tanggal Dibuat" required>
            </div>
        <button type="submit">Simpan</button>
    </form>
</center>
@endsection


                                                        <!-- W=Fonzz -->
  