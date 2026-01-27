<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admission extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'no_hp',
        'faculty_id',
        'prodi_id',
        'tahun_akademik'
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
