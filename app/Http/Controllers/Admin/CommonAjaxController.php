<?php

namespace App\Http\Controllers\Admin;

use App\Model\Booking;
use App\Model\Branch;
use App\Model\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonAjaxController extends Controller
{


    public function getInvoiceById($id){
        $invoiceData = Booking::find($id);
        $collection_amount = Collection::where('booking_id',$id)->where('active_status',1)->sum('collection_amount');

        $data = [
            'id'=>$invoiceData->id,
            'customer_name'=>$invoiceData->customer->given_name,
            'passenger_name'=>$invoiceData->passenger->given_name,
            'ticket_number'=>$invoiceData->ticket_number,
            'due_date'=>$invoiceData->due_date,
            'due_amount'=>$invoiceData->payable_amount-$collection_amount,
        ];
        echo json_encode($data);
    }

    public function getBranchesByID($id)
    {
       $items= Branch::where('bank_id',$id)->get();
       $data['data']=$items;
        echo json_encode($data);
    }
}
