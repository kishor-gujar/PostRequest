<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('line');
            $table->integer('receiver_type_id');
            $table->integer('receiver_sub_type_id');
            $table->text('request_line_description');
            $table->double('price_per_month');
            $table->string('status');
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
        Schema::dropIfExists('request_lines');
    }
}
