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
        Schema::create('package_inclusions', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->text('description');
            $table->boolean('is_included')->default(true);
            $table->foreignId('package_details_id')->constrained('package_details');
            
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();
        });

        Schema::table('package_details', function (Blueprint $table) {
            $table->string('group_size')->after('walking_per_day'); // Add new column
            $table->boolean('best_seller')->after('group_size'); 
            $table->boolean('popular')->after('best_seller'); 
            $table->text('slugURL'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_inclusions');

        Schema::table('package_details', function (Blueprint $table) {
            $table->dropColumn('group_size'); // Rollback the change
        });
    }
};
