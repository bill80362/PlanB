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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->comment('網址的固定鏈接，也就是網址的最後面，不可重複');
            $table->char('lang_type')->default('zh-tw')->comment('語系');
            $table->string('page_name')->nullable();

            $table->text('content')->nullable()->comment('主內容欄位');
            $table->text('draft')->nullable()->comment('草稿');

            $table->text('seo_title')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
