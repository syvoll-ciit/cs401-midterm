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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->comment('user first name.');
            $table->string('last_name')->comment('user last name.');
            $table->string('user_name')->comment('user user name.')->max(30);
            $table->string('password')->comment('user password.');
            $table->timestamp('registration_date')->comment('user date of registration.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
