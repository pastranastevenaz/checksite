<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatabaseFieldsToWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('websites', function (Blueprint $table) {
          $table->string('dbhost_host');
          $table->string('dbhost_user');
          $table->string('dbhost_password');
          $table->string('dbhost_port');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('websites', function (Blueprint $table) {
          $table->dropColumn('dbhost_host');
          $table->dropColumn('dbhost_user');
          $table->dropColumn('dbhost_password');
          $table->dropColumn('dbhost_port');
        });
    }
}
