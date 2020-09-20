<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Model\SmsContent;


class SmsContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smsContentList = SmsContent::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.smscontent.index',compact('smsContentList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.smscontent.create');
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
            "sms_type"       => "required",
            "title"          => "required",
            "content"        => "required",
            // "description"    => "required",
            "active_status"  => "required",
        ]);

        $data = array(
            "sms_type"      => $request->input('sms_type'),
            "title"         => $request->input('title'),
            "content"       => $request->input('content'),
            "description"   => $request->input('description'),
            "remarks"       => $request->input('remarks'),
            "active_status" => $request->input('active_status'),
            "created_by"    => Auth::id()
        );

        $SmsContentData = SmsContent::firstOrCreate($data);

        session()->flash('message', 'New SMS Content Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('sms_content');
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
        $smsContent = SmsContent::find($id);

        return view('admin.smscontent.edit', compact('smsContent'));
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
            "sms_type"       => "required",
            "title"          => "required",
            "content"        => "required",
            // "description"    => "required",
            "active_status"  => "required",
        ]);


        $data = array(
            "sms_type"      => $request->input('sms_type'),
            "title"         => $request->input('title'),
            "content"       => $request->input('content'),
            "description"   => $request->input('description'),
            "remarks"       => $request->input('remarks'),
            "active_status" => $request->input('active_status'),
            "updated_by"    => Auth::id()
        );

        $SmsContentData = SmsContent::where('id',$id)->update($data);

        session()->flash('message', 'SMS Content Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('sms_content');
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
