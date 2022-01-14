<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZSEIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_s_e_indices', function (Blueprint $table) {
            $table->id();

            $table->double('all_share_open');
            $table->double('all_share_close');
            $table->double('all_share_change');

            $table->double('top_ten_open');
            $table->double('top_ten_close');
            $table->double('top_ten_change');

            $table->double('top_15_open');
            $table->double('top_15_close');
            $table->double('top_15_change');

            $table->double('medium_cap_open');
            $table->double('medium_cap_close');
            $table->double('medium_cap_change');

            $table->double('small_cap_open');
            $table->double('small_cap_close');
            $table->double('small_cap_change');

            $table->date('date');

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
        Schema::dropIfExists('z_s_e_indices');
    }
}
