<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('news_type_id')->nullable();
            $table->string('name_la')->nullable();
            $table->string('name_en')->nullable();
            $table->text('short_des_la')->nullable();
            $table->text('short_des_en')->nullable();
            $table->longtext('des_la')->nullable();
            $table->longtext('des_en')->nullable();
            $table->integer('status')->default('1');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('news');
    }
}
