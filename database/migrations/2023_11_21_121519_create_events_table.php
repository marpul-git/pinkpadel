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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('type',45);
            $table->string('state',45);
            $table->decimal('price', 8, 2);
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('court_id');
            $table->timestamps();
            $table->foreign('court_id')->references('id')->on('courts');

            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
