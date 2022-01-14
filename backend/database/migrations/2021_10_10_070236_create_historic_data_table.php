<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historic_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('company_id')->constrained();
            $table->double('volume');
            $table->double('value')->nullable();
            $table->double('high')->nullable();
            $table->double('low')->nullable();
            $table->double('open')->nullable();
            $table->double('close')->nullable();
            $table->double('vwap')->nullable();
            $table->double('change')->nullable();
            $table->double('percentage_change')->nullable();
            $table->double('turnover')->nullable();
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historic_data');
    }
}
