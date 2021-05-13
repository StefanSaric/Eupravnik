<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->id();
            $table->integer('council_address_id');
            $table->integer('council_id');
            $table->string('representative');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('floor_number');
            $table->string('apartment_number');
            $table->integer('household_members_number')->nullable();
            $table->string('reported_area_size')->nullable();
            $table->string('on_site_area_size')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            
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
        Schema::dropIfExists('spaces');
    }
}
