<?php

namespace App\Imports;

use App\Models\BalanceSheet;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SecondSheetImport implements ToModel, WithStartRow
{

    public function model(array $row)
    {

        print_r(trim($row[2]));
        $company = Company::where('symbol', Str::lower(trim($row[2])) )->first()->id;
        print_r("<br> <br>");

        return new BalanceSheet([
            'company_id'  => $company,
            'balance_sheet'     => trim($row[1]) == "" ? null : trim($row[1]),
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
