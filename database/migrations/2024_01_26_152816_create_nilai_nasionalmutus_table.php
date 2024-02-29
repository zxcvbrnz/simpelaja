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
            $table->integer("pembilang");
            $table->integer("penyebut")->nullable();
            $table->integer("kali")->nullable();
            $table->float("target");
            $table->float("hasil");
            $table->integer("nilai");
            $table->timestamp("data_untuk")->nullable();
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
