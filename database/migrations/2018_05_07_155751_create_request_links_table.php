<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('sub_type');
            $table->string('request_line');
            $table->string('link_number');
            $table->string('link_email');
            $table->string('preferred_notification');
            $table->boolean('status');
            $table->string('link_ref');
            $table->string('link_state');
            $table->string('link_town');
            $table->string('priority');
            $table->string('link_duration');
            $table->double('total_amount');
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
        Schema::dropIfExists('request_links');
    }
}
