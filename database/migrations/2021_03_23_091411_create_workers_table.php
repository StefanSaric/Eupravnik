<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('password_confirm');
            $table->integer('type_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('telephone');
            $table->string('licence');
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
        Schema::dropIfExists('workers');
    }
}
