<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            // META
            $table->increments('id');
            $table->timestamps();

            // USER (OWNER) INFO
            $table->string('user', 24)->nullable(false);
            $table->integer('userid')->nullable(false);

            // SUBJECT INFO
            $table->string('first_name', 32)->nullable(false); // givenName
            $table->string('middle_name', 32)->nullable(true);
            $table->string('last_name', 32)->nullable(false); // familyName
            $table->string('fed_id_num', 9)->nullable(false); // SSN
            $table->string('street_address', 64)->nullable(false); //address.line
            $table->string('dob', 10)->nullable(false); //"1998-07-18"
            $table->string('email', 32)->nullable(false);
            $table->string('city', 32)->nullable(false); // address.municipality
            $table->string('state', 2)->nullable(false); // address.regionCode  Need to append US-{{ State }}
            $table->string('phone', 10 )->nullable(false); // phone FORMAT: +14041231234
            $table->string('postal_code', 5)->nullable(false); // address.postalCode

            $table->string('drivers_license_type', 1); //driversLicense.type  p || c (personal or commercial)
            $table->string('drivers_license_number', 24); //driversLicense.licenseNumber
            $table->string('drivers_license_agency', 2); // driversLicense.issuingAgency
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
