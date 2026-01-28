<?php

// app/Models/Accreditation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_name',      // Nama Program Studi
        'level',             // Peringkat (A, B, Unggul, dll)
        'issued_by',         // Lembaga Penerbit (BAN-PT, LAM-PTKes, dll)
        'certificate_number',// Nomor SK
        'valid_until',       // Masa Berlaku
    ];

    // Opsional: Agar kolom valid_until otomatis dianggap sebagai objek Date (Carbon)
    protected $casts = [
        'valid_until' => 'date',
    ];
}