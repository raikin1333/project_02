<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedBigInteger('user_id');
            $table->string('object_title');
            $table->string('object_type');
            $table->string('object_explain')->nullable();
            $table->unsignedInteger('parent_object_id')->nullable();
            $table->string('save_file_title')->nullable();
            $table->string('save_file_type')->nullable();
            $table->integer('periodic_execution_number')->nullable();
            $table->string('periodic_execution_unit')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('workflows', function (Blueprint $table) {
            $table->dropForeign(['object_id']); // ここでは 'object_id' が外部キーのカラム名を指します
        });
        Schema::dropIfExists('things');
    }
};