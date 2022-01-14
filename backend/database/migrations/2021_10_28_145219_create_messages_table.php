<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('investment_planning')->nullable();
            $table->boolean('loan_sanction')->nullable();
            $table->boolean('mutual_funds')->nullable();
            $table->boolean('insurance_consulting')->nullable();
            $table->boolean('taxes_consulting')->nullable();
            $table->boolean('others')->nullable();
            $table->boolean('read')->nullable();
            $table->boolean('responded')->nullable();
            $table->boolean('archived')->default(false);
            $table->string('best_time_to_reach')->nullable();
            $table->string('hear_about_us')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
