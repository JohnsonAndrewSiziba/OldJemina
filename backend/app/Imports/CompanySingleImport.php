<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CompanySingleImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            'ZSE' => new FirstSheetImport(),
            'VFEX' => new FourthSheetImport(),
            'Exchange Traded Funds' => new ThirdSheetImport(),
        ];
    }
}
