<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\TopShareholders;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class TopShareholdersImport implements ToModel, WithEvents
{
    public $sheetNames;
    public $sheetData;

    public function __construct(){
        $this->sheetNames = [];
        $this->sheetData = [];
    }
        public function registerEvents(): array
        {
            return [
                BeforeSheet::class => function(BeforeSheet $event) {
                    $this->sheetNames[] = $event->getSheet()->getTitle();
                }
            ];
        }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $symbol = array_values(array_slice($this->sheetNames, -1))[0];
        $pieces = explode(".", Str::lower(trim($symbol)));
        $s = $pieces[0] . ".zw";
        error_log($s);
        try {
            $company = Company::where('symbol', $s)->first();
            $companyId = $company->id;
        }
        catch (\Exception $exception) {
            return null;
        }

        return new TopShareholders([
            'company_id'  => $companyId,
            'name'    => $row[0],
            'shares'    => $row[1],
        ]);
    }
}
