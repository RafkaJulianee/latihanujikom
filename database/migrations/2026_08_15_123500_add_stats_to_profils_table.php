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
        Schema::table('profils', function (Blueprint $table) {
            $table->string('stat1_angka', 50)->nullable()->default('150+')->after('email');
            $table->string('stat1_label', 100)->nullable()->default('Proyek Selesai')->after('stat1_angka');
            $table->string('stat2_angka', 50)->nullable()->default('99%')->after('stat1_label');
            $table->string('stat2_label', 100)->nullable()->default('Kepuasan Klien')->after('stat2_angka');
            $table->string('stat3_angka', 50)->nullable()->default('24/7')->after('stat2_label');
            $table->string('stat3_label', 100)->nullable()->default('Dukungan Teknis')->after('stat3_angka');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profils', function (Blueprint $table) {
            $table->dropColumn([
                'stat1_angka',
                'stat1_label',
                'stat2_angka',
                'stat2_label',
                'stat3_angka',
                'stat3_label',
            ]);
        });
    }
};
