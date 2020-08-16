<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fxes', function (Blueprint $table) {
            $table->bigIncrements('fx_id');
            $table->string('country');
            $table->string('currency');
            $table->double('fx_buy', 10, 2);
            $table->double('fx_sell', 10, 2);
            //$table->string('flag');
            $table->string('status')->default('disable');
            //$table->boolean('status')->default(false);
            //$table->enum('status', ['enable', 'disable']);
            //$table->boolean('slider')->default(false);
           //$table->enum('slider', ['enable', 'disable']);
            //$table->bigInteger('user_modified');
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
        Schema::dropIfExists('fxes');
    }
}
