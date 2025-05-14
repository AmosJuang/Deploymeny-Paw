<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('scholarship_user', function (Blueprint $table) {
    $table->uuid('user_id');
    $table->unsignedBigInteger('scholarship_id');
    $table->timestamps();

    // Relasi foreign key
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('scholarship_id')->references('id')->on('scholarships')->onDelete('cascade');

    // Primary key gabungan (composite key)
    $table->primary(['user_id', 'scholarship_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarship_user');
    }
};