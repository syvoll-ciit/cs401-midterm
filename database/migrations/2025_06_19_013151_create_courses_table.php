<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->comment(`Course subject name.`)->max(50);
            $table->string('course_code')->comment('Corse code')->max(10)->unique();
            $table->integer('credits')->comment('Number of credits for the course');
            $table->string('description')->comment('Course description')->nullable();
            $table->unsignedBigInteger('teacher_id')->comment('ID of the teacher assigned to the course');
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};