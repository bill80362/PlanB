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
        Schema::create('list_column_settings', function (Blueprint $table) {
            $table->id();

            // $table->morphs('list_model');
            $table->string('list_model_type');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('column_name');
            $table->integer('sort')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_column_settings');
    }
};
