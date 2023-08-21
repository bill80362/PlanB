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
        Schema::create('Member_Data', function (Blueprint $table) {
            $table->id();
            $table->string('MemberNum')->unique();
            $table->string('CellPhone')->unique();
            //
            $table->string('Name');
            $table->string('Email')->nullable();
            $table->tinyInteger('Formal_Flag')->default(1);
            $table->tinyInteger('Sex')->nullable()->default(null);
            $table->date('Birthday')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Member_Data');
    }
};
