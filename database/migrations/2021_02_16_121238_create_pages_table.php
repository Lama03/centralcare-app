<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('gender')->default(\App\Constants\Genders::MALE);
            $table->tinyInteger('status')->default(\App\Constants\Statuses::ACTIVE);
            $table->string('image')->nullable();
            $table->string('discount_url')->nullable();
            $table->string('discount_percent')->nullable();
            $table->string('discount_text')->nullable();
            $table->string('template')->default(\App\Constants\Templates::RAM);
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
        Schema::dropIfExists('pages');
    }
}
