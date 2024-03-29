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
        Schema::create('nilai_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->foreignid("id_subpelayanan_ukpp");
            $table->foreignid("id_users");
            $table->integer("pembilang");
            $table->integer("penyebut")->nullable();
            $table->integer("kali")->nullable();
            $table->integer("hasil");
            $table->integer("target");
            $table->timestamp("data_untuk")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_pelayanans');
    }
};
