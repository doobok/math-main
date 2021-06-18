<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->integer('cityId')->nullable();
            $table->integer('klass')->nullable();
            $table->integer('subjectId')->nullable();
            $table->integer('priceId')->nullable();
            $table->float('cost', 7, 2)->nullable();
            $table->float('discount', 7, 2)->nullable();
            $table->float('total', 7, 2)->nullable();
            $table->string('promoStatus')->nullable();
            $table->string('promo')->nullable();
            $table->string('marker')->nullable();
            $table->boolean('fullForm')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
