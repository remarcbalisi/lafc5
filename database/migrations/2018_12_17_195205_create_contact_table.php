<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number', 45);

            $table->unsignedInteger('contact_type_id');
            $table->unsignedInteger('user_id');

            $table->foreign('contact_type_id')->references('id')->on('contact_type');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('country_code', 10);
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
        Schema::dropIfExists('contact');
    }
}
