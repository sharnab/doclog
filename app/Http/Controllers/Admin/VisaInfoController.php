<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Model\VisaInfo;
use App\Model\Country;
use App\Model\Passenger;

use File;

class VisaInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visaInfoList = VisaInfo::get();

        return view('admin.visainfo.index',compact('visaInfoList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allPassengers = $this->getPassengers();
        $allCountries = $this->getCountry();
        return view('admin.visainfo.create', compact('allPassengers', 'allCountries'));
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
            "passenger_id"  => "required",
            "visa_number"   => "required",
            "country_id"    => "required",
            "issue_date"    => "required",
            "expiry_date"   => "required",
            "visa_type"     => "required",
            "active_status" => "required",
            'attachment' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $attachment_path = '';
        $path = public_path('uploads/visa_attachment/passenger');

        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $attachment_name = time().'.'.$request->attachment->getClientOriginalExtension();

        if($attachment_name){
            request()->attachment->move($path, $attachment_name);
            $attachment_path = "uploads/visa_attachment/passenger/" . $attachment_name;
        }

        $data = array(
            "passenger_id"  => $request->input('passenger_id'),
            "visa_number"   => $request->input('visa_number'),
            "country_id"    => $request->input('country_id'),
            "issue_date"    => date('Y-m-d', strtotime($request->input('issue_date'))),
            "expiry_date"   => date('Y-m-d', strtotime($request->input('expiry_date'))),
            "visa_type"     => $request->input('visa_type'),
            "attachment"    => $attachment_path,
            "active_status" => $request->input('active_status'),
            "created_by"    => Auth::id()
        );



        $VisaInfoData = VisaInfo::firstOrCreate($data);

        session()->flash('message', 'New Visa Info Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('visa_info');
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
        $visaInfo = VisaInfo::find($id);
        $allPassengers = $this->getPassengers();
        $allCountries = $this->getCountry();
        return view('admin.visainfo.edit', compact('visaInfo', 'allPassengers', 'allCountries'));
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
            "passenger_id"  => "required",
            "visa_number"   => "required",
            "country_id"    => "required",
            "issue_date"    => "required",
            "expiry_date"   => "required",
            "visa_type"     => "required",
            "active_status" => "required",
        ]);

        if(Input::get('delete')){
            $del = VisaInfo::find($id);
            File::delete($del->attachment);
            $data = array("attachment" => '',);
            $userData = VisaInfo::where('id',$id)->update($data);

            session()->flash('message', 'Attachment image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('visa_info_edit', $id);
        }
        else{
            $attachment_path = '';
            if(!empty($request->attachment)){
                $path = public_path('uploads/visa_attachment/passenger');
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $request->validate([
                    'attachment' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);
                $attachment_name = time().'.'.$request->attachment->getClientOriginalExtension();

                if($attachment_name){
                    request()->attachment->move($path, $attachment_name);
                    $attachment_path = "uploads/visa_attachment/passenger/" . $attachment_name;
                }
            }

            $data = array(
                "passenger_id"  => $request->input('passenger_id'),
                "visa_number"   => $request->input('visa_number'),
                "country_id"    => $request->input('country_id'),
                "issue_date"    => date('Y-m-d', strtotime($request->input('issue_date'))),
                "expiry_date"   => date('Y-m-d', strtotime($request->input('expiry_date'))),
                "visa_type"     => $request->input('visa_type'),
                "attachment"    => $attachment_path,
                "active_status" => $request->input('active_status'),
                "updated_by"    => Auth::id()
            );

            $VisaInfoData = VisaInfo::where('id',$id)->update($data);

            session()->flash('message', 'Visa Info Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('visa_info');
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

    private function getCountry()
    {
        $allCountries = Country::all();
        $allCountriesData = array();
        foreach ($allCountries as $country)
        {
            $allCountriesData[$country->id]=$country->name ;
        }

        return $allCountriesData;
    }

    private function getPassengers()
    {
        $PassengerData = Passenger::all();
        $allPassengers = array();
        foreach ($PassengerData as $Passenger)
        {
            $allPassengers[$Passenger->id]=$Passenger->sur_name ;
        }

        return $allPassengers;
    }

}
