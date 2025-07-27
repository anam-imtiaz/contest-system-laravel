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
        Schema::create('contest', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('score')->nullable();
            $table->string('prize')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest');
    }
};
