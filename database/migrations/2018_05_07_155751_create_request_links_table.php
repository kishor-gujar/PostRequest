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
            $table->integer('receiver_id');
            $table->integer('receiver_type_id');
            $table->integer('receiver_sub_type_id');
            $table->integer('request_line_id');
            $table->string('number');
            $table->string('email');
            $table->string('preferred_notification');
            $table->boolean('status');
            $table->string('ref');
            $table->integer('state_id');
            $table->string('towns');
            $table->integer('priority_id');
            $table->string('duration');
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
