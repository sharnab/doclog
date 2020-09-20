<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use Helper;
use App\Model\Upazila;

class UpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $upazilaList = Upazila::get();
        //$skillList = Skill::paginate(config('common.pagination.per_page'));
        // $userList = User::with('userGroup')->get();
        //print_r(json_encode($religionList));
        return view('admin.address.upazila.index',compact('upazilaList'));
    }

    public function create()
    {
        //$allRegions = Helper::regionList();
        $districtList = Upazila::getdistrictList();
        //print_r($districtList);exit;
        return view('admin.address.upazila.create',compact('districtList'));
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
        $titleEn            = strtoupper($request->input('title_en'));
        $getUpazilaId1      = Upazila::getUpazilaId($titleEn);
        $getUpazilaId       = json_decode(json_encode($getUpazilaId1), true);
        if(!empty($getUpazilaId) || $getUpazilaId!=null || $getUpazilaId!=''){
            session()->flash('message', 'This Upazila Already Exists!');
            session()->flash('class', '2');
            return redirect()->route('upazila_create');
        } else {
            $data = array(
                "title"                 => $request->input('title'),
                "title_en"              => $titleEn,
                "district_id"           => $request->input('district_id'),
                //"display_sequence"      => $displaySequence,
                "active_status"         => $request->input('active_status'),
                //"created_by"            => Auth::id()
            );
            //print_r($data);exit();
            //$priority = Country::orderBy('id', 'desc')->first()->view_priority;
            //$data["view_priority"] = $priority + 1;
    
            $upazilaData = Upazila::firstOrCreate($data);
    
            session()->flash('message', 'New Upazila Created Successfully !');
            session()->flash('class', '1');
            return redirect()->route('upazila');
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
        $upazila = Upazila::find($id);
        $districtList = Upazila::getdistrictList();
        //$allRegions = Helper::regionList();
        return view('admin.address.upazila.edit', compact('upazila','districtList'));
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
        $titleEn            = strtoupper($request->input('title_en'));
        // $getUpazilaId1    = Upazila::getUpazilaId($titleEn);
        // $getUpazilaId      = json_decode(json_encode($getUpazilaId1), true);
        // if(!empty($getUpazilaId) || $getUpazilaId!=null || $getUpazilaId!=''){
        //     session()->flash('message', 'This Upazila Already Exists!');
        //     session()->flash('class', '2');
        //     return redirect()->route('upazila_edit',$id);
        // }else{
            $data = array(
                "title"                 => $request->input('title'),
                "title_en"              => $titleEn,
                "district_id"           => $request->input('district_id'),
                //"display_sequence"      => $displaySequence,
                "active_status"         => $request->input('active_status'),
                //"created_by"            => Auth::id()
            );
            #return DB::table('files')->latest('id')->first();
            // if($logo_img_path){
            //     $data["logo"]       = $logo_img_path;
            // }

            $upazilaData = Upazila::where('id',$id)->update($data);

            session()->flash('message', 'Upazila Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('upazila');
    // }
       // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upazila = Upazila::findOrFail($id);

        $upazila->delete();
        session()->flash('message', 'Upazila Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('upazila');
    }

}