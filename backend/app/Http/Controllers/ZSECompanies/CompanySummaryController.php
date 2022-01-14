<?php

namespace App\Http\Controllers\ZSECompanies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\PriceSheet;
use Illuminate\Http\Request;

class CompanySummaryController extends Controller
{
    public function update(Request $request, $id){
        $request->validate(
          [
              'summary' => 'required',
          ]
        );
        $company = Company::find($id);
        $company->update($request->all());

//        dd($company);
        return back()
            ->with('summary','Company Summary Updated Successfully');
    }
}
