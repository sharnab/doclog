<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\SalesExecutive;

class SalesExecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesexecutiveList = SalesExecutive::get();
        return view('admin.salesexecutive.index',compact('salesexecutiveList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salesexecutive.create');
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
            "email"         => "required|unique:sales_executives",
            "mobile"        => "required|unique:sales_executives|max:15|min:7",
            "active_status" => "required",
        ]);

        $salesexecutive_img_path = '';
        $path = public_path('uploads/salesexecutive');
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        $image_name = time().'.'.$request->image->getClientOriginalExtension();

        if($image_name){
            request()->image->move($path, $image_name);
            $salesexecutive_img_path = "uploads/salesexecutive/" . $image_name;
        }

        $data = array(
            "name"           => $request->input('name'),
            "email"          => $request->input('email'),
            "mobile"         => $request->input('mobile'),
            "address"        => $request->input('address'),
            "image"          => $salesexecutive_img_path,
            "active_status"  => $request->input('active_status'),
            "created_by"     => Auth::id()
        );

        $salesExecutiveData = SalesExecutive::firstOrCreate($data);

        session()->flash('message', 'New Sales Executive Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('salesexecutive');
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
        // $customer = Customer::find($id);
        $salesexecutive = SalesExecutive::find($id);
        return view('admin.salesexecutive.edit', compact('salesexecutive'));
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
            "email"         => "required|unique:sales_executives,email,$id",
            "mobile"        => "required|max:15|min:7|unique:sales_executives,mobile,$id",
            "active_status" => "required",
        ]);

        if(Input::get('delete')){
            $del = SalesExecutive::find($id);
            File::delete($del->image);
            $data = array("image" => '',);
            $SalesExecutiveData = SalesExecutive::where('id',$id)->update($data);

            session()->flash('message', 'Sales Exective\'s image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('salesexecutive_edit', $id);
        }
        else {
            $salesexecutive_img_path = '';
            $path = public_path('uploads/salesexecutive');
            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $image_name = time().'.'.$request->image->getClientOriginalExtension();

            if($image_name){
                request()->image->move($path, $image_name);
                $salesexecutive_img_path = "uploads/salesexecutive/" . $image_name;
            }

            $data = array(
                "name"           => $request->input('name'),
                "email"          => $request->input('email'),
                "mobile"         => $request->input('mobile'),
                "address"        => $request->input('address'),
                "active_status"  => $request->input('active_status'),
                "updated_by"     => Auth::id()
            );

            if($salesexecutive_img_path){
                $data["image"] = $salesexecutive_img_path;
            }

            $SalesExecutiveData = SalesExecutive::where('id',$id)->update($data);

            session()->flash('message', 'Sales Executive Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('salesexecutive');
        }
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
