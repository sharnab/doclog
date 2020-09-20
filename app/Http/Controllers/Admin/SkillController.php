<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use Helper;
use App\Model\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $skillList = Skill::get();
        //$skillList = Skill::paginate(config('common.pagination.per_page'));
        // $userList = User::with('userGroup')->get();
        //print_r(json_encode($religionList));
        return view('admin.skill.index',compact('skillList'));
    }

    public function create()
    {
        //$allRegions = Helper::regionList();
        return view('admin.skill.create');
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
            "title_bn"               => "required",
            "display_sequence"       => "numeric",
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
        if($request->input('display_sequence')!=''||$request->input('display_sequence')!=null){
            $displaySequence = $request->input('display_sequence');
        }else{
            $displaySequence = 0;
        }
        if($request->input('remarks')!=''||$request->input('remarks')!=null){
            $remarks = $request->input('remarks');
        }else{
            $remarks = '';
        }
        //$code = strtoupper($request->input('code'));
        $data = array(
            "title"                 => $request->input('title'),
            "title_bn"              => $request->input('title_bn'),
            "remarks"               => $remarks,
            "display_sequence"      => $displaySequence,
            "parent_id"             => 0,
            //"is_default"    => $request->input('is_default'),
            "active_status"         => $request->input('active_status'),
            "created_by"            => Auth::id()
        );
        //print_r($data);exit();
        //$priority = Country::orderBy('id', 'desc')->first()->view_priority;
        //$data["view_priority"] = $priority + 1;

        $skillData = Skill::firstOrCreate($data);

        session()->flash('message', 'New Skill Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('skill');
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
        $skill = Skill::find($id);
        //print_r($country);exit;
        //$allRegions = Helper::regionList();
        return view('admin.skill.edit', compact('skill'));
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
            "title_bn"               => "required",
            "display_sequence"       => "numeric",
            "active_status"          => "required",
        ]);

        // if(Input::get('delete')){
        //     $del = Country::find($id);
        //     File::delete($del->logo);
        //     $data = array("logo" => '',);
        //     $userData = Country::where('id',$id)->update($data);
        //
        //     session()->flash('message', 'Logo image has been removed Successfully !');
        //     session()->flash('class', '1');
        //     return redirect()->route('country_edit', $id);
        // }
        // else {
            // $logo_img_path = '';
            //
            // if(!empty($request->image)){
            //     $path = public_path('uploads/logos/country');
            //     if(!File::exists($path)) {
            //         File::makeDirectory($path, $mode = 0777, true, true);
            //     }
            //
            //     $request->validate([
            //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            //     ]);
            //     $image_name = time().'.'.$request->image->getClientOriginalExtension();
            //
            //     if($image_name){
            //         request()->image->move($path, $image_name);
            //         $logo_img_path = "uploads/logos/country/" . $image_name;
            //     }
            // }

            // $data = array(
            //     "name"          => $request->input('name'),
            //     "short_name"    => $request->input('short_name'),
            //     "code"          => $request->input('code'),
            //     "region_id"     => $request->input('region_id'),
            //     "is_default"    => $request->input('is_default'),
            //     "active_status" => $request->input('active_status'),
            //     "updated_by"    => Auth::id()
            // );
            if($request->input('display_sequence')!=''||$request->input('display_sequence')!=null){
                $displaySequence = $request->input('display_sequence');
            }else{
                $displaySequence = 0;
            }
            if($request->input('remarks')!=''||$request->input('remarks')!=null){
                $remarks = $request->input('remarks');
            }else{
                $remarks = '';
            }
            $data = array(
                "title"                 => $request->input('title'),
                "title_bn"              => $request->input('title_bn'),
                "remarks"               => $remarks,
                "display_sequence"      => $displaySequence,
                "parent_id"             => 0,
                //"is_default"    => $request->input('is_default'),
                "active_status"         => $request->input('active_status'),
                "created_by"            => Auth::id()
            );
            #return DB::table('files')->latest('id')->first();
            // if($logo_img_path){
            //     $data["logo"]       = $logo_img_path;
            // }

            $skillData = Skill::where('id',$id)->update($data);

            session()->flash('message', 'Skill Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('skill');
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
        $skill = Skill::findOrFail($id);

        $skill->delete();
        session()->flash('message', 'Skill Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('skill');
    }

}