<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_tags', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('ads_id');
            $table->unsignedBigInteger('tags_id');

            $table->foreign('ads_id')->references('id')->on('ads')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tags_id')->references('id')->on('tags')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('ads_tags');
    }
}
