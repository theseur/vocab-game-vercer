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

        $path = database_path('migrations/targytemakor.sql');
        $sql = File::get($path);
        DB::unprepared($sql);

        $path = database_path('migrations/szoszedet.sql');
        $sql = File::get($path);
        DB::unprepared($sql);


        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::dropIfExists('targytemakor');
        Schema::dropIfExists('szoszedet');
        
    }
};
