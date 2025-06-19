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
            $table->string('day_of_week')->comment('day of schedulek')->max(10);
            $table->dateTime('time_slot')->comment('timeslot of schedule');
            $table->string('room')->comment('room of schedule')->max(20);
            $table->integer('term')->comment('term of schedule');
            //$table->foreignId('course_id')->comment('schedule id')->constrained();
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
