<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\majalah;
use Illuminate\Http\Request;

class MajalahController extends Controller
{
    
    public function show(majalah $majalah)
    {
        $majalah = majalah::all();
        return response()->json([
            'data' => $majalah
        ]);

    }

    public function create(Request $request, majalah $majalah)
    {
        $request->validate([
            'cover' => 'required',
            'judul' => 'required',
            'seri' => 'required',
            'genre' => 'required|integer',
            'penerbit' => 'required',
        ]);

        $newMajalah = new majalah();
        
        $newMajalah->avatar = $request->avatar;
        $newMajalah->nama = $request->nama;
        $newMajalah->nim = $request->nim;
        $newMajalah->semester = $request->semester;
        $newMajalah->jurusan = $request->jurusan;

        $newMajalah->save();

        return response()->json([
            'message' => 'Data mahasiswa berhasil ditambahkan',
            'data' => $newMajalah,
        ], 201); 
    }


    public function update(Request $request, majalah $majalah, $id)
    {
        $majalah = majalah::find($id);
        $majalah->update($request->all());

        return response()->json([
            'message' => 'Data majalah berhasil diubah',
            'data' => $majalah,
        ], 201); 
    }

    public function destroy(majalah $majalah, $id)
    {
        $majalah = majalah::find($id);
        $majalah->delete();

        return response()->json([
            'message' => 'Item Terhapus'
        ], 204);
    }
}
