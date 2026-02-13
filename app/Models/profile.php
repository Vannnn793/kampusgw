<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'campus_name',
        'nama_rektor',
        'foto_rektor',
        'sambutan_rektor',
        'sejarah_kampus',
        'visi',
        'misi',
        'link_video_profil',
        'logo_path',
        'address',
        'phone',
        'email',
        'gmaps_iframe',
        'tahun_beroperasi',
        'total_prodi',
        'total_alumni',
        'total_dosen',
        'gambar_kampus',
        'created_at',
        'updated_at',
        'mahasiswa_aktif',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'twitter_url',
        'tiktok_url',
    ];
}
