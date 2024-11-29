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
            $table->string('name');
            $table->string('email')->unique();
            // Student
            $table->string('admission_number')->nullable();
            $table->string('roll_number')->unique()->nullable();
            $table->foreignId('school_class_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('religion')->nullable();
            $table->string('mobile_number')->nullable();
            $table->date('admission_date')->nullable();
            // $table->string('profile_pic')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->boolean('status')->nullable();
            // End student
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
