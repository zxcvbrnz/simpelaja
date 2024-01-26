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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_users");
            $table->string("Kepala_puskesmas");
            $table->string("alamat_puskesmas");
            $table->integer("jumlah_pustu");
            $table->integer("jumlah_poskesdes");
            $table->integer("jumlah_ukbm");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
