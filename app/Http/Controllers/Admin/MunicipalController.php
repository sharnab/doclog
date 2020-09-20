<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use Helper;
use App\Model\Municipal;

class MunicipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $municipalList = Municipal::get();
        //$skillList = Skill::paginate(config('common.pagination.per_page'));
        // $userList = User::with('userGroup')->get();
        //print_r(json_encode($religionList));
        return view('admin.address.municipal.index',compact('municipalList'));
    }

    public function create()
    {
        //$allRegions = Helper::regionList();
        $districtList = Municipal::getdistrictList();
        $upazilaList    = Municipal::getUpazilaList();
        //print_r($districtList);exit;
        return view('admin.address.municipal.create',compact('districtList','upazilaList'));
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
            "upazila_id"             => "required|numeric",
            //"display_sequence"       => "numeric",
            "active_status"          => "required",
        ]);
        $titleEn              = strtoupper($request->input('title_en'));
        $getMunicipalId1      = Municipal::getMunicipalId($titleEn);
        $getMunicipalId       = json_decode(json_encode($getMunicipalId1), true);
        if(!empty($getMunicipalId1) || $getMunicipalId1!=null || $getMunicipalId1!=''){
            session()->flash('message', 'This Municipal Already Exists!');
            session()->flash('class', '2');
            return redirect()->route('municipal_create');
        } else {
            $data = array(
                "title"                 => $request->input('title'),
                "title_en"              => $titleEn,
                "district_id"           => $request->input('district_id'),
                "upazila_id"            => $request->input('upazila_id'),
                //"display_sequence"      => $displaySequence,
                "active_status"         => $request->input('active_status'),
                //"created_by"            => Auth::id()
            );
            //print_r($data);exit();
            //$priority = Country::orderBy('id', 'desc')->first()->view_priority;
            //$data["view_priority"] = $priority + 1;
    
            $municipalData = Municipal::firstOrCreate($data);
    
            session()->flash('message', 'New Municipal Created Successfully !');
            session()->flash('class', '1');
            return redirect()->route('municipal');
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
        $municipal = Municipal::find($id);
        $districtList   = Municipal::getdistrictList();
        $upazilaList    = Municipal::getUpazilaList();
        //$allRegions = Helper::regionList();
        return view('admin.address.municipal.edit', compact('municipal','districtList','upazilaList'));
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
            "upazila_id"             => "required|numeric",
            //"display_sequence"       => "numeric",
            "active_status"          => "required",
        ]);
        $titleEn          = strtoupper($request->input('title_en'));
        // $getMunicipalId1      = Municipal::getMunicipalId($titleEn);
        // $getMunicipalId       = json_decode(json_encode($getMunicipalId1), true);
        // if(!empty($getMunicipalId1) || $getMunicipalId1!=null || $getMunicipalId1!=''){
        //     session()->flash('message', 'This Municipal Already Exists!');
        //     session()->flash('class', '2');
        //     return redirect()->route('municipal_edit',$id);
        // }else{
            $data = array(
                "title"                 => $request->input('title'),
                "title_en"              => $titleEn,
                "district_id"           => $request->input('district_id'),
                "upazila_id"            => $request->input('upazila_id'),
                //"display_sequence"      => $displaySequence,
                "active_status"         => $request->input('active_status'),
                //"created_by"            => Auth::id()
            );
            #return DB::table('files')->latest('id')->first();
            // if($logo_img_path){
            //     $data["logo"]       = $logo_img_path;
            // }

            $municipalData = Municipal::where('id',$id)->update($data);

            session()->flash('message', 'Municipal Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('municipal');
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
        $municipal = Municipal::findOrFail($id);

        $municipal->delete();
        session()->flash('message', 'Municipal Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('municipal');
    }

}