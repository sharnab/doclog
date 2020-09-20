<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Collection;
use App\Model\PaymentType;
use App\Model\Booking;
use App\Model\Bank;
use App\Model\Branch;
use Illuminate\Support\Facades\Auth;


class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectionsList = Collection::get();
        return view('admin.collection.index', compact('collectionsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allPaymentTypes = $this->getPaymentTypes();
        $allBookings = $this->getBookings();
        $allBanks = $this->getBank();
        $allBranches = $this->getBranch();
        return view('admin.collection.create', compact('allBookings', 'allBanks', 'allBranches', 'allPaymentTypes'));
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
            "booking_id"        => 'required',
            "collection_amount" => 'required',
            "collection_date"   => 'required',
            "payment_type"      => 'required',
            "active_status"     => 'required',
        ]);
        if($request->input('payment_type') == 2){
            $validatedData = $request->validate([
                "bank_id"           => 'required',
                "branch_ref_id"     => 'required',
                "transaction_id"    => 'required',
            ]);
        }
        if($request->input('payment_type') == 3){
            $validatedData = $request->validate([
                "card_payment_ref_id"   => 'required',
                "transaction_id"        => 'required',
            ]);
        }
        if($request->input('payment_type') == 4){
            $validatedData = $request->validate([
                "mobile_ref_id"     => 'required',
                "transaction_id"    => 'required',
            ]);
        }

        $data = array(
            "booking_id"                    => $request->input('booking_id'),
            "payment_type"                  => $request->input('payment_type'),
            "deposit_account"               => $request->input('deposit_account'),
            "currency_id"                   => $request->input('currency_id'),
            "converted_collection_amount"   => $request->input('converted_collection_amount'),
            "collection_amount"             => $request->input('collection_amount'),
            "collection_date"               => date('Y-m-d',strtotime($request->input('collection_date'))),
            "remarks"                       => $request->input('remarks'),
            "active_status"                 => $request->input('active_status'),
            "created_by"                    => Auth::id()
        );

        if($request->input('payment_type')==1){
            $data["payment_ref_id"] = $request->input('cash_ref_id');
            $data["transaction_id"] = '';
        }
        elseif($request->input('payment_type')==2){
            $data["payment_ref_id"] = $request->input('branch_ref_id');
            $data["transaction_id"] = $request->input('transaction_id');

        }
        elseif($request->input('payment_type')==3){
            $data["payment_ref_id"] = $request->input('card_payment_ref_id');
            $data["transaction_id"] = $request->input('transaction_id');
        }
        elseif($request->input('payment_type')==4){
            $data["payment_ref_id"] = $request->input('mobile_ref_id');
            $data["transaction_id"] = $request->input('transaction_id');
        }

        $collectionData = Collection::firstOrCreate($data);

        session()->flash('message', 'New Collection Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('collection.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allPaymentTypes = $this->getPaymentTypes();
        $allBookings = $this->getBookings();
        $allBanks = $this->getBank();
        $allBranches = $this->getBranch();
        $collection = Collection::find($id);
        if($collection->payment_type == 1){
            $collection->cash_ref_id = $collection->payment_ref_id;
        }
        elseif($collection->payment_type == 2){
            $collection->branch_ref_id = $collection->payment_ref_id;
        }
        elseif($collection->payment_type == 3){
            $collection->card_payment_ref_id = $collection->payment_ref_id;
        }
        elseif($collection->payment_type == 4){
            $collection->mobile_ref_id = $collection->payment_ref_id;
        }
        return view('admin.collection.edit',compact('collection', 'allBookings', 'allBanks', 'allBranches', 'allPaymentTypes'));
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
        $validatedData = $request->validate([
            "booking_id"        => 'required',
            "collection_amount" => 'required',
            "collection_date"   => 'required',
            "payment_type"      => 'required',
            "active_status"     => 'required',
        ]);
        if($request->input('payment_type') == 2){
            $validatedData = $request->validate([
                "bank_id"           => 'required',
                "branch_ref_id"     => 'required',
                "transaction_id"    => 'required',
            ]);
        }
        if($request->input('payment_type') == 3){
            $validatedData = $request->validate([
                "card_payment_ref_id"   => 'required',
                "transaction_id"        => 'required',
            ]);
        }
        if($request->input('payment_type') == 4){
            $validatedData = $request->validate([
                "mobile_ref_id"     => 'required',
                "transaction_id"    => 'required',
            ]);
        }

        $data = array(
            "booking_id"                    => $request->input('booking_id'),
            "payment_type"                  => $request->input('payment_type'),
            "deposit_account"               => $request->input('deposit_account'),
            "currency_id"                   => $request->input('currency_id'),
            "converted_collection_amount"   => $request->input('converted_collection_amount'),
            "collection_amount"             => $request->input('collection_amount'),
            "collection_date"               => date('Y-m-d',strtotime($request->input('collection_date'))),
            "remarks"                       => $request->input('remarks'),
            "active_status"                 => $request->input('active_status'),
            "updated_by"                    => Auth::id()
        );

        if($request->input('payment_type')==1){
            $data["payment_ref_id"] = $request->input('cash_ref_id');
            $data["transaction_id"] = '';
        }
        elseif($request->input('payment_type')==2){
            $data["payment_ref_id"] = $request->input('branch_ref_id');
            $data["transaction_id"] = $request->input('transaction_id');
        }
        elseif($request->input('payment_type')==3){
            $data["payment_ref_id"] = $request->input('card_payment_ref_id');
            $data["transaction_id"] = $request->input('transaction_id');
        }
        elseif($request->input('payment_type')==4){
            $data["payment_ref_id"] = $request->input('mobile_ref_id');
            $data["transaction_id"] = $request->input('transaction_id');
        }

        $CollectionData = Collection::where('id',$id)->update($data);

        session()->flash('message', 'Collection Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('collection.index');
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

    private function getPaymentTypes()
    {
        $PaymentTypesData = PaymentType::all();
        $allPaymentTypes = array();
        foreach ($PaymentTypesData as $PaymentType)
        {
            $allPaymentTypes[$PaymentType->id]=$PaymentType->name ;
        }

        return $allPaymentTypes;
    }

    private function getBookings()
    {
        $BookingsData = Booking::where('has_invoice',1)->select('id','invoice_number')->get();
        $allBookings = array();
        foreach ($BookingsData as $Booking)
        {
            $allBookings[$Booking->id]=$Booking->invoice_number ;
        }

        return $allBookings;
    }

    private function getBank()
    {
        $allBanks = Bank::all();
        $allBanksData = array();
        foreach ($allBanks as $bank)
        {
            $allBanksData[$bank->id]=$bank->name ;
        }

        return $allBanksData;
    }

    private function getBranch()
    {
        $allBranches = Branch::all();
        $allBranchesData = array();
        foreach ($allBranches as $branch)
        {
            $allBranchesData[$branch->id]=$branch->name ;
        }

        return $allBranchesData;
    }

    public function getDataById($id){

        $branchData['data'] = Branch::getBranchesByBank($id);
        echo json_encode($branchData);
   }


}
