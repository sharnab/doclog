<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use App\Model\Bank;
use App\Model\Booking;

use DB;

class IATAController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function sales_form()
    {
        return view('admin.IATA.iata_agency_index');
    }

    public function iata_form_input()
    {
        $allBookings = $this->getBookings();
        return view('admin.IATA.iata_form_index', compact('allBookings'));
    }



    public function iata_form()
    {
        $from_date = date('Y-m-d',strtotime($_POST['from_date']));
        $to_date = date('Y-m-d',strtotime($_POST['to_date']));

        $contentList = DB::table('bookings')
            ->select('bookings.*','passenger.given_name','passenger.gender','passenger.date_of_birth','passenger.nationality','passenger.passport_no','passenger.date_of_expire','passenger.nationality','visa_info.expiry_date','visa_processing.return_date','countries.passport_short_name')
            ->leftJoin('passenger', 'bookings.passenger_id', '=', 'passenger.id')
            ->leftJoin('visa_info', 'bookings.passenger_id', '=', 'visa_info.passenger_id')
            ->leftJoin('countries', 'passenger.nationality', '=', 'countries.id')
            ->leftJoin('visa_processing', 'bookings.passenger_id', '=', 'visa_processing.passenger_id')
            // ->leftJoin('countries', 'bookings.passenger_id', '=', 'visa_info.passenger_id')
            ->whereBetween('bookings.booking_date', [$from_date,$to_date])
            ->get();

        return view('admin.IATA.iata_form', compact('contentList'));
    }

    // public function iata_form()
    // {
    //     return view('admin.IATA.iata_form');
    // }

    public function bank_form()
    {
        return view('admin.IATA.bank_form');
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
