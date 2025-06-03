<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    /** @use HasFactory<\Database\Factories\MatakuliahFactory> */
    use HasFactory;
    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'ruang_kelas',
        'dosen',
        'sks',
        'jadwal',
    ];
}
