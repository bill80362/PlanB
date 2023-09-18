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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->char('status', 1)->default("Y")->comment('校正狀態');
            $table->char('type')->default("1")->comment('類型');
            $table->char('lang_type')->default("1")->comment('語系');
            $table->text('text')->nullable()->comment('名稱');
            $table->text('tran_text')->nullable()->comment('翻譯後名稱');
            $table->text('memo')->nullable()->comment('備註');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
