<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\Company;
use App\Model\Customer;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyList = Company::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.company.index',compact('companyList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name"              => "required",
            "address"           => "required",
            "active_status"     => "required",
        ]);

        $data = array(
            "name"              => $request->input("name"),
            "short_name"        => $request->input("short_name"),
            "address"           => $request->input("address"),
            "active_status"     => $request->input("active_status"),
            "created_by"        => Auth::id()
        );

        $companyData = Company::firstOrCreate($data);

        session()->flash('message', 'New Company Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $company->from_date = date('d-m-Y', strtotime($company->from_date));
        $company->to_date = date('d-m-Y', strtotime($company->to_date));
        $allCustomers = $this->getCustomer();

        return view('admin.company.edit', compact('company', 'allSalesExecutives', 'allAirlines', 'allSectors', 'allPassengers', 'allAgencies', 'allUser', 'allCustomers', 'allNations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            "name"              => "required",
            "address"           => "required",
            "active_status"     => "required",
        ]);

        $data = array(
            "name"              => $request->input("name"),
            "short_name"        => $request->input("short_name"),
            "address"           => $request->input("address"),
            "active_status"     => $request->input("active_status"),
            "updated_by"        => Auth::id()
        );

        $CompanyData = Company::where('id',$id)->update($data);

        session()->flash('message', 'Company Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('company');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
