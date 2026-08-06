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
       Schema::create('profils', function (Blueprint $table) {
    $table->id('id_profil');
    $table->string('nama_perusahaan', 150);
    $table->text('tentang');
    $table->text('visi');
    $table->text('misi');
    $table->text('alamat');
    $table->string('telepon', 20);
    $table->string('email', 100);
    $table->string('logo', 255);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
