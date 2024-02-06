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
        Schema::create('subprograms', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_ukm");
            $table->string("nama");
            $table->string("str_pembilang");
            $table->string("str_penyebut")->nullable();
            $table->integer("kali")->nullable();
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
        Schema::dropIfExists('subprograms');
    }
};
