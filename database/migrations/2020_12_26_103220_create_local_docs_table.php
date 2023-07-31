<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_docs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('doc_type');
            $table->string('short_title');
            $table->string('file');
            $table->integer('user_id');
            $table->integer('branch_id');
            $table->integer('del')->default('1');
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
        Schema::dropIfExists('local_docs');
    }
}
