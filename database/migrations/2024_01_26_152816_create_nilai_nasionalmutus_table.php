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
        Schema::create('nilai_nasionalmutus', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_users");
            $table->foreignId("id_nasionalmutu");
            $table->integer("penyebut");
            $table->integer("pembilang");
            $table->integer("kali");
            $table->integer("hasil");
            $table->integer("nilai_skala");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_nasionalmutus');
    }
};
