<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transections', function (Blueprint $table) {
            $table->id();
            $table->string('tran_no');
            $table->date('date');
            $table->biginteger('acc_debit');
            $table->biginteger('acc_credit');
            $table->string('des');
            $table->decimal('debit',16,2);
            $table->decimal('credit',16,2);
            $table->integer('accept_id')->default('0');
            $table->integer('user_approved_id');
            $table->integer('status_acc_id');
            $table->integer('branch_id');
            $table->integer('user_id');
            $table->integer('del')->default('0');
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
        Schema::dropIfExists('transections');
    }
}
