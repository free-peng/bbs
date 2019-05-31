<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            //新添加的user字段
            $table->tinyInteger('is_admin')->default('0')->comment('是否是管理员,1是,0否');
            $table->string('avatar')->default('http://cdn.guanggoo.com//static/avatar/46/m_default.png')->comment('用户头像');
            $table->tinyInteger('sex')->default(1)->comment('用户性别,1为男，0为女');
            $table->string('website')->default('')->comment('个人网站地址');
            $table->string('weibo')->default('')->comment('个人微博');
            $table->string('github')->default('')->comment('github地址');
            $table->string('company')->default('')->comment('公司');
            //以上为添加的用户信息字段
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
    }
}
