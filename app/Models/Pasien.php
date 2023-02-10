<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_pasien';
    protected $fillable = [
        'no_antrian', 'nama_pasien', 'poli', 'alamat_pasien', 'no_telp_pasien'
    ];

}