<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\Education;


class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationList = Education::get();
        //print_r($languageList);exit;
        return view('admin.education.index',compact('educationList'));
    }

    public function create()
    {
        //$allRegions = Helper::regionList();
        return view('admin.education.create');
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
            "institute_name"         => "required",
            //"institute_name_bn"               => "required",
            "active_status"          => "required",
        ]);

        //$code = strtoupper($request->input('code'));
        $getInsId1     = \App\Model\Education::getInsId($request->input('institute_name'));
        $getInsId      = json_decode(json_encode($getInsId1), true);
        if(!empty($getInsId) || $getInsId!=null || $getInsId!=''){
            session()->flash('message', 'This Institute Already Exists!');
            session()->flash('class', '2');
            return redirect()->route('education_create');
        }else{
            $data = array(
                "institute_name"        => $request->input('institute_name'),
                //"institute_name_bn"     => $request->input('institute_name_bn'),
                //"remarks"               => $remarks,
                "active_status"         => $request->input('active_status'),
                "created_by"            => Auth::id()
            );
            //print_r($data);exit();
            //$priority = Country::orderBy('id', 'desc')->first()->view_priority;
            //$data["view_priority"] = $priority + 1;

            $educationData = Education::firstOrCreate($data);

            session()->flash('message', 'New Institute Created Successfully !');
            session()->flash('class', '1');
            return redirect()->route('education');
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
        $education = Education::find($id);
        //print_r($country);exit;
        //$allRegions = Helper::regionList();
        return view('admin.education.edit', compact('education'));
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
            "institute_name"         => "required",
            //"institute_name_bn"               => "required",
            "active_status"          => "required",
        ]);

        // $getInsId1     = \App\Model\Education::getInsId($request->input('institute_name'));
        // $getInsId      = json_decode(json_encode($getInsId1), true);
        // if(!empty($getInsId) || $getInsId!=null || $getInsId!=''){
        //     session()->flash('message', 'This Institute Already Exists!');
        //     session()->flash('class', '2');
        //     return redirect()->route('education_edit',$id);
        // }else{
            $data = array(
                "institute_name"        => $request->input('institute_name'),
                //"institute_name_bn"     => $request->input('institute_name_bn'),
                //"remarks"               => $remarks,
                "active_status"         => $request->input('active_status'),
                "created_by"            => Auth::id()
            );
            #return DB::table('files')->latest('id')->first();
            // if($logo_img_path){
            //     $data["logo"]       = $logo_img_path;
            // }

            $educationData = Education::where('id',$id)->update($data);

            session()->flash('message', 'Institute Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('education');
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
        $education = Education::findOrFail($id);

        $education->delete();
        session()->flash('message', 'Institute Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('education');
    }


}
