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
        Schema::table('ropdolgozat', function (Blueprint $table) {
            // change() tells the Schema builder that we are altering a table
            $table->dateTime('befejezesido')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ropdolgozat', function (Blueprint $table) {
            // change() tells the Schema builder that we are altering a table
            $table->dateTime('befejezesido')->nullable(false)->change();
        });
    }
};
