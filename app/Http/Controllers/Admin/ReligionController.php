<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\Religion;


class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $religionList = Religion::get();
        // $userList = User::with('userGroup')->get();
        //print_r(json_encode($religionList));
        return view('admin.religion.index',compact('religionList'));
    }

    public function create()
    {
        //$allRegions = Helper::regionList();
        return view('admin.religion.create');
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
        
        //$code = strtoupper($request->input('code'));
        $data = array(
            "title"                 => $request->input('title'),
            "title_bn"              => $request->input('title_bn'),
            //"remarks"               => $remarks,
            "display_sequence"      => $displaySequence,
            //"parent_id"             => 0,
            //"is_default"    => $request->input('is_default'),
            "active_status"         => $request->input('active_status'),
            "created_by"            => Auth::id()
        );
        //print_r($data);exit();
        //$priority = Country::orderBy('id', 'desc')->first()->view_priority;
        //$data["view_priority"] = $priority + 1;

        $religionData = Religion::firstOrCreate($data);

        session()->flash('message', 'New Religion Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('religion');
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
        $religion = Religion::find($id);
        //print_r($country);exit;
        //$allRegions = Helper::regionList();
        return view('admin.religion.edit', compact('religion'));
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
            
            $data = array(
                "title"                 => $request->input('title'),
                "title_bn"              => $request->input('title_bn'),
                //"remarks"               => $remarks,
                "display_sequence"      => $displaySequence,
                //"parent_id"             => 0,
                //"is_default"    => $request->input('is_default'),
                "active_status"         => $request->input('active_status'),
                "created_by"            => Auth::id()
            );
            #return DB::table('files')->latest('id')->first();
            // if($logo_img_path){
            //     $data["logo"]       = $logo_img_path;
            // }

            $religionData = Religion::where('id',$id)->update($data);

            session()->flash('message', 'Religion Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('religion');
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
        $religion = Religion::findOrFail($id);

        $religion->delete();
        session()->flash('message', 'Religion Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('religion');
    }


}
