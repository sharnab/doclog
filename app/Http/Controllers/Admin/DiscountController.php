<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\Discount;
use App\Model\Customer;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discountList = Discount::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.discount.index',compact('discountList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCustomers = $this->getCustomer();

        return view('admin.discount.create', compact('allCustomers'));
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
            "name"              => "required",
            "code"              => "required",
            "discount_type"     => "required",
            "amount"            => "required",
            "applicable_for"    => "required",
            "from_date"         => "required",
            "to_date"           => "required",
            "active_status"     => "required",
        ]);

        $data = array(
            "name"              => $request->input("name"),
            "code"              => $request->input("code"),
            "discount_type"     => $request->input("discount_type"),
            "amount"            => $request->input("amount"),
            "applicable_for"    => $request->input("applicable_for"),
            "reference_id"      => ($request->input("applicable_for") == 2) ? $request->input("reference_id") : 0,
            "from_date"         => date('Y-m-d', strtotime($request->input("from_date"))),
            "to_date"           => date('Y-m-d', strtotime($request->input("to_date"))),
            "active_status"     => $request->input("active_status"),
            "created_by"        => Auth::id()
        );


        $discountData = Discount::firstOrCreate($data);

        session()->flash('message', 'New Discount Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('discount');
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
        $discount = Discount::find($id);
        $discount->from_date = date('d-m-Y', strtotime($discount->from_date));
        $discount->to_date = date('d-m-Y', strtotime($discount->to_date));
        $allCustomers = $this->getCustomer();

        return view('admin.discount.edit', compact('discount', 'allSalesExecutives', 'allAirlines', 'allSectors', 'allPassengers', 'allAgencies', 'allUser', 'allCustomers', 'allNations'));
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
            "name"              => "required",
            "code"              => "required",
            "discount_type"     => "required",
            "amount"            => "required",
            "applicable_for"    => "required",
            "from_date"         => "required",
            "to_date"           => "required",
            "active_status"     => "required",
        ]);

        $data = array(
            "name"              => $request->input("name"),
            "code"              => $request->input("code"),
            "discount_type"     => $request->input("discount_type"),
            "amount"            => $request->input("amount"),
            "applicable_for"    => $request->input("applicable_for"),
            "reference_id"      => ($request->input("applicable_for") == 2) ? $request->input("reference_id") : 0,
            "from_date"         => date('Y-m-d', strtotime($request->input("from_date"))),
            "to_date"           => date('Y-m-d', strtotime($request->input("to_date"))),
            "active_status"     => $request->input("active_status"),
            "updated_by"        => Auth::id()
        );

        $DiscountData = Discount::where('id',$id)->update($data);

        session()->flash('message', 'Discount Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('discount');

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
