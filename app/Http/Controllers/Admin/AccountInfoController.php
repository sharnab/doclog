<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use App\Model\AccountInfo;
use App\Model\Customer;
use App\Model\Bank;
use App\Model\Branch;

class AccountInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountInfoList = AccountInfo::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.account_info.index',compact('accountInfoList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCustomers = $this->getCustomer();
        $allBanks = $this->getBank();
        $allBranches = $this->getBranch();
        return view('admin.account_info.create', compact('allCustomers', 'allBanks', 'allBranches'));
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
            "customer_id"   => "required|unique:account_info",
            "account_name"  => "required",
            "TIN"           => "required",
            "account_no"    => "required",
            "bank_id"       => "required",
            "branch_id"     => "required",
            "currency"      => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "customer_id"   => $request->input('customer_id'),
            "account_name"  => $request->input('account_name'),
            "TIN"           => $request->input('TIN'),
            "account_no"    => $request->input('account_no'),
            "bank_id"       => $request->input('bank_id'),
            "branch_id"     => $request->input('branch_id'),
            "currency"      => $request->input('currency'),
            "active_status" => $request->input('active_status'),
            "created_by"    => Auth::id()
        );

        $accountInfoData = AccountInfo::firstOrCreate($data);

        session()->flash('message', 'New Account Info Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('account_info');
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
        $account_info = AccountInfo::find($id);
        $allCustomers = $this->getCustomer();
        $allBanks = $this->getBank();
        $allBranches = $this->getBranch();
        return view('admin.account_info.edit', compact('account_info', 'allCustomers', 'allBanks', 'allBranches'));
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
            "customer_id"   => "required|unique:account_info,customer_id,$id",
            "account_name"  => "required",
            "TIN"           => "required",
            "account_no"    => "required",
            "bank_id"       => "required",
            "branch_id"     => "required",
            "currency"      => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "customer_id"   => $request->input('customer_id'),
            "account_name"  => $request->input('account_name'),
            "TIN"           => $request->input('TIN'),
            "account_no"    => $request->input('account_no'),
            "bank_id"       => $request->input('bank_id'),
            "branch_id"     => $request->input('branch_id'),
            "currency"      => $request->input('currency'),
            "active_status" => $request->input('active_status'),
            "updated_by"    => Auth::id()
        );

        $AccountInfoData = AccountInfo::where('id',$id)->update($data);

        session()->flash('message', 'Account Info Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('account_info');
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

    public function getBranchesByBank($id){
        // echo 'here';exit();
        $branchData['data'] = Branch::getBranchesByBank($id);

        echo json_encode($branchData);
        exit;
   }

}
