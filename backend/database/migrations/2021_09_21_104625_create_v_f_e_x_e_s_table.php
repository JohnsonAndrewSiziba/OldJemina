<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVFEXESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_f_e_x_e_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("symbol")->unique();
            $table->string("sector");
            $table->boolean("status")->nullable();
            $table->string("isin_no")->nullable();
            $table->string('year_end')->nullable();
            $table->string('founded')->nullable();
            $table->string('listed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_f_e_x_e_s');
    }
}
