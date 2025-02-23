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
        Schema::create('service_regions', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('banner_file_detail_id')->nullable();
            $table->unsignedBigInteger('dahboard_file_detail_id')->nullable();
            $table->unsignedBigInteger('service_type_id');
            $table->string('name');
            $table->text('description');
            $table->text('reason');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();   

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('banner_file_detail_id')->references('id')->on('file_details')->cascadeOnDelete();
            $table->foreign('dahboard_file_detail_id')->references('id')->on('file_details')->cascadeOnDelete();
            $table->foreign('service_type_id')->references('id')->on('service_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_regions');
    }
};
