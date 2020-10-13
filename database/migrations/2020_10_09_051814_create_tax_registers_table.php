<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_registers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->integer('holding_no')->unique();
            $table->unsignedBigInteger('word_number_id');
            $table->unsignedBigInteger('village_id');
            $table->integer('building')->nullable();
            $table->integer('doa_ripe_tin_shed')->nullable();
            $table->integer('raw_chapra')->nullable();
            $table->integer('pucca_house')->nullable();
            $table->decimal('amount_of_land');
            $table->decimal('house_and_land_rate');
            $table->unsignedBigInteger('occupation_id');
            $table->decimal('amount_of_tax');
            $table->integer('minor_girl_count')->nullable();
            $table->integer('adult_girl_count')->nullable();
            $table->integer('minor_boy_count')->nullable();
            $table->integer('adult_boy_count')->nullable();
            $table->integer('count_of_member')->nullable();
            $table->tinyInteger('sanitation')->nullable();
            $table->string('nid_number',30)->unique();
            $table->string('mobile', 30)->unique();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

            $table->foreign('word_number_id')->references('id')->on('word_numbers');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->foreign('occupation_id')->references('id')->on('occupations');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_registers');
    }
}
