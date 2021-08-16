<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Hospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalList = Hospital::get();
        return view('admin.hospital.index',compact('hospitalList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allArea = $this->getArea();
        return view('admin.hospital.create',compact('allArea'));
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
            "name_en"          => "required",
            "name_bn"          => "required",
            "area_id"          => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "name_en"          => $request->input('name_en'),
            "name_bn"          => $request->input('name_bn'),
            "area_id"          => $request->input('area_id'),
            "active_status" => $request->input('active_status'),
            "created_by"    => Auth::id()
        );

        $hospitalData = Hospital::firstOrCreate($data);

        session()->flash('message', 'New Hospital Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('hospital');
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
        $item = Hospital::find($id);
        $allArea = $this->getArea();
        return view('admin.hospital.edit', compact('item','allArea'));
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
        // $hospital = Hospital::find($id);

        $validatedData = $request->validate([
            "name_en"          => "required",
            "name_bn"          => "required",
            "area_id"          => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "name_en"          => $request->input('name_en'),
            "name_bn"          => $request->input('name_bn'),
            "area_id"          => $request->input('area_id'),
            "active_status" => $request->input('active_status'),
            "updated_by"    => Auth::id()
        );

        $HospitalData = Hospital::where('id',$id)->update($data);

        session()->flash('message', 'Hospital Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('hospital');
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

    private function getArea()
    {
        $allAreaData = Area::all();
        $allArea = array();
        foreach ($allAreaData as $data)
        {
            $allArea[$data->id]=$data->name_en ;
        }

        return $allArea;
    }


}
