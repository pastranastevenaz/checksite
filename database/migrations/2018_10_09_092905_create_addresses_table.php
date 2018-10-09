<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


            $table->integer('owner_id');
            $table->string('street_address', 64)->nullable(false);
            $table->string('city', 24)->nullable(false);
            $table->string('state',2)->nullable(false);
            $table->string('zip', 5)->nullable(false);

            $table->decimal('lat', 10, 7)->nullable(false);
            $table->decimal('long', 10, 7)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
