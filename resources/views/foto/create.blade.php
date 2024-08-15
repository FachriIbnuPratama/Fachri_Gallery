@extends('layout')

@section('content')
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
  