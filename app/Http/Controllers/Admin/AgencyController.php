<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\Agency;

use Helper; // Important

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencyList = Agency::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.agency.index',compact('agencyList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agency.create', compact('allCustomers', 'allNations', 'allSalesExecutives'));
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
            "agency_name" => "required",
            "licence_no" => "required",
            "address" => "required",
            "agent_name" => "required",
            "land_phone" => "required",
            "mobile" => "required",
            "email" => "required",
            "renewed_upto_date" => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "agency_name"       => $request->input('agency_name'),
            "licence_no"        => $request->input('licence_no'),
            "address"           => $request->input('address'),
            "agent_name"        => $request->input('agent_name'),
            "agent_position"    => $request->input('agent_position'),
            "agent_address"     => $request->input('agent_address'),
            "land_phone"        => $request->input('land_phone'),
            "mobile"            => $request->input('mobile'),
            "email"             => $request->input('email'),
            "renewed_upto_date" => $request->input('renewed_upto_date'),
            // "lat"               => $request->input('lat'),
            // "lon"               => $request->input('lon'),
            "active_status"     => $request->input('active_status'),
            "created_by"        => Auth::id(),
        );

        $agencyData = Agency::firstOrCreate($data);

        session()->flash('message', 'New Agency Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('agency');
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
        $agency = Agency::find($id);

        return view('admin.agency.edit', compact('agency'));
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
        // $country = Country::find($id);

        $validatedData = $request->validate([
            "agency_name" => "required",
            "licence_no" => "required",
            "address" => "required",
            "agent_name" => "required",
            "land_phone" => "required",
            "mobile" => "required",
            "email" => "required",
            "renewed_upto_date" => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "agency_name"       => $request->input('agency_name'),
            "licence_no"        => $request->input('licence_no'),
            "address"           => $request->input('address'),
            "agent_name"        => $request->input('agent_name'),
            "agent_position"    => $request->input('agent_position'),
            "agent_address"     => $request->input('agent_address'),
            "land_phone"        => $request->input('land_phone'),
            "mobile"            => $request->input('mobile'),
            "email"             => $request->input('email'),
            "renewed_upto_date" => $request->input('renewed_upto_date'),
            // "lat"               => $request->input('lat'),
            // "lon"               => $request->input('lon'),
            "active_status"     => $request->input('active_status'),
            "updated_by"        => Auth::id()
        );
        $agencyData = Agency::where('id',$id)->update($data);

        session()->flash('message', 'Agency Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('agency');
    
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agency = Agency::findOrFail($id);

        $agency->delete();
        session()->flash('message', 'Agency Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('agency');
    }


}
