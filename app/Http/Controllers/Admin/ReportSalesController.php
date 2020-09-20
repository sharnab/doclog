<?php

namespace App\Http\Controllers\Admin;

use App\Model\Booking;
use App\Model\Passenger;
use App\Model\PaymentSource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class ReportSalesController extends Controller
{


    public function sales_by_duration()
    {
        return view('admin.report.sales_duration');
    }

    /**
     * @param Request $request
     * Sales duration report by ajax. It will receive get and post call
     * Default BY date, by
     */
    public function sales_for_duration_ajax(Request $request)
    {
        $report_type = $request->input('report_type');
        $to_date = $request->has('to_date')? $request->input('to_date'):date('Y-m-d');
        $from_date = $request->has('from_date')? $request->input('from_date'):date('Y-m-d',strtotime('-30 day',strtotime($to_date)));

        /**
         * Caching Parameters for excel output
         */
        $cache_data = [
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'report_type'=>$report_type
        ];

        Cache::put('sales_by_duration',$cache_data,600);

        $reports_data = $this->process_sales_by_duration($report_type,$from_date,$to_date);

        $data=[];
        foreach($reports_data as $value)
        {
            $data[]=[$value->reference,$value->total_sales,$value->total_ait,$value->total_tax,$value->total_agency_payment];
        }

        echo json_encode($data);

    }


    public function process_sales_by_duration($report_type,$from_date,$to_date)
    {
        $query = Booking::whereRaw("booking_date between '$from_date' and '$to_date'")
            ->where('active_status',1);
        if($report_type==2)
        {
            #By Week
            $query=$query->groupBy(DB::raw('year(booking_date),weekofyear(booking_date)'))
                ->select(DB::raw('concat("Week ",weekofyear(booking_date),", ",year(booking_date)) AS reference,sum(actual_payable_amount) as total_sales, sum(ait) as total_ait,sum(tax) as total_tax,sum(agency_payment) as total_agency_payment'));

        }elseif($report_type==3)
        {
            #By Month
            $query=$query->groupBy(DB::raw('year(booking_date),month(booking_date)'))
                ->select(DB::raw('concat(monthname(booking_date),", ",year(booking_date)) AS reference,sum(actual_payable_amount) as total_sales, sum(ait) as total_ait,sum(tax) as total_tax,sum(agency_payment) as total_agency_payment'));


        }elseif($report_type==4)
        {
            #By Year
            $query=$query->groupBy(DB::raw('year(booking_date)'))
                ->select(DB::raw('year(booking_date) AS reference,sum(actual_payable_amount) as total_sales, sum(ait) as total_ait,sum(tax) as total_tax,sum(agency_payment) as total_agency_payment'));


        }else{
            $query=$query->groupBy('booking_date')
                ->select(DB::raw('booking_date as reference,sum(actual_payable_amount) as total_sales, sum(ait) as total_ait,sum(tax) as total_tax,sum(agency_payment) as total_agency_payment'));
        }

        $reports_data = $query->get();

        return $reports_data;
    }

    public function sales_by_duration_excel()
    {
        if (Cache::has('sales_by_duration')) {
            $request_array = Cache::get('sales_by_duration');
            $report_type=$request_array['report_type'];
            $from_date=$request_array['from_date'];
            $to_date=$request_array['to_date'];
        }else{
            $report_type=1;
            $to_date = date('Y-m-d');;
            $from_date = date('Y-m-d',strtotime('-30 day',strtotime($to_date)));
        }
        $reports_data = $this->process_sales_by_duration($report_type,$from_date,$to_date);

        $excel_array[] = array('Date', 'Total Sales', 'AIT', 'TAX', 'Agency Payment');
        foreach($reports_data as $value)
        {
            $excel_array[] = [$value->reference,$value->total_sales,$value->total_ait,$value->total_tax,$value->total_agency_payment];

        }

        Excel::create('Sales By Duration', function($excel) use ($excel_array){
            $excel->setTitle('Sales By Duration');
            $excel->sheet('Sales By Duration', function($sheet) use ($excel_array){
                $sheet->fromArray($excel_array, null, 'A1', true, false);

            });
        })->download('xlsx');

        return redirect()->route('sales_by_duration');
    }

    /**
     * Ledger Report Area
     */
    public function client_ledger()
    {
        return view('admin.report.client_ledger');
    }

    public function money_receipt()
    {
        return view('admin.report.money_receipt');
    }

    public function deposite_slip()
    {
        return view('admin.report.deposite_slip');
    }

    public function bank_delivery()
    {
        return view('admin.report.bank_delivery_form');
    }

    public function bangla_inbound_form()
    {
        return view('admin.report.bangla_inbound_form');
    }

    public function inbound_form_index()
    {
        $allBookings = $this->getBookings();
        return view('admin.report.inbound_index', compact('allBookings'));
    }

    public function generate_inbound_form()
    {
        $content = DB::table('bookings')
            ->select('bookings.passenger_id','bookings.visiting_purpose','bookings.travel_date','bookings.flight_number','passenger.given_name','passenger.gender','passenger.date_of_birth','passenger.nationality','passenger.passport_no','passenger.date_of_expire','visa_info.expiry_date','visa_processing.return_date','countries.name')
            ->leftJoin('passenger', 'bookings.passenger_id', '=', 'passenger.id')
            ->leftJoin('visa_info', 'bookings.passenger_id', '=', 'visa_info.passenger_id')
            ->leftJoin('countries', 'passenger.nationality', '=', 'countries.id')
            ->leftJoin('visa_processing', 'bookings.passenger_id', '=', 'visa_processing.passenger_id')
            ->where('bookings.id', '=', $_POST['booking_id'])
            ->first();

        return view('admin.report.inbound_form', compact('content'));
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

    public function english_inbound_form()
    {
        return view('admin.report.english_inbound_form');
    }

    public function issue_ticket()
    {
        return view('admin.report.issue_ticket');
    }

}
