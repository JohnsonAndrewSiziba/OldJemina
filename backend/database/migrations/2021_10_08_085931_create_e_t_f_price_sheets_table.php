<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateETFPriceSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_t_f_price_sheets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('e_t_f_s_id')->constrained();
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
            $table->double('turnover')->nullable();
            $table->double('weight')->nullable();
            $table->date('date')->nullable();
            $table->double('current_yield')->nullable();
            $table->double('open_yield')->nullable();
            $table->string('listed_on')->default('etfs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_t_f_price_sheets');
    }
}
