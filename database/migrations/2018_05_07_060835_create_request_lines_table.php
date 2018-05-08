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
            $table->string('receiver_type');
            $table->string('receiver_sub_type');
            $table->string('request_line_description');
            $table->double('Price_per_month');
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
