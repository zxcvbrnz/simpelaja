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
        Schema::create('submanajemens', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_manajemen");
            $table->string("nama_submanajemen");
            $table->string("ket_nilai_0");
            $table->string("ket_nilai_4");
            $table->string("ket_nilai_7");
            $table->string("ket_nilai_10");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submanajemens');
    }
};
