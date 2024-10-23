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
        Schema::create('historico_tecnico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tecnico');
            $table->foreign('id_tecnico')->references('id')->on('tecnico')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_tecnico');
    }
};
