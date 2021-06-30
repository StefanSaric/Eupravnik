<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouncilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('councils', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('firm_id');
            $table->integer('steward_id');
            $table->integer('reserve_id');
            $table->string('short_name');
            $table->string('city');
            $table->string('area');
            $table->string('account');
            $table->string('maticni');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('pib');
            $table->string('phone');
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
        Schema::dropIfExists('councils');
    }
}
