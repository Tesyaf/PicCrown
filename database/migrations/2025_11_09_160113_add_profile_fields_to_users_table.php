<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahan field profil
            $table->string('avatar_url')->nullable()->after('password'); // URL gambar profil
            $table->string('bio', 500)->nullable()->after('avatar_url'); // Deskripsi singkat pengguna
            $table->string('location', 150)->nullable()->after('bio'); // Lokasi pengguna
            $table->string('rank')->nullable()->after('location'); // Peringkat komunitas opsional
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar_url', 'bio', 'location', 'rank']);
        });
    }
};
