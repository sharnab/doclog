<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Http\Requests\SectorRequest;
// use App\Http\Requests\SectorEditRequest;

use App\Model\Sector;
use App\Model\Country;
// use App\Model\Role\SysUserGroup;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectorList = Sector::get();
        // print_r('<br/>'.$sectorList);die();
        return view('admin.sector.index',compact('sectorList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCountries = $this->getCountry();
        return view('admin.sector.create', compact('allCountries'));
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
            "name"                  => "required",
            "departure_airport"     => "required",
            "departure_country_id"  => "required",
            "arrival_airport"       => "required",
            "arrival_country_id"    => "required",
            "type"                  => "required",
            "active_status"         => "required",
        ]);

        $data = array(
            "name"                  => $request->input('name'),
            "type"                  => $request->input('type'),
            "departure_airport"     => $request->input('departure_airport'),
            "departure_country_id"  => $request->input('departure_country_id'),
            "arrival_airport"       => $request->input('arrival_airport'),
            "arrival_country_id"    => $request->input('arrival_country_id'),
            "active_status"         => $request->input('active_status'),
            "created_by"            => Auth::id()
        );
// dd($data);exit();
        $sectorData = Sector::firstOrCreate($data);

        session()->flash('message', 'New Sector Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('sector');
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
        $sector = Sector::find($id);
        $allCountries = $this->getCountry();
        return view('admin.sector.edit',compact('sector', 'allCountries'));
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
            "name"                  => "required",
            "departure_airport"     => "required",
            "departure_country_id"  => "required",
            "arrival_airport"       => "required",
            "arrival_country_id"    => "required",
            "type"                  => "required",
            "active_status"         => "required",
        ]);

        $data = array(
            "name"                  => $request->input('name'),
            "type"                  => $request->input('type'),
            "departure_airport"     => $request->input('departure_airport'),
            "departure_country_id"  => $request->input('departure_country_id'),
            "arrival_airport"       => $request->input('arrival_airport'),
            "arrival_country_id"    => $request->input('arrival_country_id'),
            "active_status"         => $request->input('active_status'),
            "updated_by"            => Auth::id()
        );

        $SectorData = Sector::where('id',$id)->update($data);

        session()->flash('message', 'Sector Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('sector');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getCountry()
    {
        $allCountries = Country::all();
        $allCountriesData = array();
        foreach ($allCountries as $country)
        {
            $allCountriesData[$country->id]=$country->name ;
        }

        return $allCountriesData;
    }

}
