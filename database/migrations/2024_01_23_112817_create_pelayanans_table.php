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
        Schema::create('pelayanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_ukpp");
            $table->string("subpelayanan");
            $table->string("str_penyebut");
            $table->string("str_pembilang");
            $table->integer("kali");
            $table->integer("target");
            $table->string("str_target");
            $table->string("satuan");
            $table->string("type");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayanans');
    }
};
