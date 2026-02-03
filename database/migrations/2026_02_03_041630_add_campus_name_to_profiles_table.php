<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('profiles', function (Blueprint $table) {
        // Nambah kolom 'campus_name' setelah kolom id
        // Dikasih nullable() biar data lama ga error kalau kosong
        $table->string('campus_name')->nullable()->after('id');
    });
}

public function down()
{
    Schema::table('profiles', function (Blueprint $table) {
        $table->dropColumn('campus_name');
    });
}
};
