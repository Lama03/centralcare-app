<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferBrancheTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_branche_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedInteger('offer_branche_id');

            $table->string('name');
            $table->string('slug');
            $table->string('desc_offer')->nullable();
            $table->string('currency');
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
        Schema::dropIfExists('offer_branche_translations');
    }
}
