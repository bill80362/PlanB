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
        Schema::create('member_data', function (Blueprint $table) {
            $table->id();
            //帳號資訊
            $table->string('login_account')->unique();
            $table->string('login_password');
            $table->char('formal',1)->default("N");
            //第三方編號
            $table->string("line_id")->nullable();
            $table->string("facebook_id")->nullable();
            $table->string("pos_id")->nullable();
            //關聯
            $table->integer("member_level_id")->nullable();
            //個人資料
            $table->string('name')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('email')->nullable();
            $table->char('sex',1)->nullable()->default(null);
            $table->date('birthday')->nullable();
            $table->integer("country_id")->nullable();
            $table->integer("city_id")->nullable();
            $table->integer("area_id")->nullable();
            $table->string("area_no1")->nullable();
            $table->string("area_no2")->nullable();
            $table->string("address")->nullable();
            $table->string("tel")->nullable();
            $table->string("remark")->nullable();
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
