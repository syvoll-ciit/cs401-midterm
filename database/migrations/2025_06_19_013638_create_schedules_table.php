<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('day_of_week')->comment('Day of the week for the schedule')->max(10);
            $table->dateTime('time_slot')->comment('Time slot for the schedule');
            $table->string('room')->comment('Room where the class is held')->max(20);
            $table->integer('term')->comment('Term during which the class is scheduled');
            $table->unsignedBigInteger('course_id')->comment('ID of the course associated with the schedule');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};