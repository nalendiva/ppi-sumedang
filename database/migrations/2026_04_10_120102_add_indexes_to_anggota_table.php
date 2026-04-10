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
        Schema::table('anggota', function (Blueprint $table) {
            //
            $table->index('nrm');
            $table->index('angkatan');
            $table->index('nama');
            $table->index('asal_sekolah');
            $table->index('pendidikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            //
            $table->dropIndex(['nrm']);
            $table->dropIndex(['angkatan']);
            $table->dropIndex(['nama']);
            $table->dropIndex(['asal_sekolah']);
            $table->dropIndex(['pendidikan']);
        });
    }
};
