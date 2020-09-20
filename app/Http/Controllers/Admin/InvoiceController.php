<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InvoiceRequest;
use App\Model\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sales_id=NULL)
    {

       $item= Booking::find($sales_id);

       if(empty($item))
       {
           session()->flash('message', 'Not a valid request');
           session()->flash('class', '2');
           return redirect()->route('booking');
       }

       if($item->has_invoice)
       {
           session()->flash('message', 'Already Has invoiced');
           session()->flash('class', '2');
           return redirect()->route('booking');
       }

        return view('admin.invoice.invoice_create',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $booking_id = $request->input('booking_id');

        $item = Booking::findOrFail($booking_id);
        $item->invoice_number=generate_invoice_nubmer($booking_id+499);
        $item->invoice_date=date('Y-m-d',strtotime($request->input('invoice_date')));
        $item->due_date=date('Y-m-d',strtotime($request->input('due_date')));
        $item->invoice_amount=$request->input('invoice_amount');
        $item->converted_invoice_amount=$request->input('invoice_amount');
        $item->currency_id=1;
        $item->has_invoice=1;
        $item->invoice_by=Auth::id();
        $item->save();

        //redirect(route('invoice_view',$booking_id));
        return redirect()->route('invoice_view',$booking_id);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item= Booking::find($id);

        if(empty($item))
        {
            session()->flash('message', 'Not a valid request');
            session()->flash('class', '2');
            return redirect()->route('booking');
        }

        if(!$item->has_invoice)
        {
            session()->flash('message', 'Invoice Not found');
            session()->flash('class', '2');
            return redirect()->route('booking');
        }

        return view('admin.invoice.invoice',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
