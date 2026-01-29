<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    Protected $fillable = ['title', 'category', 'file_path'];
}
