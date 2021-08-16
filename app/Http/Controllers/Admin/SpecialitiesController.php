<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Speciality;

class SpecialitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialitiesList = Speciality::get();
        return view('admin.speciality.index',compact('specialitiesList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.speciality.create');
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
            "active_status" => "required",
        ]);

        $data = array(
            "name_en"          => $request->input('name_en'),
            "name_bn"          => $request->input('name_bn'),
            "active_status" => $request->input('active_status'),
            "created_by"    => Auth::id()
        );

        $specialityData = Speciality::firstOrCreate($data);

        session()->flash('message', 'New Speciality Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('speciality');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Speciality  $assetType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Speciality  $assetType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Speciality::find($id);
        return view('admin.speciality.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $speciality = Speciality::find($id);

        $validatedData = $request->validate([
            "name_en"          => "required",
            "name_bn"          => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "name_en"          => $request->input('name_en'),
            "name_bn"          => $request->input('name_bn'),
            "active_status" => $request->input('active_status'),
            "updated_by"    => Auth::id()
        );

        $SpecialityData = Speciality::where('id',$id)->update($data);

        session()->flash('message', 'Speciality Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('speciality');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Speciality  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
