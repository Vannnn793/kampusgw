<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/PageSeeder.php
public function run()
{
    $pages = [
        ['title' => 'Privacy Policy', 'slug' => 'privacy-policy', 'content' => 'Isi kebijakan privasi kampus...'],
        ['title' => 'Terms of Service', 'slug' => 'terms-of-service', 'content' => 'Isi aturan penggunaan layanan...'],
        ['title' => 'Site Map', 'slug' => 'site-map', 'content' => 'Daftar link website kampus...'],
    ];

    foreach ($pages as $page) {
        \App\Models\Page::create($page);
    }
}
}
