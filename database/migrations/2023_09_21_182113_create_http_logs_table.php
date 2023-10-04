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
        Schema::create('http_logs', function (Blueprint $table) {
            $table->id();

            $table->string('type')->nullable();
            $table->string('primary_key')->nullable();
            $table->string('status')->nullable();
            $table->string('status_code')->nullable();
            $table->string('method')->nullable();

            $table->string('connect_time')->nullable();
            $table->string('process_time')->nullable();
            $table->string('url')->nullable();

            $table->json('request')->nullable();
            $table->json('response')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('http_logs');
    }
};
