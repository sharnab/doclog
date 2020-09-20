<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
//use File;
use App\Model\TrainingCenter;

use Helper; // Important

class TrainingCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ttcList = TrainingCenter::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.training_center.index',compact('ttcList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisionList = \App\Model\TrainingCenter::getDivisionList();
        
        return view('admin.training_center.create',compact('divisionList'));
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
            "division_id" => "required",
            "office_name" => "required",
            "address" => "required",
            "mobile" => "required",
            "email" => "required",
            "active_status" => "required",
        ]);
        
        $data = array(
            "division_id"           => $request->input('division_id'),
            "office_name"           => $request->input('office_name'),
            "address"                => $request->input('address'),
            "area"                  => $request->input('area'),
            "year_of_establishment" => $request->input('year_of_establishment'),
            "year_of_operation"     => $request->input('year_of_operation'),
            "present_principal"     => $request->input('present_principal'),
            "land_phone"            => $request->input('land_phone'),
            "mobile"                => $request->input('mobile'),
            "email"                 => $request->input('email'),
            // "lat"                => $request->input('lat'),
            // "lon"                => $request->input('lon'),
            "active_status"         => $request->input('active_status'),
            "created_by"            => Auth::id(),
        );

        $passportData = TrainingCenter::firstOrCreate($data);

        session()->flash('message', 'New Training Center Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('training_center');
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
        $trainingCenter = TrainingCenter::find($id);
        $divisionList = \App\Model\TrainingCenter::getDivisionList();
        return view('admin.training_center.edit', compact('trainingCenter','divisionList'));
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
            "division_id" => "required",
            "office_name" => "required",
            "address" => "required",
            "mobile" => "required",
            "email" => "required",
            "active_status" => "required",
        ]);
        
        if($request->input('land_phone')!=''||$request->input('land_phone')!=null){
            $land_phone = $request->input('land_phone');
        }else{
            $land_phone = '';
        }
        $data = array(
            "division_id"           => $request->input('division_id'),
            "office_name"           => $request->input('office_name'),
            "address"                => $request->input('address'),
            "area"                  => $request->input('area'),
            "year_of_establishment" => $request->input('year_of_establishment'),
            "year_of_operation"     => $request->input('year_of_operation'),
            "present_principal"     => $request->input('present_principal'),
            "land_phone"            => $land_phone,
            "mobile"                => $request->input('mobile'),
            "email"                 => $request->input('email'),
            // "lat"                => $request->input('lat'),
            // "lon"                => $request->input('lon'),
            "active_status"         => $request->input('active_status'),
            "updated_by"        => Auth::id()
        );
        $ttcData = TrainingCenter::where('id',$id)->update($data);

        session()->flash('message', 'Training Center Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('training_center');
    
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training_center = TrainingCenter::findOrFail($id);

        $training_center->delete();
        session()->flash('message', 'Training Center Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('training_center');
    }


}
