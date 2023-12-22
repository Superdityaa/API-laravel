<?php

namespace App\Http\Controllers;

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
            'seri' => 'required|integer',
            'genre' => 'required',
            'penerbit' => 'required',
        ]);

        $majalah = new majalah();
        
        $majalah->cover = $request->cover;
        $majalah->judul = $request->judul;
        $majalah->seri = $request->seri;
        $majalah->genre = $request->genre;
        $majalah->penerbit = $request->penerbit;

        $majalah->save();

        return response()->json([
            'message' => 'Data majalah berhasil ditambahkan',
            'data' => $majalah,
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
            'message' => 'Majalah Terhapus'
        ], 204);
    }
}
