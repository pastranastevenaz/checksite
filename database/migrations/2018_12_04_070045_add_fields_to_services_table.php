<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
          // $table->string('website')->nullable(false);
          $table->integer('website_id');
          $table->string('requested_task')->nullable(false);
          // WEBSITE INFO  |  Optional, as may be saved in database website table
          // CHECKING IN THE CONTROLLER FIRST, THAT THIS WEBSITE DOES NOT APPEAR
          $table->string('url');
          $table->string('ipv4_address');
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
          // ssh root@ipaddress "mysqldump -u dbuser -p dbname | gzip -9" > dblocal.sql.gz
          $table->string('dbhost_host');
          $table->string('dbhost_user');
          $table->string('dbhost_password');
          $table->string('dbhost_port');
          // INfO FOR MIGRATION
          $table->string('destination_temporary_url');
          $table->string('destination_ftp_host');
          $table->string('destination_ftp_user');
          $table->string('destination_ftp_password');
          $table->string('destination_ftp_path');
          $table->string('destination_ftp_port');

          $table->string('requested_task');
          $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('website_id');
            $table->dropColumn('requested_task');
            $table->dropColumn('user_id');
            $table->dropColumn('user_id');
            $table->dropColumn('user_id');
            $table->dropColumn('user_id');
            $table->dropColumn('user_id');
            $table->dropColumn('user_id');
        });
    }
}
