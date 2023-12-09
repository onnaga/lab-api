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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('the_store')->constrained('storages')->cascadeOnDelete();
            $table->string('scientific_name')->nullable();
            $table->string('commercial_name')->nullable();
            $table->string('type')->nullable();
            $table->string('company')->nullable();
            $table->integer('available_amount')->nullable();
            $table->date('ex_date')->nullable();
            $table->integer('price')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
