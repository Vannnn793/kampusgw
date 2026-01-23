<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::table('admissions', function (Blueprint $table) {
        // hapus kolom salah konsep
        $table->dropColumn(['fakultas', 'program_studi']);

        // relasi ke prodi
        $table->foreignId('faculty_id')->constrained()->cascadeOnDelete();
        $table->foreignId('prodi_id')
              ->after('no_hp')
              ->constrained('prodis')
              ->cascadeOnDelete();
    });
}

public function down(): void
{
    Schema::table('admissions', function (Blueprint $table) {
        $table->dropForeign(['prodi_id']);
        $table->dropColumn('prodi_id');

        $table->string('fakultas');
        $table->string('program_studi');
    });
}

};
