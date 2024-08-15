@extends('layout')

@section('content')
<center>
    <h1>Edit Foto</h1>
        <a href="{{ route('foto.index') }}" >Kembali ke Tampilan utama</a>
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
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Foto" value="{{ $foto->deskripsi }}" required></textarea>
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
  