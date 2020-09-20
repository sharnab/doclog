<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use Helper;
use App\Model\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $divisionList = Division::get();
        //$skillList = Skill::paginate(config('common.pagination.per_page'));
        // $userList = User::with('userGroup')->get();
        //print_r(json_encode($religionList));
        return view('admin.address.division.index',compact('divisionList'));
    }

    public function create()
    {
        //$allRegions = Helper::regionList();
        return view('admin.address.division.create');
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
            //"display_sequence"       => "numeric",
            "active_status"          => "required",
        ]);

        // $logo_img_path = '';
        // $path = public_path('uploads/logos/country');
        // if(!File::exists($path)) {
        //     File::makeDirectory($path, $mode = 0777, true, true);
        // }
        //
        // $request->validate([
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        // ]);
        // $image_name = time().'.'.$request->image->getClientOriginalExtension();
        //
        // if($image_name){
        //     request()->image->move($path, $image_name);
        //     $logo_img_path = "uploads/logos/country/" . $image_name;
        // }
        // if($request->input('display_sequence')!=''||$request->input('display_sequence')!=null){
        //     $displaySequence = $request->input('display_sequence');
        // }else{
        //     $displaySequence = 0;
        // }
         $data = array(
            "title"                 => $request->input('title'),
            "title_en"              => $request->input('title_en'),
            //"display_sequence"      => $displaySequence,
            "active_status"         => $request->input('active_status'),
            "created_by"            => Auth::id()
        );
        //print_r($data);exit();
        //$priority = Country::orderBy('id', 'desc')->first()->view_priority;
        //$data["view_priority"] = $priority + 1;

        $divisionData = Division::firstOrCreate($data);

        session()->flash('message', 'New Division Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('division');
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
        $division = Division::find($id);
        //print_r($country);exit;
        //$allRegions = Helper::regionList();
        return view('admin.address.division.edit', compact('division'));
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
            //"display_sequence"       => "numeric",
            "active_status"          => "required",
        ]);

        
            
            $data = array(
                "title"                 => $request->input('title'),
                "title_en"              => $request->input('title_en'),
                //"display_sequence"      => $displaySequence,
                "active_status"         => $request->input('active_status'),
                "created_by"            => Auth::id()
            );
            #return DB::table('files')->latest('id')->first();
            // if($logo_img_path){
            //     $data["logo"]       = $logo_img_path;
            // }

            $divisionData = Division::where('id',$id)->update($data);

            session()->flash('message', 'Division Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('division');
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
        $division = Division::findOrFail($id);

        $division->delete();
        session()->flash('message', 'Division Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('division');
    }

}