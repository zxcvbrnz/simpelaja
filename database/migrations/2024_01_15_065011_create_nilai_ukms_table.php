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
        Schema::create('nilai_ukms', function (Blueprint $table) {
            $table->id();
            $table->foreignid("id_subprogram_ukm");
            $table->foreignid("id_users");
            $table->integer("pembilang");
            $table->integer("penyebut")->nullable();
            $table->integer("kali")->nullable();
            $table->integer("hasil");
            $table->integer("target");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_ukms');
    }
};
