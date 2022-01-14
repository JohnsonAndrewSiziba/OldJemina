<?php

namespace App\Imports;

use App\Classes\Helpers;
use App\Models\AllPrices;
use App\Models\Company;
use App\Models\HistoricData;
use App\Models\PriceSheet;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class HistoricDataImport implements ToModel, WithStartRow
{

    public function model(array $row)
    {
        try {
            $company = Company::where('symbol', Str::lower(trim($row[1])))->first();
            $companyId = $company->id;
        }

        catch( \Exception $e){
            return null;
        }

        $ymd = Helpers::makeDate($row[0]);

        $count = AllPrices::where('date', $ymd)->where('company_id', $companyId)->count();


        if($count < 1) {
            $outstandingShares = $company->outstanding_shares->outstanding_shares;
            $volume = Helpers::sanitizeNumber($row[7]);
            $close = Helpers::sanitizeNumber($row[5]);
            $open = Helpers::sanitizeNumber($row[2]);
            
            if($open == 0){
                $open = AllPrices::orderBy('date', 'desc')
                    ->where('company_id', $companyId)
                    ->get()[0]->open;

            }

            if($close == 0){
                $close = AllPrices::orderBy('date', 'desc')
                    ->where('company_id', $companyId)
                    ->get()[0]->close;

            }

            $turnover = $close * $volume;

            $market_cap = $outstandingShares * $close;

            $market_cap = round(($market_cap/1000000), 2);

            return new AllPrices([
                'company_id'  => $companyId,
                'volume'    => $volume,
                'value'    => Helpers::sanitizeNumber($row[8]),
                'high'    => Helpers::sanitizeNumber($row[3]),
                'low'    => Helpers::sanitizeNumber($row[4]),
                'open'    => $open,
                'close'    => $close,
                'vwap'    => Helpers::sanitizeNumber($row[6]),
                'change'    => Helpers::sanitizeNumber($row[9]),
                'percentage_change'    => Helpers::sanitizeNumber($row[10]),
                'turnover'    => $turnover,
                'date'    => $ymd,
                'listed_on'    => "zse",
                'market_cap'    => $market_cap,
            ]);
        }

        else {
            return null;
        }

    }

    public function startRow(): int
    {
        return 2;
    }
}
