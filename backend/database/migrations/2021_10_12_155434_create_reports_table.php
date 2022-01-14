<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('path');
            $table->foreignId('report_type_id')->constrained();

            $table->date('from_date');
            $table->date('to_date')->nullable();

            $table->text('section_1')->nullable();
            $table->string('section_1_title')->nullable();

            $table->text('section_2')->nullable();
            $table->string('section_2_title')->nullable();

            $table->text('section_3')->nullable();
            $table->string('section_3_title')->nullable();

            $table->text('section_4')->nullable();
            $table->string('section_4_title')->nullable();

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
        Schema::dropIfExists('reports');
    }
}
