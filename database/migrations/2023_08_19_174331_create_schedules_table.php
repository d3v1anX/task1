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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            
            $table->time('start_schedule');
            $table->time('end_schedule');
            $table->unsignedBigInteger('date_id')->nullable();
            $table->unique(['start_schedule', 'end_schedule', 'date_id']);
            
            $table->foreign('date_id')->references('id')->on('dates')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
