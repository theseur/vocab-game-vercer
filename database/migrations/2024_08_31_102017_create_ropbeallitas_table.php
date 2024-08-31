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
        Schema::create('ropbeallitas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('datum');
            $table->string('osztaly');
            $table->integer('temakorid');
            $table->foreign('temakorid')->references('id')->on('targytemakor');
            $table->unsignedBigInteger('tanarid');
            $table->foreign('tanarid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ropbeallitas');
    }
};
