<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouncilAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('council_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('council_id');
            $table->string('protection_status');
            $table->float('area_size');
            $table->string('built_year');
            $table->string('short_name');
            $table->string('floors_number');
            $table->integer('elevators_number');
            $table->string('roof_type');
            $table->boolean('lightning_rod');
            $table->boolean('district_heating');
            $table->boolean('cellar');
            $table->boolean('attic');
            $table->boolean('shelter');
            $table->boolean('energy_passport')->nullable();
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
        Schema::dropIfExists('council_addresses');
    }
}
