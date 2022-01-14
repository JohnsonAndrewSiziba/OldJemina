<?php

namespace App\Imports;

use App\Models\ETF;
use App\Models\ETFPriceSheet;
use App\Models\Import;
use App\Models\VFEX;
use App\Models\VFEXPriceSheet;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ETFPriceSheetImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!str_contains(Str::lower($row[1]), 'total')){

//            dd($row[1]);

            $company = ETF::where('symbol', Str::lower(trim($row[1])))->first();
//            dd(trim($row[1]));
            $companyId = $company->id;

            $date = explode("-",$row[13]);
            if(count($date) != 3) $date = explode("/",$row[13]);

            $day = $date[0];
            $month = strlen($date[1]) == 1 ? "0". $date[1] : $date[1];
            $year = strlen($date[2]) == 2 ? "20". $date[2] : $date[2];
            $date = $year . "-" . $month . "-" . $day;

            $ymd = date('Y-m-d', strtotime($date));

            Import::firstOrCreate(['date' => $ymd]);

            $count = ETFPriceSheet::where('date', $ymd)->where('e_t_f_s_id', $companyId)->count();

            if($count < 1) {
                $volume = $this->sanitizeNumber($row[2]);
                $close = $this->sanitizeNumber($row[8]);
                $open = $this->sanitizeNumber($row[7]);

                $turnover = $close * $volume;

                $percentage_change = ($close - $open)/$open;
                $percentage_change = $percentage_change * 100;

                return new ETFPriceSheet([
                    'e_t_f_s_id'  => $companyId,
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
                    'turnover'    => $turnover,
                    'weight'    => null,

                    'current_yield'    => $this->sanitizeNumber($row[11]),
                    'open_yield'    => $this->sanitizeNumber($row[12]),
                    'date'    => $ymd
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
