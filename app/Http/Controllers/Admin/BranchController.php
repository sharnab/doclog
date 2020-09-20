<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Passport_images;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use Validator;
use File;
use App\Model\Branch;
use App\Model\Bank;
use App\Model\User;

use Helper; // Important

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchList = Branch::get();
        // $bankList = User::with('userGroup')->get();
        // print_r(json_encode($bankList));
        return view('admin.branch.index',compact('branchList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $allBanks = $this->getBank();
        return view('admin.branch.create', compact('allBanks'));
    }

    private function getBank()
    {
        $allBanks = Bank::all();
        $allBanksData = array();
        foreach ($allBanks as $bank)
        {
            $allBanksData[$bank->id]=$bank->name ;
        }

        return $allBanksData;
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
            'name'          => 'required',
            'bank_id'       => 'required',
            "address"       => "required",
            "contact_no"    => "required|unique:branch|max:15|min:7",
            "active_status" => "required",
        ]);

        $data = array(
            "name"           => $request->input('name'),
            "address"        => $request->input('address'),
            "bank_id"        => $request->input('bank_id'),
            "routing_no"     => $request->input('routing_no'),
            "contact_no"     => $request->input('contact_no'),
            "active_status"  => $request->input('active_status'),
            "created_by"     => Auth::id()
        );

        $BranchData = Branch::firstOrCreate($data);

        session()->flash('message', 'New Branch Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('branch');
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
        $branch = Branch::find($id);
        $allBanks = $this->getBank();

        return view('admin.branch.edit', compact('branch', 'allBanks'));
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
            'name'          => "required",
            'bank_id'       => "required",
            "address"       => "required",
            "contact_no"    => "required|max:15|min:7|unique:branch,contact_no,$id",
            "active_status" => "required",
        ]);


        $data = array(
            "name"           => $request->input('name'),
            "address"        => $request->input('address'),
            "bank_id"        => $request->input('bank_id'),
            "routing_no"     => $request->input('routing_no'),
            "contact_no"     => $request->input('contact_no'),
            "active_status"  => $request->input('active_status'),
            "updated_by"     => Auth::id()
        );


        $BranchData = Branch::where('id',$id)->update($data);

        session()->flash('message', 'Branch Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('branch');
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
