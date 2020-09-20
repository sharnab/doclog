<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Booking_images;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\Booking;
use App\Model\SalesExecutive;
use App\Model\Airline;
use App\Model\Agency;
use App\Model\Passenger;
use App\Model\Customer;
use App\Model\User;
use App\Model\CurrencyInfo;
use DB;
use Helper; // Important

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingList = Booking::get();

        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.booking.index',compact('bookingList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allSalesExecutives = $this->getSalesExecutives();
        $allAirlines = $this->getAirlines();
        $allPassengers = $this->getPassengers();
        $allAgencies = $this->getAgencies();
        $allUser = $this->getUsers();
        $allCustomers = $this->getCustomer();
        $allCurrencies = $this->getCurrency();
        $allNations = Helper::nationList();

        return view('admin.booking.create', compact('allSalesExecutives', 'allAirlines', 'allPassengers', 'allAgencies', 'allUser', 'allCustomers', 'allNations', 'allCurrencies'));
        // return view('admin.booking.create', compact('allSalesExecutives', 'allAirlines', 'allSectors', 'allPassengers', 'allAgencies', 'allUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {



        $ticket_img_path = false;
        if($request->has('image'))
        {
            $path = public_path('uploads/ticket_images');
            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $image_name = time().'.'.$request->image->getClientOriginalExtension();

            if($image_name){
                request()->image->move($path, $image_name);
                $ticket_img_path = "uploads/ticket_images/" . $image_name;
            }
        }


        $data = array(
            "booking_date"              => date('Y-m-d', strtotime($request->input('booking_date'))),
            "booking_reference"         => $request->input("booking_reference"),
            "airlines_id"               => $request->input("airlines_id"),
            "passenger_id"              => $request->input("passenger_id"),
            "ticket_type"               => $request->input("ticket_type"),
            "seat_class"                => $request->input("seat_class"),
            "ticket_number"             => $request->input("ticket_number"),
            "flight_number"             => $request->input("flight_number"),
            "visiting_purpose"          => $request->input("visiting_purpose"),
            "sector_from"               => $request->input("sector_from"),
            "sector_middle"             => $request->input("sector_middle"),
            "sector_to"                 => $request->input("sector_to"),
            "base_fare"                 => $request->input("base_fare"),
            "tax"                       => $request->input("tax"),
            "ait_percentage"            => $request->input("ait_percentage"),
            "ait"                       => $request->input("ait"),
            "airlines_vat"              => $request->input("airlines_vat"),
            "total_fare"                => $request->input("total_fare"),
            "customer_charged"          => $request->input("customer_charged"),
            "payable_amount"            => $request->input("payable_amount"),
            "actual_payable_amount"     => $request->input("payable_amount"),
            "currecy_id"                => $request->input("currecy_id"),
            "travel_date"               => date(Y-m-d, strtotime($request->input("travel_date"))),
            "return_date"               => date(Y-m-d, strtotime($request->input("return_date"))),
            "agency_id"                 => $request->input("agency_id"),
            "agency_payment"            => $request->input("agency_payment"),
            "reissue_or_refund_charged" => $request->input("reissue_or_refund_charged"),
            "discount_type"             => $request->input("discount_type"),
            "discount_amount"           => $request->input("discount_amount"),
            "issue_type"                => $request->input("issue_type"),
            "reference_id"              => $request->input("reference_id"),
            "staff_id"                  => $request->input("staff_id"),
            "active_status"             => $request->input("active_status"),
            "created_by"                => Auth::id()
        );
        if($request->input("discount_type") == 2){
            $data['customer_id'] = $request->input("percentage");
        }

        /**
         * Get Customer ID by Passenger ID
         */
        $data['customer_id'] = Passenger::find($data['passenger_id'])->customer_id;

        if($ticket_img_path){
            $data["ticket_image"] = $ticket_img_path;
        }

        $userData = Booking::firstOrCreate($data);

        session()->flash('message', 'New Booking Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('booking');
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
        $data = DB::table('bookings')
                ->join('passenger', 'passenger.id', '=', 'bookings.passenger_id')
                ->join('airlines',  'airlines.id',  '=', 'bookings.airlines_id')
                ->join('agencies',  'agencies.id',  '=', 'bookings.agency_id')
                ->join('sectors',   'sectors.id',   '=', 'bookings.sector_id')
                ->join('users',     'users.id',     '=', 'bookings.staff_id')
                ->join('customers', 'customers.id', '=', 'bookings.reference_id')
                ->where('bookings.id', '=', $id)
                ->select('passenger.given_name as passenger_name', 'airlines.name as airline_name', 'agencies.name as agency_name', 'sectors.name as sector_name', 'users.full_name as staff_name', 'customers.given_name as customer_name', 'bookings.*')
                ->get();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $booking->booking_date = date('d-m-Y', strtotime($booking->booking_date));
        $allAirlines = $this->getAirlines();
        $allSalesExecutives = $this->getSalesExecutives();
        $allUser = $this->getUsers();
        $allPassengers = $this->getPassengers();
        $allAgencies = $this->getAgencies();
        $allCustomers = $this->getCustomer();
        $allNations = Helper::nationList();

        return view('admin.booking.edit', compact('booking', 'allSalesExecutives', 'allAirlines', 'allPassengers', 'allAgencies', 'allUser', 'allCustomers', 'allNations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, $id)
    {

        if(Input::get('delete')){
            $del = Booking::find($id);
            File::delete($del->ticket_image);
            $data = array("ticket_image" => '',);
            $Data = Booking::where('id',$id)->update($data);

            session()->flash('message', 'Ticket image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('booking_edit', $id);
        }
        else {
            $ticket_img_path = '';

            if(!empty($request->image)){
                $path = public_path('uploads/ticket_images');
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);

                $image_name = time().'.'.$request->image->getClientOriginalExtension();

                if($image_name){
                    request()->image->move($path, $image_name);
                    $ticket_img_path = "uploads/ticket_images/" . $image_name;
                }
            }

            $data = array(
                "booking_date"              => date('Y-m-d', strtotime($request->input('booking_date'))),
                "booking_reference"         => $request->input("booking_reference"),
                "airlines_id"               => $request->input("airlines_id"),
                "passenger_id"              => $request->input("passenger_id"),
                "ticket_type"               => $request->input("ticket_type"),
                "seat_class"                => $request->input("seat_class"),
                "ticket_number"             => $request->input("ticket_number"),
                "flight_number"             => $request->input("flight_number"),
                "visiting_purpose"          => $request->input("visiting_purpose"),
                "sector_from"               => $request->input("sector_from"),
                "sector_middle"             => $request->input("sector_middle"),
                "sector_to"                 => $request->input("sector_to"),
                "base_fare"                 => $request->input("base_fare"),
                "tax"                       => $request->input("tax"),
                "ait_percentage"            => $request->input("ait_percentage"),
                "ait"                       => $request->input("ait"),
                "airlines_vat"              => $request->input("airlines_vat"),
                "total_fare"                => $request->input("total_fare"),
                "customer_charged"          => $request->input("customer_charged"),
                "payable_amount"            => $request->input("payable_amount"),
                "actual_payable_amount"     => $request->input("payable_amount"),
                "currecy_id"                => $request->input("currecy_id"),
                "travel_date"               => date(Y-m-d, strtotime($request->input("travel_date"))),
                "return_date"               => date(Y-m-d, strtotime($request->input("return_date"))),
                "agency_id"                 => $request->input("agency_id"),
                "agency_payment"            => $request->input("agency_payment"),
                "reissue_or_refund_charged" => $request->input("reissue_or_refund_charged"),
                "discount_type"             => $request->input("discount_type"),
                "discount_amount"           => $request->input("discount_amount"),
                "issue_type"                => $request->input("issue_type"),
                "reference_id"              => $request->input("reference_id"),
                "staff_id"                  => $request->input("staff_id"),
                "active_status"             => $request->input("active_status"),
                "updated_by"                => Auth::id()
            );
            if($request->input("discount_type") == 2){
                $data['customer_id'] = $request->input("percentage");
            }

            /**
             * Get Customer ID by Passenger ID
             */
            $data['customer_id'] = Passenger::find($data['passenger_id'])->customer_id;

            if($ticket_img_path){
                $data["ticket_image"] = $ticket_img_path;
            }
            $BookingData = Booking::where('id',$id)->update($data);

            session()->flash('message', 'Booking Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('booking');
        }
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

    private function getAirlines()
    {
        $AirlinesData = Airline::all();
        $allAirlines = array();
        foreach ($AirlinesData as $Airline)
        {
            $allAirlines[$Airline->id]=$Airline->name ;
        }

        return $allAirlines;
    }

    private function getSalesExecutives()
    {
        $allExecutives = SalesExecutive::all();
        $allSalesExecutives = array();
        foreach ($allExecutives as $salesExecutive)
        {
            $allSalesExecutives[$salesExecutive->id]=$salesExecutive->name ;
        }

        return $allSalesExecutives;
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

    private function getCurrency()
    {
        $CurrencyData = CurrencyInfo::all();
        $allCurrencies = array();
        foreach ($CurrencyData as $Currency)
        {
            $allCurrencies[$Currency->id]=$Currency->name ;
        }

        return $allCurrencies;
    }

    private function getUsers()
    {
        $UserData = User::all();
        $allUsers = array();
        foreach ($UserData as $User)
        {
            $allUsers[$User->id]=$User->username ;
        }

        return $allUsers;
    }

    public function passenger_dropdown(){
        $PassengerData = Passenger::all();
        $allPassengers = array();
        foreach ($PassengerData as $Passenger)
        {
            $allPassengers[$Passenger->id]=$Passenger->sur_name ;
        }

        foreach ($allPassengers as $passengerId => $passengerName )
            return "<option value=".$passengerId." >".$passengerName."</option>";
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function get_ticket_code($id){
        if($id){
            $airline = Airline::find($id);
            return $airline->ticket_code;
        }
        else{
            return false;
        }
    }

}
