<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street', 60);
            $table->string('unit_no', 45);
            $table->string('barangay', 45);
            $table->string('city', 45);
            $table->string('province', 45);
            $table->string('postal_code', 20);
            $table->unsignedInteger('address_type_id');
            $table->unsignedInteger('user_id');

            $table->foreign('address_type_id')->references('id')->on('address_type');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('address');
    }
}
