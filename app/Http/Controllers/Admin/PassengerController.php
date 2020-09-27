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
use App\Model\Passenger;
use App\Model\ExpatPassport;
use App\Model\Contact;
use App\Model\Customer;
use App\Model\User;
use App\Model\Country;

use Helper; // Important

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passengerList = Passenger::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.passenger.index',compact('passengerList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $allCustomers = $this->getCustomer();
        $allSalesExecutives = $this->getSalesExecutives();
        $allNations = $this->getNations();//Helper::nationList();

        return view('admin.passenger.create', compact('allCustomers', 'allNations', 'allSalesExecutives'));
    }

    private function getCustomer()
    {
        $allCustomers = Customer::all();
        $allCustomersData = array();
        foreach ($allCustomers as $customer)
        {
            $allCustomersData[$customer->id]=$customer->given_name ;
        }

        return $allCustomersData;
    }

    private function getSalesExecutives()
    {
        $allExecutives = User::all();
        $allSalesExecutives = array();
        foreach ($allExecutives as $salesExecutive)
        {
            $allSalesExecutives[$salesExecutive->id]=$salesExecutive->full_name ;
        }

        return $allSalesExecutives;
    }

    private function getNations()
    {
        $allCountryList = Country::all();
        $allCountries = array();
        foreach ($allCountryList as $country)
        {
            $allCountries[$country->id]=$country->name ;
        }

        return $allCountries;
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
            "sur_name"              => "required",
            "given_name"            => "required",
            "personal_no"           => "unique:passenger|max:17|min:10",
            "active_status"         => "required",
            // 'passport_image'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'nid_img'               => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'driver_license_img'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // $passport_img_path = '';
        // $path = public_path('uploads/passport_images/passenger');
        $nid_img_path = public_path('uploads/nid_images/passenger');
        $driver_license_img_path = public_path('uploads/driver_license_images/passenger');

        // if(!File::exists($path)) {
        //     File::makeDirectory($path, $mode = 0777, true, true);
        // }
        if(!File::exists($nid_img_path)) {
            File::makeDirectory($nid_img_path, $mode = 0777, true, true);
        }
        if(!File::exists($driver_license_img_path)) {
            File::makeDirectory($driver_license_img_path, $mode = 0777, true, true);
        }

        if($request->hasFile('nid_img')){
            $nid_img = time().'.'.$request->nid_img->getClientOriginalExtension();
            request()->nid_img->move($nid_img_path, $nid_img);
            $nid_img_path = "uploads/nid_images/passenger/" . $nid_img;
        }
        else{
            $nid_img_path = '';
        }
        if($request->hasFile('driver_license_img')){
            $driver_license_img = time().'.'.$request->driver_license_img->getClientOriginalExtension();
            request()->driver_license_img->move($driver_license_img_path, $driver_license_img);
            $driver_license_img_path = "uploads/driver_license_images/passenger/" . $driver_license_img;
        }
        else{
            $driver_license_img_path = '';
        }

        $data = array(
            "sur_name"                  => $request->input('sur_name'),
            "given_name"                => $request->input('given_name'),
            "customer_id"               => $request->input('customer_id'),
            "customer_relation"         => $request->input('customer_relation'),
            "personal_no"               => $request->input('personal_no'),
            "driver_license_no"         => $request->input('driver_license_no'),
            "nationality"               => $request->input('nationality'),
            "gender"                    => $request->input('gender'),
            "place_of_birth"            => $request->input('place_of_birth'),
            "date_of_birth"             => date('Y-m-d', strtotime($request->input('date_of_birth'))),
            "date_of_issue"             => date('Y-m-d', strtotime($request->input('date_of_issue'))),
            "date_of_expire"            => date('Y-m-d', strtotime($request->input('date_of_expire'))),
            // "issuing_authority"         => $request->input('issuing_authority'),
            "nid_img"                   => $nid_img_path,
            "driver_license_img"        => $driver_license_img_path,
            "emergency_name"            => $request->input('emergency_name'),
            "emergency_contact"         => $request->input('emergency_contact'),
            "emergency_relation"        => $request->input('emergency_relation'),
            "emergency_address"         => $request->input('emergency_address'),
            "billing_address"           => $request->input('billing_address'),
            "sales_executive_id"        => $request->input('sales_executive_id'),
            "active_status"             => $request->input('active_status'),
            "remarks"                   => $request->input('remarks'),
            "created_by"                => Auth::id()
        );

        $passengerData = Passenger::firstOrCreate($data);

        foreach($request->input('contact_no') as $contact){
            $contact_data = array(
                "passenger_id"  => $passengerData['id'],
                "contact_no"    => $contact,
                "created_by"    => Auth::id()
            );
            $contactData = Contact::firstOrCreate($contact_data);
        }

        for($i=0;$i<=count($request->input('passport_no'));$i++){
            $passport_data = array(
                "passenger_id"      => $passengerData['id'],
                "passport_no"       => $request->input('passport_no')[$i],
                "passport_image"    => $request->input('passport_image')[$i],
                "issuing_authority" => $request->input('issuing_authority')[$i],
                "issuing_date"      => $request->input('issuing_date')[$i],
                "expiry_date"       => $request->input('expiry_date')[$i],
                "active_status"     => $request->input('currently_active')[$i],
                "created_by"        => Auth::id()
            );

            if($request->hasFile('passport_image['.$i.']')){
                $path = public_path('uploads/passport_images/passenger/'.$passengerData['id']);
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $photos = $request->file('passport_image['.$i.']');
                $passport_image = time().'.'.$photos[$i]->getClientOriginalExtension();
                request()->passport_image->move($path, $passport_image);
                $passport_img_path = "uploads/passport_images/passenger/".$passengerData['id'].'/'.$passport_image;
            }
            else{
                $passport_img_path = '';
            }

            $passportData = ExpatPassport::firstOrCreate($passport_data);
        }

        session()->flash('message', 'New Passenger Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('passenger');
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
        $passenger = Passenger::find($id);
        // $contacts = Contact::where('passenger_id', '=', $id)->get();

        $contacts = Contact::where('passenger_id', $id)->get(['id','contact_no']);
        $passenger->date_of_birth = date('d-m-Y', strtotime($passenger->date_of_birth));
        $passenger->date_of_issue = date('d-m-Y', strtotime($passenger->date_of_issue));
        $passenger->date_of_expire = date('d-m-Y', strtotime($passenger->date_of_expire));
        $allCustomers = $this->getCustomer();
        $allSalesExecutives = $this->getSalesExecutives();
        $allNations = $this->getNations();//Helper::nationList();
// var_dump($contacts);exit();
        return view('admin.passenger.edit', compact('passenger', 'contacts', 'allCustomers', 'allNations', 'allSalesExecutives'));
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
            "sur_name"             => "required",
            "given_name"           => "required",
            "personal_no"          => "max:17|min:10|unique:passenger,personal_no,$id",
            "passport_no"          => "required|unique:passenger,passport_no,$id",
            // "previous_passport_no" => "unique:passenger,previous_passport_no,$id",
            "active_status"        => "required",
        ]);

        if($request->input('previous_passport_no')){
            $request->validate([
                "previous_passport_no" => "unique:passenger,previous_passport_no,$id",
            ]);
        }

        if(Input::get('delete_passport_img')){
            $del = Passenger::find($id);
            File::delete($del->passport_image);
            $data = array("passport_image" => '',);
            $userData = Passenger::where('id',$id)->update($data);

            session()->flash('message', 'Passport image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('passenger_edit', $id);
        }
        if(Input::get('delete_prev_passport_img')){
            $del = Passenger::find($id);
            File::delete($del->previous_passport_image);
            $data = array("previous_passport_image" => '',);
            $userData = Passenger::where('id',$id)->update($data);

            session()->flash('message', 'Previous Passport image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('passenger_edit', $id);
        }
        if(Input::get('delete_nid_img')){
            $del = Passenger::find($id);
            File::delete($del->nid_img);
            $data = array("nid_img" => '',);
            $userData = Passenger::where('id',$id)->update($data);

            session()->flash('message', 'NID image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('passenger_edit', $id);
        }
        if(Input::get('delete_driver_license_img')){
            $del = Passenger::find($id);
            File::delete($del->driver_license_img);
            $data = array("driver_license_img" => '',);
            $userData = Passenger::where('id',$id)->update($data);

            session()->flash('message', 'Driver license image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('passenger_edit', $id);
        }
        else {
            $passport_img_path = '';
            $old_passport_img_path = '';
            $nid_img_path = '';
            $driver_license_img_path = '';

            if(!empty($request->image)){
                $path = public_path('uploads/passport_images/passenger');
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);
                $image_name = time().'.'.$request->image->getClientOriginalExtension();

                if($image_name){
                    request()->image->move($path, $image_name);
                    $passport_img_path = "uploads/passport_images/passenger/" . $image_name;
                }
            }

            if(!empty($request->prev_passport_img)){
                $old_path = public_path('uploads/previous_passport_images/passenger');
                if(!File::exists($old_path)) {
                    File::makeDirectory($old_path, $mode = 0777, true, true);
                }

                $request->validate([
                    'prev_passport_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);
                $prev_passport_img = time().'.'.$request->prev_passport_img->getClientOriginalExtension();

                if($prev_passport_img){
                    request()->prev_passport_img->move($old_path, $prev_passport_img);
                    $old_passport_img_path = "uploads/previous_passport_images/passenger/" . $prev_passport_img;
                }
            }

            if(!empty($request->nid_img)){
                $nid_path = public_path('uploads/nid_images/passenger');
                if(!File::exists($nid_path)) {
                    File::makeDirectory($nid_path, $mode = 0777, true, true);
                }

                $request->validate([
                    'nid_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);
                $nid_img_name = time().'.'.$request->image->getClientOriginalExtension();

                if($nid_img_name){
                    request()->nid_img->move($nid_path, $nid_img_name);
                    $nid_img_path = "uploads/nid_images/passenger/" . $nid_img_name;
                }
            }

            if(!empty($request->driver_license_img)){
                $license_img_path = public_path('uploads/driver_license_images/passenger');
                if(!File::exists($license_img_path)) {
                    File::makeDirectory($license_img_path, $mode = 0777, true, true);
                }

                $request->validate([
                    'driver_license_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);
                $driver_license_img = time().'.'.$request->driver_license_img->getClientOriginalExtension();

                if($driver_license_img){
                    request()->driver_license_img->move($license_img_path, $driver_license_img);
                    $driver_license_img_path = "uploads/driver_license_images/passenger/" . $driver_license_img;
                }
            }

            $data = array(
                "sur_name"                  => $request->input('sur_name'),
                "given_name"                => $request->input('given_name'),
                "customer_id"               => $request->input('customer_id'),
                "customer_relation"         => $request->input('customer_relation'),
                "personal_no"               => $request->input('personal_no'),
                "driver_license_no"         => $request->input('driver_license_no'),
                "nationality"               => $request->input('nationality'),
                "gender"                    => $request->input('gender'),
                "place_of_birth"            => $request->input('place_of_birth'),
                "date_of_birth"             => date('Y-m-d', strtotime($request->input('date_of_birth'))),
                "passport_no"               => $request->input('passport_no'),
                "date_of_issue"             => date('Y-m-d', strtotime($request->input('date_of_issue'))),
                "date_of_expire"            => date('Y-m-d', strtotime($request->input('date_of_expire'))),
                "issuing_authority"         => $request->input('issuing_authority'),
                "previous_passport_no"      => $request->input('previous_passport_no'),
                "emergency_name"            => $request->input('emergency_name'),
                "emergency_contact"         => $request->input('emergency_contact'),
                "emergency_relation"        => $request->input('emergency_relation'),
                "emergency_address"         => $request->input('emergency_address'),
                "billing_address"           => $request->input('billing_address'),
                "sales_executive_id"        => $request->input('sales_executive_id'),
                "rating"                    => $request->input('rating'),
                "active_status"             => $request->input('active_status'),
                "remarks"                   => $request->input('remarks'),
                "updated_by"                => Auth::id()
            );

            if($passport_img_path){
                $data["passport_image"] = $passport_img_path;
            }
            if($old_passport_img_path){
                $data["previous_passport_image"] = $old_passport_img_path;
            }
            if($nid_img_path){
                $data["nid_img"] = $nid_img_path;
            }
            if($driver_license_img_path){
                $data["driver_license_img"] = $driver_license_img_path;
            }
            $PassengerData = Passenger::where('id',$id)->update($data);

            $ids = Contact::where('passenger_id', $id)->get(['id']);
            $result=Contact::whereIn('id',$ids)->delete();
            foreach($request->input('contact_no') as $contact){
                $contact_data = array(
                    "passenger_id"  => $id,
                    "contact_no"    => $contact,
                    "created_by"    => Auth::id()
                );
                $contactData = Contact::firstOrCreate($contact_data);
            }

            session()->flash('message', 'Passenger Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('passenger');
        }
    }

    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }

    public function ajaxRequestPost(Request $request)
    {
        // $request = json_decode(json_encode($request['passengerData']), FALSE);
        $request = $request['passengerData'];

        // create the validation rules
        $rules = array(
            "sur_name"              => "required",
            "given_name"            => "required",
            "contact_no"            => "required|unique:passenger|max:15|min:7",
            "personal_no"           => "unique:passenger|max:17|min:10",
            "passport_no"           => "required|unique:passenger",
            "previous_passport_no"  => "required|unique:passenger",
            "active_status"         => "required",
        );

        $validator = Validator::make($request, $rules);

        if ($validator->fails())
        {
            // $msg = "Please check the given data again. Some of the data already exists."
            $messages = json_decode($validator->errors());
            $error_msg = '';

            foreach($messages as $key => $value){
                $error_msg = $error_msg . $value[0] . '\\n';
            }
            echo json_encode($error_msg);
        }
        else
        {
            $data = array(
                "sur_name"              => $request['sur_name'],
                "given_name"            => $request['given_name'],
                "customer_id"           => $request['customer'],
                "customer_relation"     => $request['customer_relation'],
                "contact_no"            => $request['contact_no'],
                "personal_no"           => $request['personal_no'],
                "nationality"           => $request['nationality'],
                "gender"                => $request['gender'],
                "place_of_birth"        => $request['place_of_birth'],
                "date_of_birth"         => date('Y-m-d', strtotime($request['date_of_birth'])),
                "passport_no"           => $request['passport_no'],
                // "passport_image"        => $passport_img_pat,
                "date_of_issue"         => date('Y-m-d', strtotime($request['date_of_issue'])),
                "date_of_expire"        => date('Y-m-d', strtotime($request['date_of_expire'])),
                "issuing_authority"     => $request['issuing_authority'],
                "previous_passport_no"  => $request['previous_passport_no'],
                "emergency_name"        => $request['emergency_name'],
                "emergency_contact"     => $request['emergency_contact'],
                "emergency_relation"    => $request['emergency_relation'],
                "emergency_address"     => $request['emergency_address'],
                "billing_address"       => $request['billing_address'],
                "sales_executive_id"    => $request['sales_executive'],
                "rating"                => $request->input('rating'),
                "active_status"         => $request['active_status'],
                "remarks"               => $request->input('remarks'),
                "updated_by"            => Auth::id()
            );

            $input = array_merge($data, array(
                // "passport_image"        => $passport_img_path,
                "created_by"            => Auth::id()
                )
            );

            if ($validator->passes()) {
                $passengerData = Passenger::firstOrCreate($input);
                $msg = 1;

                $passengerList = Passenger::get();

                return response()->json(['success'=>$msg, 'data'=>$passengerList]);
            }
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
