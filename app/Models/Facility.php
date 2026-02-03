<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',   // 🔥 WAJIB
        'name',
        'slug',
        'image',
        'description',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
