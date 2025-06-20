<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->comment('teacher first name.');
            $table->string('last_name')->comment('teacher lest name.');
            $table->string('email')->comment('teacher email.')->max(50)->unique();
            $table->string('department')->comment('teacher department')->max(10);
            $table->dateTime('birthday')->comment('teacher date of birth.');
            $table->unsignedBigInteger('user_id')->comment('teacher user id.');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};