<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\Language;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languageList = Language::get();
        //print_r($languageList);exit;
        return view('admin.language.index',compact('languageList'));
    }

    public function create()
    {
        //$allRegions = Helper::regionList();
        return view('admin.language.create');
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

        $languageData = Language::firstOrCreate($data);

        session()->flash('message', 'New Language Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('language');
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
        $language = Language::find($id);
        //print_r($country);exit;
        //$allRegions = Helper::regionList();
        return view('admin.language.edit', compact('language'));
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

            $languageData = Language::where('id',$id)->update($data);

            session()->flash('message', 'Language Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('language');
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
        $language = Language::findOrFail($id);

        $language->delete();
        session()->flash('message', 'Language Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('language');
    }


}
