<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    // Menampilkan daftar matkul dengan statistik
    public function listMatkul()
    {
        $matakuliahs = Matakuliah::all();
        
        return view('dashboard', [
            'matakuliahs' => $matakuliahs,
            'totalMatkul' => $matakuliahs->count(),
            'totalSKS' => $matakuliahs->sum('sks'),
            'totalDosen' => $matakuliahs->unique('dosen')->count(),
            'totalRuang' => $matakuliahs->unique('ruang_kelas')->count()
        ]);
    }

    // Tambah matkul
    public function addMatkul(Request $request)
    {
        $dataNew = $request->validate([
            'kode_matkul'  => 'required|string|max:10|unique:matakuliahs,kode_matkul',
            'nama_matkul'  => 'required|string|max:100',
            'ruang_kelas'  => 'required|string|max:50',
            'dosen'        => 'required|string|max:100',
            'sks'          => 'required|integer|min:1|max:6',
            'jadwal'       => 'required|string|max:100', 
        ]);

        Matakuliah::create($dataNew);
        
        return redirect('/dashboard')->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    // Tampilan 1 data untuk di update
    public function showUpdate($id)
    {
        $data = Matakuliah::findOrFail($id);
        return view('DataMatkul', [
            'matkul' => $data
        ]);
    }

    // Proses update
    public function updateProses(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_matkul' => 'required|string|max:10|unique:matakuliahs,kode_matkul,'.$id,
            'nama_matkul' => 'required|string|max:100',
            'ruang_kelas' => 'required|string|max:50',
            'dosen'       => 'required|string|max:100',
            'sks'         => 'required|integer|min:1|max:6',
            'jadwal'      => 'required|string|max:100'
        ]);

        $data = Matakuliah::findOrFail($id);
        $data->update($validated);

        return redirect('/dashboard')->with('success', 'Mata kuliah berhasil diperbarui!');
    }

    // Hapus matkul
    public function deleteMatkul($id)
    {
        $data = Matakuliah::findOrFail($id);
        $data->delete();
        
        return redirect('/dashboard')->with('success', 'Mata kuliah berhasil dihapus!');
    }
}