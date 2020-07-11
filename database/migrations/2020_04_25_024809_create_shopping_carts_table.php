<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(0);

            $table->string('nombreComprador')->nullable();
            $table->string('emailComprador')->nullable();
            $table->string('direccionComprador')->nullable();
            $table->string('celularComprador')->nullable();


            $table->string('api_token')->default(1);
            $table->string('statusWebpay')->default('Inactivo');

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
        Schema::dropIfExists('shopping_carts');
    }
}
