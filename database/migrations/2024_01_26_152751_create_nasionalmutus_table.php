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
            $table->string("str_penyebut");
            $table->string("str_pembilang");
            $table->integer("target");
            $table->integer("nilai_4");
            $table->integer("nilai_7");
            $table->integer("nilai_10");
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
