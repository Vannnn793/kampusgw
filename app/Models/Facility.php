<?php

// app/Models/Facility.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    // Masukkan kolom yang boleh diisi
    protected $fillable = [
        'name',
        'image',
        'description',
    ];
}