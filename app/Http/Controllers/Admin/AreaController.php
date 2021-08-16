<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\Area;

use Helper; // Important

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areaList = Area::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.area.index',compact('areaList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.area.create');
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
            "name_en"          => "required|unique:area",
            "name_bn"          => "required|unique:area",
            "active_status" => "required",
        ]);

        $data = array(
            "name_en"           => $request->input('name_en'),
            "name_bn"           => $request->input('name_bn'),
            "active_status"     => $request->input('active_status'),
            "created_by"        => Auth::id()
        );

        $areaData = Area::firstOrCreate($data);

        session()->flash('message', 'New Area Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('area');
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
        $item = Area::find($id);

        return view('admin.area.edit', compact('item'));
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
        // $area = Area::find($id);

        $validatedData = $request->validate([
            "name_en"          => "required",
            "name_bn"          => "required",
            "active_status" => "required",
        ]);


            $data = array(
                "name_en"           => $request->input('name_en'),
                "name_bn"           => $request->input('name_bn'),
                "active_status"     => $request->input('active_status'),
                "updated_by"        => Auth::id()
            );

            $AreaData = Area::where('id',$id)->update($data);

            session()->flash('message', 'Area Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('area');
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
