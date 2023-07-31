<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_docs', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no');
            $table->date('date');
            $table->integer('doc_type');
            $table->string('sort_titile');
            $table->string('no_doc');
            $table->date('date_doc');
            $table->integer('depart_id');
            $table->integer('storage_file_id');
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
        Schema::dropIfExists('import_docs');
    }
}
