<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PmbInfo extends Model
{
    protected $table = 'pmb_infos';

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'registration_link',
        'image',
        'slug',
        'id',
        'content',
        'is_active',
        'created_at',
        'updated_at',

    ];
}
