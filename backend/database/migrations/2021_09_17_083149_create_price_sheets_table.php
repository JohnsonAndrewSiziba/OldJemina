<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_sheets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('company_id')->constrained();
            $table->double('volume');
            $table->double('value')->nullable();
            $table->double('previous_close')->nullable();
            $table->double('high')->nullable();
            $table->double('low')->nullable();
            $table->double('open')->nullable();
            $table->double('close')->nullable();
            $table->double('average')->nullable();
            $table->integer('trades')->nullable();
            $table->double('vwap')->nullable();
            $table->double('change')->nullable();
            $table->double('percentage_change')->nullable();
            $table->double('market_cap')->nullable();
            $table->double('turnover')->nullable();
            $table->double('weight')->nullable();
            $table->date('date')->nullable();
            $table->double('current_yield')->nullable();
            $table->double('open_yield')->nullable();
            $table->string('listed_on')->default('zse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_sheets');
    }
}
