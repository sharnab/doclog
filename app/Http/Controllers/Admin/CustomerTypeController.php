<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Http\Requests\CustomerTypeRequest;
// use App\Http\Requests\CustomerTypeEditRequest;

use App\Model\CustomerType;
// use App\Model\Role\SysUserGroup;

class CustomerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerTypeList = CustomerType::get();
        // print_r('<br/>'.$customerTypeList);die();
        return view('admin.customertype.index',compact('customerTypeList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customertype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            "name"              => $request->input('name'),
            "active_status"     => $request->input('active_status'),
            "created_by"        => Auth::id()
        );

        $customerTypeData = CustomerType::firstOrCreate($data);

        session()->flash('message', 'New Customer Type Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('customertype.index');
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
        $customerType = CustomerType::find($id);
        return view('admin.customertype.edit',compact('customerType'));
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
        $data = array(
            "name"              => $request->input('name'),
            "active_status"     => $request->input('active_status'),
            "updated_by"        => Auth::id()
        );

        $CustomerTypeData = CustomerType::where('id',$id)->update($data);

        session()->flash('message', 'Customer Type Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('customertype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
