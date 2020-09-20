<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Model\SmsGateway;

class SmsGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smsGatewayList = SmsGateway::get();

        return view('admin.smsgateway.index',compact('smsGatewayList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.smsgateway.create');
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
            "name"          => "required",
            "url"           => "required",
            "username"      => "required",
            "password_text" => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "name"          => $request->input('name'),
            "url"           => $request->input('url'),
            "username"      => $request->input('username'),
            "password_text" => $request->input('password_text'),
            "active_status" => $request->input('active_status'),
            "created_by"    => Auth::id()
        );

        $SmsGatewayData = SmsGateway::firstOrCreate($data);

        session()->flash('message', 'New SmsGateway Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('sms_gateway');
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
        $smsGateway = SmsGateway::find($id);

        return view('admin.smsgateway.edit', compact('smsGateway'));
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
        $validatedData = $request->validate([
            "name"          => "required",
            "url"           => "required",
            "username"      => "required",
            "password_text" => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "name"          => $request->input('name'),
            "url"           => $request->input('url'),
            "username"      => $request->input('username'),
            "password_text" => $request->input('password_text'),
            "active_status" => $request->input('active_status'),
            "updated_by"    => Auth::id()
        );

        $SmsGatewayData = SmsGateway::where('id',$id)->update($data);

        session()->flash('message', 'SMS Gateway Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('sms_gateway');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
