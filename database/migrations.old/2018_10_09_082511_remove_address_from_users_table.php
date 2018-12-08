<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAddressFromUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('organization');
          $table->dropColumn('phone');
          $table->dropColumn('street_address');
          $table->dropColumn('city');
          $table->dropColumn('state');
          $table->dropColumn('zip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('organization');
          $table->string('phone', 10)->nullable(false);
          $table->string('street_address', 64)->nullable(false);
          $table->string('city', 24)->nullable(false);
          $table->string('state', 2)->nullable(false);
          $table->string('zip', 5)->nullable(false);
        });
    }
}
