<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        //平台账户
        Schema::create('counts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        //转化类型表
        Schema::create('conv_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        //转化项目表
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('conv_type_id');
            $table->string('conv_value')->default(1);
            $table->string('description')->nullable();
            $table->timestamps();
        });
        //转化表
        Schema::create('convs', function (Blueprint $table) {
            $table->id();
            $table->string('date')->comment('转化日期');
            $table->string('click_id')->comment('点击id');
            $table->string('conv_type_id');
            $table->string('conv_name');
            $table->string('conv_value');
            $table->string('keyword')->nullable();
            $table->string('url')->nullable();
            $table->string('device')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('counts');
        Schema::dropIfExists('conv_types');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('convs');
    }
}
