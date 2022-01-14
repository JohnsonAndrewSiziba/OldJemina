<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVFEXOutstandingSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_f_e_x_outstanding_shares', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('v_f_e_x_e_s_id')->constrained();
            $table->double('outstanding_shares')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_f_e_x_outstanding_shares');
    }
}
