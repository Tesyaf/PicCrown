<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('photo_id');
            $table->uuid('user_id');
            $table->uuid('parent_id')->nullable(); // untuk balasan komentar
            $table->unsignedTinyInteger('score')->nullable(); // 1–5 (boleh null kalau hanya komentar)
            $table->text('encrypted_comment')->nullable(); // komentar terenkripsi
            $table->timestamps();

            // relasi
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
