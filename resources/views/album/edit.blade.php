@extends('layout')

@section('content')
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
  