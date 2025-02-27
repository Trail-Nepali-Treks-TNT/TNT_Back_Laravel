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
        Schema::create('package_details', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('service_region_id');
            $table->unsignedBigInteger('difficulty_level_id');
            $table->string('name');
            $table->text('description');
            $table->text('short_description');
            $table->double('price');
            $table->double('old_price');
            $table->integer('duration');
            $table->text('walking_per_day');
            $table->text('starting_point');
            $table->text('availability');
            $table->text('total_distance');
            $table->text('max_elevation');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();   

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('service_region_id')->references('id')->on('service_regions');
            $table->foreign('difficulty_level_id')->references('id')->on('difficulty_levels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_details');
    }
};
