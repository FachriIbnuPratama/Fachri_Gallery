<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{

    public function index()
    {
        $foto = Foto::all();
        $data = [
            "foto" => $foto
        ];
        
        return view("foto.index", $data);
    }

    
    public function create()
    {
        $album = Album::all();

        return view("foto.create")->with("album", $album);
    }

    public function store(Request $request)
    {
        $album = $request->album;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        $insertFoto = new Foto();
        $insertFoto->album_id = $album;
        $insertFoto->judul = $judul;
        $insertFoto->tanggal_unggah = date("d-m-Y");

         if(!empty($deskripsi)) {
            $insertFoto->deskripsi = $deskripsi;
         }
         
         if($request->hasFile("foto")) {
            $foto = $request->file("foto");
            $namaFotoBaru = date("Y_m_d_H_i_s") . "." . $foto->getClientOriginalExtension();
            
            $foto->storeAs("/foto", $namaFotoBaru, "public");
            $insertFoto->lokasi_file = "foto/{$namaFotoBaru}";
         }
         $insertFoto->save();

         return redirect()->route("foto.index");
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
        $album = Album::all();

        $foto = Foto::where("id", "=", $id)->first();

        $data = [
            "album" => $album,
            "foto" => $foto
        ];

        return view("foto.edit", $data);
    }

    public function update(Request $request, string $id)
    {
        $album = $request->album;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        $updateFoto = [
            "album_id" => $album,
            "judul" => $judul,
        ];
        /**
         * deskripsi opsional bisa diisi bisa tidak diisi
         * isi deskripsi apabila user input deskripsi
         */
        if(!empty($deskripsi)) {
            $updateFoto["deskripsi"] = $deskripsi;
        }

        // check apakah terdapat file yang diupload oleh user ?
        // pemanfaatan pencabangan daapat kita lihat dari level kode brkut
        if($request->hasFile("foto")) {
            // ambil input file yang bernama foto
            $foto = $request->file("foto");
            //chech apakah benar foto tersebut diisi dan bukan file corup
            if($foto->isValid()) {
                // dapat dilihat pemanfaatan method deleteFileFoto 
                // salah satu manfaat anda menggunakan konsep OOP :
                //kita hanya membuat 1 method tetapi dapat dimanfaatkan berulang kali
                $this->deleteFileFoto($id); //delete file yang lama apabila terdapat fiel yang baru
                // membuat nama file yang benar benar unik perdetik nya
                // ambil extens nama file yang diupload
                $namaFotoBaru = date("Y_m_d_H_i_s") . "." . $foto->getClientOriginalExtension();
                //upload file kedalam folder foto & rename file yang sudah diupload
                $foto->storeAs("foto/", $namaFotoBaru, "public");
                //masukan nama file kedalam field lokasi_file pada table foto
                $updateFoto["lokasi_file"]="foto/{$namaFotoBaru}";
            }
        }

        Foto::where("id", "=", $id)->update($updateFoto);

        return redirect()->route("foto.index");
    }


    /**
     * Remove the specified resource from foto.
     */
    private function deleteFileFoto(string $id){
        $foto = Foto::where("id", $id)->first();

        if (storage::disk("public")->exists($foto->lokasi_file))
        {
            storage::disk("public")->delete($foto->lokasi_file);
        }
    }

    public function destroy(string $id)
    {
        $foto = Foto::where("id", $id)->first();

        $this->deleteFileFoto($id);

        $foto->delete();

        return redirect()->route("foto.index");
    }
}
