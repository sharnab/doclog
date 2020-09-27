<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\ExpatPassport;

use Helper; // Important

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passportList = ExpatPassport::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.passport.index',compact('passportList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.passport.create');
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
            "passport_name" => "required",
            "address" => "required",
            "phone" => "required",
            "email" => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "passport_name"     => $request->input('passport_name'),
            "address"           => $request->input('address'),
            "phone"             => $request->input('phone'),
            "email"             => $request->input('email'),
            "website"           => $request->input('website'),
            "facebook_link"     => $request->input('facebook_link'),
            // "lat"               => $request->input('lat'),
            // "lon"               => $request->input('lon'),
            "active_status"     => $request->input('active_status'),
            "created_by"        => Auth::id(),
        );

        $passportData = ExpatPassport::firstOrCreate($data);

        session()->flash('message', 'New Passport Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('passport');
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
        $passport = ExpatPassport::find($id);

        return view('admin.passport.edit', compact('passport'));
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
            "passport_name" => "required",
            "address" => "required",
            "phone" => "required",
            "email" => "required",
            "active_status" => "required",
        ]);
        if($request->input('website')!=''||$request->input('website')!=null){
            $wbsite = $request->input('website');
        }else{
            $wbsite = '';
        }
        if($request->input('facebook_link')!=''||$request->input('facebook_link')!=null){
            $facebook = $request->input('facebook_link');
        }else{
            $facebook = '';
        }
        $data = array(
            "passport_name"     => $request->input('passport_name'),
            "address"           => $request->input('address'),
            "phone"             => $request->input('phone'),
            "email"             => $request->input('email'),
            "website"           => $wbsite,
            "facebook_link"     => $facebook,
            // "lat"               => $request->input('lat'),
            // "lon"               => $request->input('lon'),
            "active_status"     => $request->input('active_status'),
            "updated_by"        => Auth::id()
        );
        $passportData = ExpatPassport::where('id',$id)->update($data);

        session()->flash('message', 'Passport Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('passport');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $passport = ExpatPassport::findOrFail($id);

        $passport->delete();
        session()->flash('message', 'Passport Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('passport');
    }


}
