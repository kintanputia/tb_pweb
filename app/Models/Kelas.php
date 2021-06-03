<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $table='kelas';
    protected $fillable = ['kode_kelas', 'kode_matkul', 'nama_matkul', 'tahun', 'semester', 'sks'];
    public $timestamps = false;

}
