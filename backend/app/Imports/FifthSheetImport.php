<?php

namespace App\Imports;

use App\Models\BalanceSheet;
use App\Models\Company;
use App\Models\OutstandingShares;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FifthSheetImport implements ToModel, WithStartRow
{

    public function model(array $row)
    {

        $company = Company::where('symbol', Str::lower(trim($row[2])))->first()->id;

        return new OutstandingShares([
            'company_id'  => $company,
            'outstanding_shares'     => trim($row[1]) == "" ? null : trim($row[1]),
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
