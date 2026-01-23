<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = [
        'faculty_id',
        'name',
        'slug',
        'description',
        'image',
        'goal',
        'curriculum',
    ];
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admissions::class);
    }
}
