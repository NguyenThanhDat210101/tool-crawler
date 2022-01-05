<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contents');
            $table->string('company_name')->index();

            $table->unsignedInteger('stats_id');
            $table->foreign('stats_id')
            ->references('id')
            ->on('stats')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('stats_details');
    }
}
