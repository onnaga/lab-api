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
        Schema::create('orders_amount', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders','id')->cascadeOnDelete();
            $table->integer('amount_1')->unsigned()->nullable();
            $table->integer('amount_2')->unsigned()->nullable();
            $table->integer('amount_3')->unsigned()->nullable();
            $table->integer('amount_4')->unsigned()->nullable();
            $table->integer('amount_5')->unsigned()->nullable();
            $table->integer('amount_6')->unsigned()->nullable();
            $table->integer('amount_7')->unsigned()->nullable();
            $table->integer('amount_8')->unsigned()->nullable();
            $table->integer('amount_9')->unsigned()->nullable();
            $table->integer('amount_10')->unsigned()->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_amount');
    }
};
