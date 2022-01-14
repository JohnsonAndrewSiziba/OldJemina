<?php

namespace App\Imports;

use App\Models\BalanceSheet;
use App\Models\Company;
use App\Models\OutstandingShares;
use App\Models\Price;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use DateTime;


class SixthSheetImport implements ToCollection, WithHeadingRow
{


    public function collection(Collection $collection)
    {
        return  new Temp($collection);
    }
}
