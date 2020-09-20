<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use Helper;
use App\Model\CityCorporation;

class CityCorporationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $citycorporationList = CityCorporation::get();
        //$skillList = Skill::paginate(config('common.pagination.per_page'));
        // $userList = User::with('userGroup')->get();
        //print_r(json_encode($religionList));
        return view('admin.address.citycorporation.index',compact('citycorporationList'));
    }

    public function create()
    {
        //$allRegions = Helper::regionList();
        $districtList = CityCorporation::getdistrictList();
        //print_r($districtList);exit;
        return view('admin.address.citycorporation.create',compact('districtList'));
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
            "title"                  => "required",
            "title_en"               => "required",
            "district_id"            => "required|numeric",
            //"display_sequence"       => "numeric",
            "active_status"          => "required",
        ]);

        $getCityCoId1     = CityCorporation::getCityCoId($request->input('title_en'));
        $getCityCoId      = json_decode(json_encode($getCityCoId1), true);
        if(!empty($getCityCoId) || $getCityCoId!=null || $getCityCoId!=''){
            session()->flash('message', 'This City Corporation Already Exists!');
            session()->flash('class', '2');
            return redirect()->route('citycorporation_create');
        } else {
            $data = array(
                "title"                 => $request->input('title'),
                "title_en"              => $request->input('title_en'),
                "district_id"           => $request->input('district_id'),
                //"display_sequence"      => $displaySequence,
                "active_status"         => $request->input('active_status'),
                "created_by"            => Auth::id()
            );
            //print_r($data);exit();
            //$priority = Country::orderBy('id', 'desc')->first()->view_priority;
            //$data["view_priority"] = $priority + 1;
    
            $citycorporationData = CityCorporation::firstOrCreate($data);
    
            session()->flash('message', 'New citycorporation Created Successfully !');
            session()->flash('class', '1');
            return redirect()->route('citycorporation');
        }
         
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
        $citycorporation = CityCorporation::find($id);
        $districtList = CityCorporation::getdistrictList();
        //$allRegions = Helper::regionList();
        return view('admin.address.citycorporation.edit', compact('citycorporation','districtList'));
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
            "title"                  => "required",
            "title_en"               => "required",
            "district_id"            => "required|numeric",
            //"display_sequence"       => "numeric",
            "active_status"          => "required",
        ]);

        // $getCityCoId1     = CityCorporation::getCityCoId($request->input('title_en'));
        // $getCityCoId      = json_decode(json_encode($getCityCoId1), true);
        // if(!empty($getCityCoId) || $getCityCoId!=null || $getCityCoId!=''){
        //     session()->flash('message', 'This City Corporation Already Exists!');
        //     session()->flash('class', '2');
        //     return redirect()->route('citycorporation_edit',$id);
        // }else{
            $data = array(
                "title"                 => $request->input('title'),
                "title_en"              => $request->input('title_en'),
                "district_id"           => $request->input('district_id'),
                //"display_sequence"      => $displaySequence,
                "active_status"         => $request->input('active_status'),
                "created_by"            => Auth::id()
            );
            #return DB::table('files')->latest('id')->first();
            // if($logo_img_path){
            //     $data["logo"]       = $logo_img_path;
            // }

            $citycorporationData = CityCorporation::where('id',$id)->update($data);

            session()->flash('message', 'citycorporation Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('citycorporation');
    // }
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $citycorporation = CityCorporation::findOrFail($id);

        $citycorporation->delete();
        session()->flash('message', 'citycorporation Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('citycorporation');
    }

}