<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id(); // Primary auto-incrementing integer key
            $table->string('name');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->foreignId('state_id')
                  ->constrained() // References the `id` column on the `states` table
                  ->onDelete('cascade'); // If a state is deleted, its cities are deleted too
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
