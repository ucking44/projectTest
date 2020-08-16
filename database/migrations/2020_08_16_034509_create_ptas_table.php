<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptas', function (Blueprint $table) {
            $table->bigIncrements('pta_rate_id');
            $table->string('country');
            $table->string('pta_name');
            $table->double('value', 10, 2);
            $table->string('status')->default('disable');
            // $table->boolean('status')->default(false);
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
        Schema::dropIfExists('ptas');
    }
}
