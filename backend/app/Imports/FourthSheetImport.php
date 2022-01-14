<?php

namespace App\Imports;

use App\Models\BalanceSheet;
use App\Models\Company;
use App\Models\ETF;
use App\Models\VFEX;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FourthSheetImport implements ToModel, WithStartRow
{

    public function model(array $row)
    {

        return new VFEX([
            'name'     => trim($row[0]),
            'symbol'     => trim($row[1]),
            'sector'     => trim($row[2]),
            'status'     => Str::lower(trim($row[3])) == "active",
            'isin_no'     => trim($row[4]),
            'year_end'     => trim($row[5]),
            'founded'     => trim($row[6]),
            'listed'     => trim($row[7]),
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
