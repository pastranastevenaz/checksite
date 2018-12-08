<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('websites', function (Blueprint $table) {
          $table->string('url')->nullable(false);
          $table->ipAddress('ipv4_address');
          $table->boolean('hosted')->default(0);
          $table->string('hostingpanel_login_url');
          $table->string('hostingpanel_username');
          $table->string('hostingpanel_pass');
          $table->string('primaryftp_username');
          $table->string('primaryftp_pass');
          $table->integer('primaryftp_port');
          $table->string('hosting_login_url');
          $table->string('app_loginurl');
          $table->string('app_username');
          $table->string('app_pass');
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
          $table->dropColumn('url');
          $table->dropColumn('ipv4_address');
          $table->dropColumn('hosted');
          $table->dropColumn('hostingpanel_login_url');
          $table->dropColumn('hostingpanel_username');
          $table->dropColumn('hostingpanel_pass');
          $table->dropColumn('primaryftp_username');
          $table->dropColumn('primaryftp_pass');
          $table->dropColumn('primaryftp_port');
          $table->dropColumn('hosting_login_url');
          $table->dropColumn('app_loginurl');
          $table->dropColumn('app_username');
          $table->dropColumn('app_pass');
        });
    }
}
