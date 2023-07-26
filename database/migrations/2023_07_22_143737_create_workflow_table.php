<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('workflows', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('object_id');
            $table->integer('work_operation_order');
            $table->string('work_type');
            $table->string('work_input_value');
            $table->timestamps();

            $table->foreign('object_id')->references('id')->on('things');
        });
    }

    public function down()
    {
        Schema::dropIfExists('workflows');
    }
};