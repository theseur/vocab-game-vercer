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
        Schema::create('ropdolgozat', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users');
            $table->integer('szoszedetid');
            $table->foreign('szoszedetid')->references('id')->on('szoszedet');
            $table->unsignedBigInteger('ropbeallitasid');
            $table->foreign('ropbeallitasid')->references('id')->on('ropbeallitas');
            $table->dateTime('kezdesido');
            $table->dateTime('befejezesido');
            $table->integer('talalat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ropdolgozat');
    }
};
