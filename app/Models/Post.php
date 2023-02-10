<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'pasiens';
    protected $primaryKey = 'id_pasien';
    protected $fillable = [
        'tanggal', 'no_antrian', 'nama_pasien', 'poli_id', 'alamat_pasien', 'no_telp_pasien'
    ];
}
