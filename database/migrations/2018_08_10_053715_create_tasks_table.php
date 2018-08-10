<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            // META
            $table->increments('id');
            $table->timestamps();
            $table->ipAddress('ipAddress');

            // USER INFO
            $table->string('user', 24)->nullable(false);
            $table->integer('userid')->nullable(false);

            // SERVICE REQUEST INFO
            $table->boolean('criminal_background_check')->nullable(false);
            $table->boolean('employment_verification')->nullable(false);
            $table->boolean('drug_testing')->nullable(false);
            // SUBJECT INFO

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
