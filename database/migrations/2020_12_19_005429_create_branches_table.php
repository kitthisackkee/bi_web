<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('logo')->nullable();
            $table->string('company_photo')->nullable();
            $table->string('structure_photo')->nullable();
            $table->string('name_la')->nullable();
            $table->string('name_en')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address_la')->nullable();
            $table->string('address_en')->nullable();
            $table->string('whatapps')->nullable();
            $table->string('fanpage')->nullable();
            $table->string('youtube')->nullable();
            $table->text('google_map')->nullable();
            $table->string('play_store')->nullable();
            $table->string('app_store')->nullable();
            $table->string('app_gallery')->nullable();
            $table->string('director_sign')->nullable();
            $table->string('chechker_sign')->nullable();
            $table->string('customer_sign')->nullable();
            $table->string('staff_sign')->nullable();
            $table->longtext('bill_header')->nullable();
            $table->longtext('bill_footer')->nullable();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('branches');
    }
}
