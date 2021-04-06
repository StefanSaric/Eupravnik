<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->integer('council_id');
            $table->integer('user_id');
            $table->string('group_id')->nullable();
            $table->string('date', 100);
            $table->string('name', 255)->nullable();
            $table->string('reported_condition', 255)->nullable();
            $table->string('contractor', 255)->nullable();
            $table->string('priority', 100)->nullable();
            $table->string('element_date', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('status', 100)->nullable();
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
        Schema::dropIfExists('maintenances');
    }
}
