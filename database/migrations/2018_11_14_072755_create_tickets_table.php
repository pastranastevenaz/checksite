<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('website_id');
            // $table->string('website')->nullable(false);
            $table->integer('requested_task')->nullable(false);
            $table->mediumText('description_1');
            $table->mediumText('description_2');
            $table->mediumText('description_3');
            $table->mediumText('description_4');
            $table->mediumText('misc_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
