<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use App\Model\VisaProcessing;
use App\Model\Passenger;
use App\Model\Agency;

class VisaProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visaProcessingList = VisaProcessing::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.visaprocessing.index',compact('visaProcessingList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allPassengers = $this->getPassenger();
        $allAgencies = $this->getAgencies();
        return view('admin.visaprocessing.create', compact('allPassengers', 'allAgencies'));
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
            "passenger_id"    => "required",
            "issue_date"      => "required",
            "acceptance_date" => "required",
            "return_date"     => "required",
            "agency_id"       => "required",
            "visa_fee"        => "required",
            "processing_fee"  => "required",
            "bank_fee"        => "required",
            "service_charge"  => "required",
            "discount"        => "required",
            "total"           => "required",
        ]);

        $data = array(
            "passenger_id"      => $request->input("passenger_id"),
            "issue_date"        => date('Y-m-d', strtotime($request->input("issue_date"))),
            "acceptance_date"   => date('Y-m-d', strtotime($request->input("acceptance_date"))),
            "return_date"       => date('Y-m-d', strtotime($request->input("return_date"))),
            "agency_id"         => $request->input("agency_id"),
            "visa_fee"          => $request->input("visa_fee"),
            "processing_fee"    => $request->input("processing_fee"),
            "bank_fee"          => $request->input("bank_fee"),
            "service_charge"    => $request->input("service_charge"),
            "discount"          => $request->input("discount"),
            "total"             => $request->input("total"),
            "created_by"        => Auth::id()
        );


        $visaProcessingData = VisaProcessing::firstOrCreate($data);

        session()->flash('message', 'New Visa Processed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('visa_processing');
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
        $visaProcessing = VisaProcessing::find($id);
        $visaProcessing->issue_date = date('d-m-Y', strtotime($visaProcessing->issue_date));
        $visaProcessing->acceptance_date = date('d-m-Y', strtotime($visaProcessing->acceptance_date));
        $visaProcessing->return_date = date('d-m-Y', strtotime($visaProcessing->return_date));
        $allPassengers = $this->getPassenger();
        $allAgencies = $this->getAgencies();

        return view('admin.visaprocessing.edit', compact('visaProcessing', 'allPassengers', 'allAgencies'));
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
            "passenger_id"    => "required",
            "issue_date"      => "required",
            "acceptance_date" => "required",
            "return_date"     => "required",
            "agency_id"       => "required",
            "visa_fee"        => "required",
            "processing_fee"  => "required",
            "bank_fee"        => "required",
            "service_charge"  => "required",
            "discount"        => "required",
            "total"           => "required",
        ]);

        $data = array(
            "passenger_id"      => $request->input("passenger_id"),
            "issue_date"        => date('Y-m-d', strtotime($request->input("issue_date"))),
            "acceptance_date"   => date('Y-m-d', strtotime($request->input("acceptance_date"))),
            "return_date"       => date('Y-m-d', strtotime($request->input("return_date"))),
            "agency_id"         => $request->input("agency_id"),
            "visa_fee"          => $request->input("visa_fee"),
            "processing_fee"    => $request->input("processing_fee"),
            "bank_fee"          => $request->input("bank_fee"),
            "service_charge"    => $request->input("service_charge"),
            "discount"          => $request->input("discount"),
            "total"             => $request->input("total"),
            "updated_by"        => Auth::id()
        );

        $VisaProcessingData = VisaProcessing::where('id',$id)->update($data);

        session()->flash('message', 'Processed Visa Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('visa_processing');

    }


    private function getPassenger()
    {
        $allPassengers = Passenger::all();
        $allPassengersData = array();
        foreach ($allPassengers as $passenger)
        {
            $allPassengersData[$passenger->id]=$passenger->given_name ;
        }

        return $allPassengersData;
    }

    private function getAgencies()
    {
        $AgencyData = Agency::all();
        $allAgencies = array();
        foreach ($AgencyData as $Agency)
        {
            $allAgencies[$Agency->id]=$Agency->name ;
        }

        return $allAgencies;
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
