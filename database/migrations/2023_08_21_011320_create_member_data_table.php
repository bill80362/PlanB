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
//            $table->integer("ID")->primary()->autoIncrement();
            $table->id("ID");
            $table->string('MemberNum')->unique();
            $table->string('Login_Email')->unique();
            $table->string('Login_Password');
            //
            $table->integer("Member_Level_ID")->nullable();
            $table->string("LID")->nullable();
            $table->string("UID")->nullable();
            //
            $table->string('Name')->nullable();
            $table->string('Cellphone')->nullable();
            $table->string('Email')->nullable();
            $table->tinyInteger('Formal_Flag')->default(1);
            $table->tinyInteger('Sex')->nullable()->default(null);
            $table->date('Birthday')->nullable();
            //
            $table->integer("Country_ID")->nullable();
            $table->integer("City_ID")->nullable();
            $table->integer("Area_ID")->nullable();
            $table->string("Area_No1")->nullable();
            $table->string("Area_No2")->nullable();
            $table->string("Address")->nullable();
            $table->string("Tel")->nullable();
            $table->string("Remark_Item")->nullable();
            $table->string("Remark")->nullable();
            //
            $table->integer("Build_Date")->nullable();
            //
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
