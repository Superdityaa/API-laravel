<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function show(mahasiswa $mahasiswa)
    {
        $mahasiswa = mahasiswa::all();
        return response()->json([
            'data' => $mahasiswa
        ]);
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'avatar' => 'required',
            'nama' => 'required',
            'nim' => 'required|integer',
            'semester' => 'required|integer',
            'jurusan' => 'required',
        ]);

        $newMahasiswa = new mahasiswa();
        
        $newMahasiswa->avatar = $request->avatar;
        $newMahasiswa->nama = $request->nama;
        $newMahasiswa->nim = $request->nim;
        $newMahasiswa->semester = $request->semester;
        $newMahasiswa->jurusan = $request->jurusan;

        $newMahasiswa->save();

        return response()->json([
            'message' => 'Data mahasiswa berhasil ditambahkan',
            'data' => $newMahasiswa,
        ], 201); 
    }
    
    public function update(Request $request, mahasiswa $mahasiswa, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->update($request->all());

        return response()->json([
            'message' => 'Data mahasiswa berhasil diubah',
            'data' => $mahasiswa,
        ], 201); 
    }

    
    public function destroy(mahasiswa $mahasiswa, $id)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->delete();

        return response()->json([
            'message' => 'Item Terhapus'
        ], 204);
    }
}
