<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('owner_id');
            $table->integer('contractor_id');
            $table->string('street_address', 64)->nullable(false);
            $table->decimal('lat',10, 7);
            $table->decimal('long',10, 7);

            // Service info

            // Bedrooms
            $table->integer('bedroom0')->default(0);
            $table->integer('bedroom1')->default(0);
            $table->integer('bedroom2')->default(0);
            $table->integer('bedroom3')->default(0);
            $table->integer('bedroom4')->default(0);
            $table->integer('bedroom5')->default(0);
            $table->integer('bedroom6')->default(0);
            $table->integer('bedroom7')->default(0);
            $table->integer('bedroom8')->default(0);
            $table->integer('bedroom9')->default(0);
            // Bathrooms
            $table->integer('bathroom0')->default(0);
            $table->integer('bathroom1')->default(0);
            $table->integer('bathroom2')->default(0);
            $table->integer('bathroom3')->default(0);
            $table->integer('bathroom4')->default(0);
            // Kitchen
            $table->integer('kitchen')->default(0);
            // Diningroom
            $table->integer('diningroom')->default(0);
            // Living room
            $table->integer('livingroom')->default(0);
            // Garage
            $table->integer('garage')->default(0);

            // Other Rooms
            $table->string('extraroom1_name')->nullable();
            $table->integer('extraroom1_level')->default(0);

            $table->string('extraroom2_name')->nullable();
            $table->string('extraroom2_level')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
