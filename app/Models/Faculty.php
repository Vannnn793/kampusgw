<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['name','description'];
    public function prodis()
    {
        return $this->hasMany(Prodi::class);
    }

    public function admissions()
{
    return $this->hasMany(Admissions::class);
}



}
