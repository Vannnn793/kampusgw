<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curricula'; // OPTIONAL tapi bikin tenang

    protected $fillable = ['prodi_id','semester','title'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
