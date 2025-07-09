<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialitityTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specificity_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedInteger('specificity_id');
            $table->unique(['specificity_id', 'locale']);
            $table->foreign('specificity_id')->references('id')->on('specificities')->onDelete('cascade');

            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('canonical_url')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('specificity_translations');
    }
}
