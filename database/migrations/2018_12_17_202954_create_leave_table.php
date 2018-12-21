<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_applied');
            $table->datetime('leave_start_date');
            $table->datetime('leave_end_date');
            $table->float('leave_credits')->default(0);
            $table->longText('leave_address');
            $table->string('contact', 30);
            $table->unsignedInteger('leave_type_id');
            $table->unsignedInteger('leave_status_id');

            $table->foreign('leave_type_id')->references('id')->on('leave_type');
            $table->foreign('leave_status_id')->references('id')->on('leave_status');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('leave');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        
    }
}
