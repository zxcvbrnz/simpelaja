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
        Schema::create('nilai_manajemens', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_submanajemen");
            $table->foreignId("id_users");
            $table->string("hasil");
            $table->string("ket_skala");
            $table->timestamp("data_untuk")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_manajemens');
    }
};
