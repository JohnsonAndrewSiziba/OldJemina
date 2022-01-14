<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyLogo;
use Illuminate\Http\Request;

class CompanyLogoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create($id)
    {
        $company = Company::find($id);
        return view('dashboard.update_logo', [ 'company' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {

            $name = $request->file('image')->getClientOriginalName();

            $path = $request->file('image')->store('company_logo', ['disk' => 'public']);

            $company = Company::with('company_logo')->findOrFail($id);

            $save = new CompanyLogo();
            $save->name = $name;
            $save->file_path = $path;

            if($company->company_logo === null){

                $company->company_logo()->save($save);

            }
            else {
                $company->company_logo()->update(
                    [
                        'name' => $save->name,
                        'file_path' => $save->file_path
                    ]
                );
            }
//
//            return back()
//                ->with('logo','Company Logo Updated Successfully');

            return redirect()->route('companies.show', $id)
                ->with('logo','Company Logo Updated Successfully');

        }
        dd("Failed");
        return back()
            ->with('logo','Upload Failed!');
    }


}
