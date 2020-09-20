<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Passport_images;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\Customer;
use App\Model\User;
use App\Model\CustomerType;
use App\Model\Company;

use Helper; // Important

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerList = Customer::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.customer.index',compact('customerList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $allCustomerTypes = $this->getCustomerTypes();
        $allSalesExecutives = $this->getSalesExecutives();
        $allCompanies = $this->getCompanies();
        $allNations = Helper::nationList();
        // print_r(Helper::nationList());die();
        // return view('admin.customer.create',compact('allUserGroup'));
        return view('admin.customer.create', compact('allCustomerTypes', 'allNations', 'allSalesExecutives', 'allCompanies'));
    }

    private function getCustomerTypes()
    {
        $allCustomerType = CustomerType::all();
        $allTypes = array();
        foreach ($allCustomerType as $type)
        {
            $allTypes[$type->id]=$type->name ;
        }

        return $allTypes;
    }

    private function getSalesExecutives()
    {
        $allExecutives = User::all();
        $allSalesExecutives = array();
        foreach ($allExecutives as $salesExecutive)
        {
            $allSalesExecutives[$salesExecutive->id]=$salesExecutive->full_name ;
        }

        return $allSalesExecutives;
    }

    private function getCompanies()
    {
        $allCompanyData = Company::all();
        $allCompanies = array();
        foreach ($allCompanyData as $Company)
        {
            $allCompanies[$Company->id]=$Company->name ;
        }

        return $allCompanies;
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
            "type"                  => "required",
            "sur_name"              => "required",
            "given_name"            => "required",
            "billing_address"       => "required",
            "contact_no"            => "required|unique:customers|max:15|min:7",
            "personal_no"           => "unique:customers|max:15|min:7",
            "passport_no"           => "required|unique:customers",
            "previous_passport_no"  => "unique:customers",
            "active_status"         => "required",
        ]);

        $passport_img_path = '';
        $path = public_path('uploads/passport_images/customer');
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        $image_name = time().'.'.$request->image->getClientOriginalExtension();

        if($image_name){
            request()->image->move($path, $image_name);
            $passport_img_path = "uploads/passport_images/customer/" . $image_name;
        }

        $data = array(
            "type"                  => $request->input('type'),
            "company_id"            => ($request->input('company_id'))?$request->input('company_id'):'',
            "sur_name"              => $request->input('sur_name'),
            "given_name"            => $request->input('given_name'),
            "customer_type_id"      => $request->input('customer_type_id'),
            "contact_no"            => $request->input('contact_no'),
            "personal_no"           => $request->input('personal_no'),
            "nationality"           => $request->input('nationality'),
            "gender"                => $request->input('gender'),
            "place_of_birth"        => $request->input('place_of_birth'),
            "date_of_birth"         => date('Y-m-d', strtotime($request->input('date_of_birth'))),
            "passport_no"           => $request->input('passport_no'),
            "passport_image"        => $passport_img_path,
            "date_of_issue"         => date('Y-m-d', strtotime($request->input('date_of_issue'))),
            "date_of_expire"        => date('Y-m-d', strtotime($request->input('date_of_expire'))),
            "issuing_authority"     => $request->input('issuing_authority'),
            "previous_passport_no"  => $request->input('previous_passport_no'),
            "emergency_name"        => $request->input('emergency_name'),
            "emergency_contact"     => $request->input('emergency_contact'),
            "emergency_relation"    => $request->input('emergency_relation'),
            "emergency_address"     => $request->input('emergency_address'),
            "billing_address"       => $request->input('billing_address'),
            "sales_executive_id"    => $request->input('sales_executive_id'),
            "active_status"         => $request->input('active_status'),
            "created_by"            => Auth::id()
        );

        $customerData = Customer::firstOrCreate($data);

        session()->flash('message', 'New Customer Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('customer');
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
        $customer = Customer::find($id);
        $customer->date_of_birth = date('d-m-Y', strtotime($customer->date_of_birth));
        $customer->date_of_issue = date('d-m-Y', strtotime($customer->date_of_issue));
        $customer->date_of_expire = date('d-m-Y', strtotime($customer->date_of_expire));
        $allCustomerTypes = $this->getCustomerTypes();
        $allSalesExecutives = $this->getSalesExecutives();
        $allCompanies = $this->getCompanies();
        $allNations = Helper::nationList();

        return view('admin.customer.edit', compact('customer', 'allCustomerTypes', 'allNations', 'allSalesExecutives', 'allCompanies'));
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
            "type"                 => "required",
            "sur_name"             => "required",
            "given_name"           => "required",
            "billing_address"      => "required",
            "contact_no"           => "required|max:15|min:7|unique:customers,contact_no,$id",
            "personal_no"          => "max:15|min:7|unique:customers,personal_no,$id",
            "passport_no"          => "required|unique:customers,passport_no,$id",
            "previous_passport_no" => "unique:customers,previous_passport_no,$id",
            "active_status"        => "required",
        ]);

        if(Input::get('delete')){
            $del = Customer::find($id);
            File::delete($del->passport_image);
            $data = array("passport_image" => '',);
            $customerData = Customer::where('id',$id)->update($data);

            session()->flash('message', 'Passport image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('customer_edit', $id);
        }
        else {
            $passport_img_path = '';

            if(!empty($request->image)){
                $path = public_path('uploads/passport_images/customer');
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                ]);
                $image_name = time().'.'.$request->image->getClientOriginalExtension();

                if($image_name){
                    request()->image->move($path, $image_name);
                    $passport_img_path = "uploads/passport_images/customer/" . $image_name;
                }
            }

            $data = array(
                "type"                  => $request->input('type'),
                "company_id"            => ($request->input('company_id'))?$request->input('company_id'):'',
                "sur_name"              => $request->input('sur_name'),
                "given_name"            => $request->input('given_name'),
                "customer_type_id"      => $request->input('customer_type_id'),
                "contact_no"            => $request->input('contact_no'),
                "personal_no"           => $request->input('personal_no'),
                "nationality"           => $request->input('nationality'),
                "gender"                => $request->input('gender'),
                "place_of_birth"        => $request->input('place_of_birth'),
                "date_of_birth"         => date('Y-m-d', strtotime($request->input('date_of_birth'))),
                "passport_no"           => $request->input('passport_no'),
                "date_of_issue"         => date('Y-m-d', strtotime($request->input('date_of_issue'))),
                "date_of_expire"        => date('Y-m-d', strtotime($request->input('date_of_expire'))),
                "issuing_authority"     => $request->input('issuing_authority'),
                "previous_passport_no"  => $request->input('previous_passport_no'),
                "emergency_name"        => $request->input('emergency_name'),
                "emergency_contact"     => $request->input('emergency_contact'),
                "emergency_relation"    => $request->input('emergency_relation'),
                "emergency_address"     => $request->input('emergency_address'),
                "billing_address"       => $request->input('billing_address'),
                "sales_executive_id"    => $request->input('sales_executive_id'),
                "active_status"         => $request->input('active_status'),
                "updated_by"            => Auth::id()
            );

            if($passport_img_path){
                $data["passport_image"] = $passport_img_path;
            }

            $customerData = Customer::where('id',$id)->update($data);

            session()->flash('message', 'Customer Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('customer');
        }
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
