<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGetTradeValueProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `get_trade_value`;
            CREATE PROCEDURE `get_trade_value` ()
            BEGIN
                DECLARE from_date date;
                DECLARE to_date date;

                SET @from_date = (Select week_start from sheet_weeks ORDER BY week_start DESC LIMIT 1);
                SET @to_date = (Select week_end from sheet_weeks ORDER BY week_end DESC LIMIT 1);

                SELECT `company_id`, Sum(`volume`) as `TradedVolume` FROM `all_prices`
                WHERE `date` >= @from_date AND `date` <= @to_date
                GROUP BY `company_id`
                ORDER BY `TradedVolume` DESC
                LIMIT 5;
            END;";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_trade_value_procedure');
        $query = "DROP PROCEDURE IF EXISTS `get_trade_value`";
        DB::unprepared($query);
    }
}
