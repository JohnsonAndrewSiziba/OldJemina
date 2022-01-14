<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\AllPrices;
use App\Models\Company;
use App\Models\PriceSheet;
use App\Models\Report;
use App\Models\ZSEIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetReportTextController extends Controller
{
    public function getReportText($id){

//        dd($id);
        $report = Report::with('companies_in_report.company')->with('report_type')->get()->find($id);

        $start_date = $report->from_date;
        $end_date = $report->to_date;


        $indices_start = ZSEIndex::where('date', $start_date)
            ->where('id', $id)
            ->get();

        $indices = array();

        if(!$indices_start->isEmpty()){

            $indices_end = ZSEIndex::where('date', $end_date)
                ->where('id', $id)
                ->get();

            $allShareOpen = $indices_start->all_share_open;
            $allShareClose = $indices_end->all_share_close;
            $allShareChange = (($allShareClose - $allShareOpen) / $allShareOpen) * 100;;

            $top10Open = $indices_start->top_ten_open;
            $top10Close = $indices_end->top_ten_close;
            $top10Change = (($top10Close - $top10Open) / $top10Open) * 100;;

            $top15Open = $indices_start->top_15_open;
            $top15Close = $indices_end->top_15_close;
            $top15Change = (($top15Close - $top15Open) / $top15Open) * 100;;

            $mediumCapOpen = $indices_start->medium_cap_open;
            $mediumCapClose = $indices_end->medium_cap_close;
            $mediumCapChange = (($mediumCapClose - $mediumCapOpen) / $mediumCapOpen) * 100;;

            $smallCapOpen = $indices_start->small_cap_open;
            $smallCapClose = $indices_end->small_cap_close;
            $smallCapChange = (($smallCapClose - $smallCapOpen) / $smallCapOpen) * 100;


            $indices = [
                "all_share_open" => $allShareOpen,
                "all_share_close" => $allShareClose,
                "all_share_change" => $allShareChange,

                "top_ten_open" => $top10Open,
                "top_ten_close" => $top10Close,
                "top_ten_change" => $top10Change,

                "top_15_open" => $top15Open,
                "top_15_close" => $top15Close,
                "top_15_change" => $top15Change,

                "medium_cap_open" => $mediumCapOpen,
                "medium_cap_close" => $mediumCapClose,
                "medium_cap_change" => $mediumCapChange,

                "small_cap_open" => $smallCapOpen,
                "small_cap_close" => $smallCapClose,
                "small_cap_change" => $smallCapChange,
            ];
        }


        $volumesQuery = DB::select('call get_trade_volumes2(?, ?)', [$start_date,$end_date]);
        $volumesArray = collect($volumesQuery);

        $valuesQuery = DB::select('call get_trade_values2(?, ?)', [$start_date,$end_date]);
        $valuesArray = collect($valuesQuery);


        $allCompaniesVolume = AllPrices::where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->sum('volume');

        $allCompaniesValue = AllPrices::where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->sum('value');



        $volumesTotal = 0;
        foreach ($volumesArray as $m){
            $n = Company::find($m->company_id);
            $m->company_id = $n;
            $volumesTotal += $m->traded_volume;
        }

        $valuesTotal = 0;
        foreach ($valuesArray as $m){
            $n = Company::find($m->company_id);
            $m->company_id = $n;
            $valuesTotal += $m->traded_value;
        }


//        _____________________________ GAINERS _____________________________

        $companies = Company::where('status', 1)->get();

//        if($start_date == $end_date){
//
//        }

        $startPeriodPrices = AllPrices::where('date', $start_date)
            ->orderBy('company_id')
            ->get();

        $endPeriodPrices = AllPrices::where('date', $end_date)
            ->orderBy('company_id')
            ->get();

//        $fromDateCount = $this->collectionSize($startPeriodPrices);
//        $toDateCount = $this->collectionSize($endPeriodPrices);

        $percentageChanges = array();

        $index = 0;
        foreach ($startPeriodPrices as $startP){
            if($start_date == $end_date){
                $t1 = $startP->open;
            } else {
                $t1 = $startP->close;
            }

            try {
                $t2 = $endPeriodPrices[$index]->close;
                $index += 1;

                $p_change = (($t2/$t1) - 1)*100;
                $percentageChanges[] = $p_change;
            }
            catch (\Exception $e){
                $percentageChanges[] = "-";
            }

        }

        $sortedArray = $percentageChanges;
        rsort($sortedArray);
        $topFiveGainers = array_slice($sortedArray, 0, 5);
        sort($sortedArray);
        $topFiveShakers = array_slice($sortedArray, 0, 5);


        $gainerCompaniesArray = array();
        foreach ($topFiveGainers as $g){
            $a = array_search($g, $percentageChanges);
            $b = Company::select('name','symbol', 'id')->where('id', $startPeriodPrices[$a]->company_id)->get();
            $b->change = $g;
            $gainerCompaniesArray[] = $b;
        }

        $shakerCompaniesArray = array();
        foreach ($topFiveShakers as $g){
            $a = array_search($g, $percentageChanges);
            $b = Company::select('name','symbol', 'id')->where('id', $startPeriodPrices[$a]->company_id)->get();
            $b->change = $g;
            $shakerCompaniesArray[] = $b;
        }
//        dd($gainerCompaniesArray);
//        $gainer_1_index = array_search($topFiveGainers[0], $percentageChanges);
//        $gainer_1 = Company::find($startPeriodPrices[$gainer_1_index]->company_id);
//        $gainer_1 = Company::select('name','symbol', 'id')->where('id', $startPeriodPrices[$gainer_1_index]->company_id)->get();
//        $gainer_1->change = $topFiveGainers[0];
//        dd($gainer_1);


        $data = [
            "report" => $report,
            "indices" => $indices,
            "top_traders" => [
                "values_array" => $valuesArray,
                "volumes_array" => $volumesArray,
                "values_total" => $valuesTotal, // for the top 5
                "volumes_total" => $volumesTotal, //for the top 5
                "all_companies_volume" => $allCompaniesVolume, // for all the companies
                "all_companies_value" => $allCompaniesValue, // for all the companies
            ],
            "gainers" => $gainerCompaniesArray,
            "shakers" => $shakerCompaniesArray,
            "gainers_values" => $topFiveGainers,
            "shakers_values" => $topFiveShakers,
        ];

        return $data;

    }

}
