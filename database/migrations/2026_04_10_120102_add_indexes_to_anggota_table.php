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
        if (Schema::hasTable('anggota')) {

            Schema::table('anggota', function (Blueprint $table) {

                if (Schema::hasColumn('anggota', 'nrm')) {
                    $table->index('nrm');
                }

                if (Schema::hasColumn('anggota', 'angkatan')) {
                    $table->index('angkatan');
                }

                if (Schema::hasColumn('anggota', 'nama')) {
                    $table->index('nama');
                }

                if (Schema::hasColumn('anggota', 'asal_sekolah')) {
                    $table->index('asal_sekolah');
                }

                if (Schema::hasColumn('anggota', 'pendidikan')) {
                    $table->index('pendidikan');
                }

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {

            $table->dropIndex(['nrm']);
            $table->dropIndex(['angkatan']);
            $table->dropIndex(['nama']);
            $table->dropIndex(['asal_sekolah']);
            $table->dropIndex(['pendidikan']);

        });
    }
};