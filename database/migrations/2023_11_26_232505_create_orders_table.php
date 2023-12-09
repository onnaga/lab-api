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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pharm_order')->constrained("pharmases",'id')->cascadeOnDelete();
            $table->string('med1')->nullable();
            $table->string('med2')->nullable();
            $table->string('med3')->nullable();
            $table->string('med4')->nullable();
            $table->string('med5')->nullable();
            $table->string('med6')->nullable();
            $table->string('med7')->nullable();
            $table->string('med8')->nullable();
            $table->string('med9')->nullable();
            $table->string('med10')->nullable();
            $table->string('status')->nullable();
            $table->boolean("payeded");
            $table->string('order_number');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
