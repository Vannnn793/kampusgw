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
        $table->text('address')->nullable()->after('misi'); // Alamat fisik
        $table->string('phone')->nullable()->after('address');
        $table->string('email')->nullable()->after('phone');
        $table->text('gmaps_iframe')->nullable()->after('email'); // Untuk kode embed Google Maps
    });
}

public function down()
{
    Schema::table('profiles', function (Blueprint $table) {
        $table->dropColumn(['address', 'phone', 'email', 'gmaps_iframe']);
    });
}
};
