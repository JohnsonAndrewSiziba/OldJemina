<?php

namespace App\Imports;

use App\Models\AllPrices;
use App\Models\Company;
use App\Models\Import;
use App\Models\PriceSheet;
use DateTime;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PriceSheetImporty implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {


        if (!str_contains(Str::lower($row[1]), 'total')){
            try {
                $company = Company::where('symbol', Str::lower(trim($row[1])))->first();
                $companyId = $company->id;
            }

            catch( \Exception $e){
                return null;
            }

            $date = explode("-",$row[13]);
            if(count($date) != 3) $date = explode("/",$row[13]);

//            dd($date);

            $day = $date[0];
//            dd($date[1]);
            $month = strlen($date[1]) == 1 ? "0". $date[1] : $date[1];
            $year = strlen($date[2]) == 2 ? "20". $date[2] : $date[2];
            $date = $year . "-" . $month . "-" . $day;
//            print_r($date . "<br>");
//            dd($date);
//            dd($date);
//            print_r($date . "<br>");
//            $ymd = Date::createFromFormat('Y-m-d', $date)->format('Y-m-d H:i:s');
            $ymd = date('Y-m-d', strtotime($date));
//            dd($ymd);
            Import::firstOrCreate(['date' => $ymd]);
            $count = AllPrices::where('date', $ymd)->where('company_id', $companyId)->count();
//            dd($count);
            if($count < 1) {
                $outstandingShares = $company->outstanding_shares->outstanding_shares;

                $volume = $this->sanitizeNumber($row[2]);
                $close = $this->sanitizeNumber($row[8]);
                $open = $this->sanitizeNumber($row[7]);

                $turnover = $close * $volume;

                $market_cap = $outstandingShares * $close;

                $market_cap = round(($market_cap/1000000), 2);

                $percentage_change = ($close - $open)/$open;
                $percentage_change = $percentage_change * 100;

                return new AllPrices([
                    'company_id'  => $companyId,
                    'volume'    => $volume,
                    'value'    => $this->sanitizeNumber($row[3]),
                    'previous_close'    => $this->sanitizeNumber($row[4]),
                    'high'    => $this->sanitizeNumber($row[5]),
                    'low'    => $this->sanitizeNumber($row[6]),
                    'open'    => $open,
                    'close'    => $close,
                    'average'    => $this->sanitizeNumber($row[9]),
                    'trades'    => $this->sanitizeNumber($row[10]),

                    'vwap'    => null,
                    'change'    => $close - $open,
                    'percentage_change'    => $percentage_change,
                    'market_cap'    => $market_cap,
                    'turnover'    => $turnover,
                    'weight'    => null,

                    'current_yield'    => $this->sanitizeNumber($row[11]),
                    'open_yield'    => $this->sanitizeNumber($row[12]),
                    'date'    => $ymd,
                    'listed_on' => 'zse'
                ]);
            }

        }

    }


    // remove , from number
    public function sanitizeNumber($number){
        $b = str_replace( ',', '', $number );
        if( is_numeric( $b ) ) {
            return $b;
        }
        else{
            return $number;
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
