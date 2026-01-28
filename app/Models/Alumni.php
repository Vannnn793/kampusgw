<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
     protected $table = 'alumni'; 
    protected $fillable = [
        'nama',
        'faculty_id',
        'prodi_id',
        'tahun_lulus',
        'perusahaan',
        'jabatan',
        'pesan_kesan',
        'foto'
    ];

     public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
      public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
