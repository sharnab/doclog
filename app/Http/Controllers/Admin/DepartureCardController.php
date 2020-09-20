<?php

namespace App\Http\Controllers\Admin;

use App\Model\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class DepartureCardController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_inbound()
    {
        $allBookings = $this->getBookings();
        return view('admin.report.inbound_index', compact('allBookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_outbound()
    {
        $allBookings = $this->getBookings();
        return view('admin.report.immigration_index', compact('allBookings'));
    }

    public function generate_departure_card()
    {
//         select b.passenger_id,b.visiting_purpose,p.given_name,p.gender, p.date_of_birth,p.nationality,p.passport_no,p.date_of_expire,vi.expiry_date,vp.return_date
// from bookings b
// left join passenger as p on b.passenger_id=p.id
// left join visa_info as vi on b.passenger_id=vi.passenger_id
// left join visa_processing as vp on b.passenger_id=vp.passenger_id
// where b.passenger_id=1
        $content = DB::table('bookings')
            ->select('bookings.passenger_id','bookings.visiting_purpose','passenger.given_name','passenger.gender','passenger.date_of_birth','countries.name as nationality','passenger.passport_no','passenger.date_of_expire','visa_info.expiry_date','visa_processing.return_date')
            ->leftJoin('passenger', 'bookings.passenger_id', '=', 'passenger.id')
            ->leftJoin('visa_info', 'bookings.passenger_id', '=', 'visa_info.passenger_id')
            ->leftJoin('visa_processing', 'bookings.passenger_id', '=', 'visa_processing.passenger_id')
            ->leftJoin('countries', 'passenger.nationality', '=', 'countries.id')
            ->where('bookings.id', '=', $_POST['booking_id'])
            ->get();

        return view('admin.report.outbound_departure', compact('content'));
    }

    public function generate_inbound_form()
    {
        $content = DB::table('bookings')
            ->select('bookings.passenger_id','bookings.visiting_purpose','bookings.travel_date','passenger.given_name','passenger.billing_address','passenger.gender','passenger.date_of_birth','countries.name as nationality','passenger.passport_no','passenger.date_of_expire','visa_info.expiry_date','visa_processing.return_date')
            ->leftJoin('passenger', 'bookings.passenger_id', '=', 'passenger.id')
            ->leftJoin('visa_info', 'bookings.passenger_id', '=', 'visa_info.passenger_id')
            ->leftJoin('visa_processing', 'bookings.passenger_id', '=', 'visa_processing.passenger_id')
            ->leftJoin('countries', 'passenger.nationality', '=', 'countries.id')
            ->where('bookings.id', '=', $_POST['booking_id'])
            ->get();

        return view('admin.report.inbound_departure', compact('content'));
    }

    private function getBookings()
    {
        $allBookings = Booking::all();
        $allBookingsData = array();
        foreach ($allBookings as $booking)
        {
            $allBookingsData[$booking->id]=$booking->ticket_number ;
        }

        return $allBookingsData;
    }

}
