<?php

namespace App\Imports;

use App\Models\BalanceSheet;
use Maatwebsite\Excel\Concerns\ToModel;

class BalanceSheetImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BalanceSheet([
            //
        ]);
    }
}
