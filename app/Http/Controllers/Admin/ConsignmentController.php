<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\Consignment;

use Helper; // Important

class ConsignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ConsignmentList = Consignment::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.customer_consignment.index',compact('ConsignmentList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer_consignment.create');
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
            "contact_name"            => "required",
            "total_bag"               => "required",
            "seal_number"             => "required",
            "courier_receipt_remarks" => "required",
            "courier_receipt_date"    => "required",
            "courier_receipt_time"    => "required",
            "bank_date"               => "required",
            "bank_time"               => "required",
            "bank_remarks"            => "required",
            "active_status"           => "required",
        ]);

        $data = array(
            'contact_name'            => $request->input('contact_name'),
            'total_bag'               => $request->input('total_bag'),
            'seal_number'             => $request->input('seal_number'),
            'courier_receipt_remarks' => $request->input('courier_receipt_remarks'),
            'courier_receipt_date'    => $request->input('courier_receipt_date'),
            'courier_receipt_time'    => $request->input('courier_receipt_time'),
            'bank_date'               => $request->input('bank_date'),
            'bank_time'               => $request->input('bank_time'),
            'bank_remarks'            => $request->input('bank_remarks'),
            'active_status'           => $request->input('active_status'),
            "created_by"              => Auth::id()
        );

        $ConsignmentData = Consignment::firstOrCreate($data);

        session()->flash('message', 'New Consignment Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('Consignment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.IATA.bank_form');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Consignment = Consignment::find($id);

        return view('admin.customer_consignment.edit', compact('Consignment'));
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
        // $Consignment = Consignment::find($id);

        $validatedData = $request->validate([
            "contact_name"            => "required",
            "total_bag"               => "required",
            "seal_number"             => "required",
            "courier_receipt_remarks" => "required",
            "courier_receipt_date"    => "required",
            "courier_receipt_time"    => "required",
            "bank_date"               => "required",
            "bank_time"               => "required",
            "bank_remarks"            => "required",
            "active_status"           => "required",
        ]);



        $data = array(
            'contact_name'            => $request->input('contact_name'),
            'total_bag'               => $request->input('total_bag'),
            'seal_number'             => $request->input('seal_number'),
            'courier_receipt_remarks' => $request->input('courier_receipt_remarks'),
            'courier_receipt_date'    => $request->input('courier_receipt_date'),
            'courier_receipt_time'    => $request->input('courier_receipt_time'),
            'bank_date'               => $request->input('bank_date'),
            'bank_time'               => $request->input('bank_time'),
            'bank_remarks'            => $request->input('bank_remarks'),
            'active_status'           => $request->input('active_status'),
            "updated_by"              => Auth::id()
        );

        $ConsignmentData = Consignment::where('id',$id)->update($data);

        session()->flash('message', 'Customer Consignment Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('Consignment');
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
