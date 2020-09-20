<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use Helper;
use App\Model\Union;

class UnionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $unionList = Union::get();
        //$skillList = Skill::paginate(config('common.pagination.per_page'));
        // $userList = User::with('userGroup')->get();
        //print_r(json_encode($religionList));
        return view('admin.address.union.index',compact('unionList'));
    }

    public function create()
    {
        //$allRegions = Helper::regionList();
        $districtList = Union::getdistrictList();
        $upazilaList    = Union::getUpazilaList();
        //print_r($districtList);exit;
        return view('admin.address.union.create',compact('districtList','upazilaList'));
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
        $titleEn            = strtoupper($request->input('title_en'));
        $getUnionId1      = Union::getUnionId($titleEn);
        $getUnionId       = json_decode(json_encode($getUnionId1), true);
        if(!empty($getUnionId) || $getUnionId!=null || $getUnionId!=''){
            session()->flash('message', 'This union Already Exists!');
            session()->flash('class', '2');
            return redirect()->route('union_create');
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
    
            $unionData = Union::firstOrCreate($data);
    
            session()->flash('message', 'New Union Created Successfully !');
            session()->flash('class', '1');
            return redirect()->route('union');
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
        $union = Union::find($id);
        $districtList   = Union::getdistrictList();
        $upazilaList    = Union::getUpazilaList();
        //$allRegions = Helper::regionList();
        return view('admin.address.union.edit', compact('union','districtList','upazilaList'));
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
        // $getUnionId1      = Union::getunionId($titleEn);
        // $getUnionId       = json_decode(json_encode($getUnionId1), true);
        // if(!empty($getUnionId) || $getUnionId!=null || $getUnionId!=''){
        //     session()->flash('message', 'This union Already Exists!');
        //     session()->flash('class', '2');
        //     return redirect()->route('union_edit',$id);
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

            $unionData = Union::where('id',$id)->update($data);

            session()->flash('message', 'Union Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('union');
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
        $union = Union::findOrFail($id);

        $union->delete();
        session()->flash('message', 'Union Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('union');
    }

}