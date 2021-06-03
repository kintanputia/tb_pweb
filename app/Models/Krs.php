<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;
    protected $table='krs';
    protected $fillable = ['kelas_id', 'mahasiswa_id'];
    protected $primaryKey = 'krs_id';
    public $timestamps = false;

}
