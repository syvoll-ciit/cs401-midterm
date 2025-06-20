<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->comment('student first name.');
            $table->string('last_name')->comment('student last name.');
            $table->string('program')->comment('student program.');
            $table->string('enrollment_year')->comment('student year of enrollment.')->max(4);
            $table->dateTime('birthday')->comment('student date of birth.');
            $table->unsignedBigInteger('user_id')->comment('student id.');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};