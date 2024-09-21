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
        Schema::table('targytemakor', function (Blueprint $table) {
            $table->unique(['nev', 'szulo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('targytemakor', function (Blueprint $table) {
            $table->dropUnique(['nev', 'szulo'] );
        });
    }
};