<?php

namespace App\Http\Controllers\Admin;

use App\Model\Booking;
use App\Model\Passenger;
use App\Model\PaymentSource;
use App\Model\Viewdue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class ReportDueController extends Controller
{


    public function due_report()
    {
        $allCustomers =getAllCustomer();

        return view('admin.report.due_report',compact('allCustomers'));
    }

    /**
     * @param Request $request
     * Sales duration report by ajax. It will receive get and post call
     * Default BY date, by
     */
    public function due_report_ajax(Request $request)
    {
        $customer_id = $request->input('customer_id');
        $to_date = $request->has('to_date')? $request->input('to_date'):date('Y-m-d');
        $from_date = $request->has('from_date')? $request->input('from_date'):date('Y-m-d',strtotime('-30 day',strtotime($to_date)));

        /**
         * Caching Parameters for excel output
         */
        $cache_data = [
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'customer_id'=>$customer_id
        ];

        Cache::put('due_report',$cache_data,600);

        $reports_data = $this->process_due_report($customer_id,$from_date,$to_date);

        $data=[];
        foreach($reports_data as $value)
        {
            $data[]=[$value->invoice_number,$value->customer->given_name,$value->customer->contact_no,$value->due_amount,$value->customer->contact_no];
        }

        echo json_encode($data);

    }


    public function process_due_report($customer_id,$from_date,$to_date)
    {


        $query = Viewdue::whereRaw("booking_date between '$from_date' and '$to_date'")
            ->where('active_status',1)
            ->where('due_amount','>',0);
        if($customer_id>0)
        {
            $query=$query->where('customer_id',$customer_id);
        }
        $reports_data = $query->get();

        return $reports_data;
    }

    public function due_report_excel()
    {
        if (Cache::has('due_report')) {
            $request_array = Cache::get('due_report');
            $report_type=$request_array['customer_id'];
            $from_date=$request_array['from_date'];
            $to_date=$request_array['to_date'];
        }else{
            $report_type=0;
            $to_date = date('Y-m-d');;
            $from_date = date('Y-m-d',strtotime('-30 day',strtotime($to_date)));
        }
        $reports_data = $this->process_due_report($report_type,$from_date,$to_date);

        $excel_array[] = array('Invoice', 'Customer Name', 'Customer Contact', 'Due Amount', 'Billing Address');
        foreach($reports_data as $value)
        {
            $excel_array[] = [$value->invoice_number,$value->customer->given_name,$value->customer->contact_no,$value->due_amount,$value->customer->contact_no];

        }

        Excel::create('Due Report', function($excel) use ($excel_array){
            $excel->setTitle('Due Reports');
            $excel->sheet('Due Report', function($sheet) use ($excel_array){
                $sheet->fromArray($excel_array, null, 'A1', true, false);

            });
        })->download('xlsx');

        return redirect()->route('/');
    }




}
