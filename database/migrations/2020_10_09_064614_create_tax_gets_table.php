<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxGetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_gets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tax_register_id');
            $table->date('date');
            $table->string('tax_year');
            $table->decimal('tax_amount');
            $table->timestamps();

            $table->foreign('tax_register_id')->references('id')->on('tax_registers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_gets');
    }
}
