<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('organization'); 
            $table->string('logo')->nullable(); 
            $table->date('open_registration'); 
            $table->date('deadline'); 
            $table->text('description'); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};