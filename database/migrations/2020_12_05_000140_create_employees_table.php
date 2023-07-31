<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('bod');
            $table->integer('sex');
            $table->integer('bvill_id');
            $table->integer('bdis_id');
            $table->integer('bpro_id');
            $table->string('address')->nullable()->change();
            $table->integer('vill_id');
            $table->integer('dis_id');
            $table->integer('pro_id');
            $table->string('phone');
            $table->integer('pos_id');
            $table->integer('dpart_id');
            $table->date('start_date')->nullable()->change();
            $table->date('end_date')->nullable()->change();
            $table->integer('mar_id');
            $table->string('mar_name')->nullable()->change();
            $table->string('mar_work')->nullable()->change();
            $table->string('mar_address')->nullable()->change();
            $table->string('mar_phone')->nullable()->change();
            $table->text('note')->nullable()->change();
            $table->string('picture');
            $table->string('file');
            $table->integer('status')->default('1');
            $table->integer('del')->default('0');
            $table->timestamps();
            
            /*
            $table->foreign('bvill_id')->references('id')->on('villages');
            $table->foreign('bdis_id')->references('id')->on('districts');
            $table->foreign('bpro_id')->references('id')->on('provinces');

            $table->foreign('pos_id')->references('id')->on('positions');
            $table->foreign('dpart_id')->references('id')->on('departments');
            $table->foreign('mar_id')->references('id')->on('marries');

            $table->foreign('vill_id')->references('id')->on('villages');
            $table->foreign('dis_id')->references('id')->on('districts');
            $table->foreign('pro_id')->references('id')->on('provinces');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
