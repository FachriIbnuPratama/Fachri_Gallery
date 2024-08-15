<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album = Album::all();
        $data = [
            "album" => $album
        ];

        return view("album.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("album.create");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $namaAlbum     = $request->nama_album;
        $deskripsi      = $request->deskripsi;
        $tanggalDibuat = $request->tanggal_dibuat;
    
        $dataAlbum = new Album();
        $dataAlbum->nama_album = $namaAlbum;
        $dataAlbum->deskripsi = $deskripsi;
        $dataAlbum->tanggal_dibuat = $tanggalDibuat;
        $dataAlbum->save();

        return redirect()->route("album.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::where("id", $id)->first();

        $data = [
            "album" => $album,
        ];

        return view("album.edit", $data);
    }

    /**
     * data the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $namaAlbum = $request->nama_album;
        $deskripsi = $request->deskripsi;
        $tanggalDibuat = $request->tanggal_dibuat;
    
        $dataAlbum = Album::where("id", $id)->first();
        $dataAlbum->nama_album = $namaAlbum;
        $dataAlbum->deskripsi = $deskripsi;
        $dataAlbum->tanggal_dibuat = $tanggalDibuat;
        $dataAlbum->save();
    
        return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    private function deleteFileFoto(string $id){
        $album = Album::where("id", $id)->first();
    }

    public function destroy(string $id)
    {
        $album = Album::where("id", $id)->first();

        $this->deleteFileFoto($id);

        $album->delete();

        return redirect()->route("album.index");
    }
}
  