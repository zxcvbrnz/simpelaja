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
        Schema::create('nasionalmutus', function (Blueprint $table) {
            $table->id();
            $table->string("mutu");
            $table->string("str_pembilang");
            $table->string("str_penyebut")->nullable();
            $table->integer("kali")->nullable();
            $table->integer("type");
            $table->integer("target");
            $table->integer("type_target");
            $table->integer("nilai_4");
            $table->integer("type_nilai_4");
            $table->integer("nilai_7_start");
            $table->integer("nilai_7_end");
            $table->integer("nilai_10");
            $table->integer("type_nilai_10");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasionalmutus');
    }
};
