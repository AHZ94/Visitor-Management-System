<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('visitor_id');
            $table->unsignedInteger('vehicle_id');
            $table->date('date');
            $table->time('times');
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('approval')->nullable();
            $table->string('status')->default('Pending');
            $table->string('purpose');
            $table->string('unique_code');
            $table->text('remarks')->nullable();
            $table->integer('no_person');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('visitor_id')->references('id')->on('visitors');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
