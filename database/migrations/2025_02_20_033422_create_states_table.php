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
        Schema::create('states', function (Blueprint $table) {
            $table->id(); // Primary auto-incrementing integer key
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('country_id')
                  ->constrained() // Assumes a `countries` table exists with an `id` primary key
                  ->onDelete('cascade'); // Deletes state if associated country is deleted
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('states');
    }
};
