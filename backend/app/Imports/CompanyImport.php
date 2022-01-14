<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CompanyImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            'ZSE' => new FirstSheetImport(),
            'Balance Sheets' => new SecondSheetImport(),
            'Exchange Traded Funds' => new ThirdSheetImport(),
            'VFEX' => new FourthSheetImport(),
            'Outstanding Shares' => new FifthSheetImport(),
            'VFEX Outstanding Shares' => new VFEXOutstandingSharesImport(),
        ];
    }
}
