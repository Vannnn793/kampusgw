<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['curriculum_id','name','sks'];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
