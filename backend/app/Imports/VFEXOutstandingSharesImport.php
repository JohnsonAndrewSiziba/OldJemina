<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\OutstandingShares;
use App\Models\VFEX;
use App\Models\VFEXOutstandingShare;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class VFEXOutstandingSharesImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {

        $company = VFEX::where('symbol', trim($row[2]))->first()->id;

//        dd($company);

        return new VFEXOutstandingShare([
            'v_f_e_x_e_s_id'  => $company,
            'outstanding_shares'     => trim($row[1]) == "" ? null : trim($row[1]),
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
