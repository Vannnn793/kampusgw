<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admissions extends Model
{
    use HasFactory;

    protected $table = 'admissions';

     protected $fillable = [
        'nama_lengkap',
        'email',
        'no_hp',
        'prodi_id',
        'tahun_akademik',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

     public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

}
