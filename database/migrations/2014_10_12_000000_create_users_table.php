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
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->date('birthday')->nullable();
            $table->biginteger('phone')->unique();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->integer('vl_id')->nullable();
            $table->integer('dt_id')->nullable();
            $table->integer('pv_id')->nullable();
            $table->integer('last_vl_id')->nullable();
            $table->integer('last_dt_id')->nullable();
            $table->integer('last_pv_id')->nullable();
            $table->integer('emp_id')->nullable();
            $table->integer('term_id')->nullable();
            $table->integer('role_id')->default('4');
            $table->integer('branh_id')->nullable();
            $table->integer('image')->nullable();
            $table->integer('del')->default('0');
            $table->timestamps();

            //$table->foreign('emp_id')->references('id')->on('employees');
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
