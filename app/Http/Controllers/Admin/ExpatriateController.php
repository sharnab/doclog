<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\Division;
use App\Model\Expat;
use App\Model\ExpatBdAddress;
use App\Model\ExpatBdBankAccount;
use App\Model\ExpatBmetInfo;
use App\Model\ExpatCurrentCountryAddress;
use App\Model\ExpatCurrentCountryBankAccount;
use App\Model\ExpatEmergencyContact;
use App\Model\ExpatEmploymentType;
use App\Model\ExpatMinistryApproval;
use App\Model\ExpatMotherCompany;
use App\Model\ExpatRecruitingAgency;
use App\Model\ExpatSalaryInfo;
use App\Model\ExpatSupplierCompany;
use App\Model\ExpatTravelHistory;
use App\Model\ExpatWorkPermit;
use App\Model\ExpatWorkPlace;
use App\Model\Gender;
use App\Model\ExpatPassport;
use App\Model\Religion;
use App\Model\ExpatVisaInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use Helper;
use App\Model\AppUser;
use Illuminate\Support\Facades\Validator;

class ExpatriateController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $userList = Expat::get();
        //$skillList = Skill::paginate(config('common.pagination.per_page'));
        // $userList = User::with('userGroup')->get();
        //print_r(json_encode($religionList));

        return view('admin.expatriate.index', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * Reference data
         * Country List
         * Gender
         * Religion
         * Social Media list
         */
        $religion = Religion::where('active_status', 1)->get()->toArray();
        $gender = Gender::where('active_status', 1)->get()->toArray();
        $countries = Country::whereIn('id', [26, 147])->get()->toArray();
        $country = Country::where('id', 181)->get()->toArray();
        $divisions = Division::where('active_status', 1)->get()->toArray();
        /**
         * call form wizard with reference data
         */
        return view('admin.expatriate.create', compact('religion', 'gender', 'countries', 'country', 'divisions'));
    }

    public function store(Request $request)
    {


        $rules = [
            "passport_number" => "required",
            "passport_expiry_date" => "required",
            "first_name" => "required",
            "visa_type" => "required",
            "visa_expiry_date" => "required",
        ];

        $request->validate($rules);

//        if($request->hasFile('profile_image'))
//        {
//            $img_path = $this->uploadFile($request,'profile_image','profile');
//            $items['image']=$img_path;
//        }

//        if($request->hasFile('profile_image'))
//        {
//            $img_path = $this->uploadFile($request,'profile_image','profile');
//            $items['image']=$img_path;
//        }

        /**
         * Check is passport Number exist
         */
//        $isExist     =Expat::where('passport_number',$request->input('passport_number'))->where('active_status',1)->count();
//
//        if($isExist||$isExist>0)
//        {
//            session()->flash('message', 'This passport already exist in the system');
//            session()->flash('class', '2');
//            return back();
//        }

        $expat_id = $this->processBasicInfo($request, 1);
        $this->processPassport($request, $expat_id, 1);
        $this->processVisa($request, $expat_id, 1);
        $this->processArrival($request, $expat_id, 1);
        $this->processBMET($request, $expat_id, 1);
        $this->processEmploymentType($request, $expat_id, 1);
        $this->processMinistryApproval($request, $expat_id, 1);
        $this->processWorkPermit($request, $expat_id, 1);
        $this->processWorkPlace($request, $expat_id, 1);
        $this->processMotherCompany($request, $expat_id, 1);
        $this->processSupplierCompany($request, $expat_id, 1);
        $this->processRecruitingAgency($request, $expat_id, 1);
        $this->processSalaryInfo($request, $expat_id, 1);
        $this->processCurrentCountryBankAccount($request, $expat_id, 1);
        $this->processBdBankAccount($request, $expat_id, 1);
        $this->processCurrentCountryAddress($request, $expat_id, 1);
        $this->processCurrentCountryEmergency($request, $expat_id, 1);
        $this->processBdPermanent($request, $expat_id, 1);
        $this->processBdPresent($request, $expat_id, 1);
        $this->processBdEmergency($request, $expat_id, 1);
        $this->processDocuments($request, $expat_id, 1);

        session()->flash('message', 'Successfully Submitted');
        session()->flash('class', '2');
        return redirect()->route('user');

    }

    /**
     * Edit view call with data
     *
     */
    public function edit($id)
    {
        $country_list = Country::all();
        $items = $this->getExpatInfo($id);

        return view('admin.passport.edit', compact('passport'));
    }

    private function processBasicInfo($request, $type = 1, $id = null)
    {
        /**
         * Get basic info data from request
         */

        $basic_data = $request->only([
            'first_name',
            'last_name',
            'father_name',
            'mother_name',
            'marital_status',
            'spouse_name',
            'nid',
            'nationality',
            'birth_country_id',
            'gender',
            'religion_id',
            'email',
            'mobile',
            'passport_number',
            'passport_issue_place',
            'facebook_id',
            'linkedin_id',
            'line_id',
            'whatsapp_id'
        ]);

        if ($request->has('date_of_birth')) {
            $basic_data['date_of_birth'] = date('Y-m-d', strtotime($request->input('date_of_birth')));
        }

        if ($request->has('passport_issue_date')) {
            $basic_data['passport_issue_date'] = date('Y-m-d', strtotime($request->input('passport_issue_date')));
        }

        if ($request->has('passport_expiry_date')) {
            $basic_data['passport_expiry_date'] = date('Y-m-d', strtotime($request->input('passport_expiry_date')));
        }

        if ($request->hasFile('profile_image')) {
            $img_path = $this->uploadFile($request, 'profile_image', 'profile');
            $basic_data['image'] = $img_path;
        }

        if ($request->hasFile('nid_image')) {
            $img_path = $this->uploadFile($request, 'nid_image', 'nid');
            $basic_data['nid_image'] = $img_path;
        }


        if ($type == 1) {
            //Insert
            $basic_data['active_status'] = 1;
            $basic_data['created_by'] = Auth::id();
            $basic_data['created_at'] = date('Y-m-d H:i:s');
            return Expat::insertGetId($basic_data);
        } else {
            //Update
            $basic_data['updated_by'] = Auth::id();
            $basic_data['updated_at'] = date('Y-m-d H:i:s');
            Expat::where('id', $id)->update($basic_data);
        }


    }

    private function processPassport($request, $expat_id, $type = 1, $id = null)
    {

        if ($request->hasFile('passport_file')) {
            $img_path = $this->uploadFile($request, 'passport_file', 'passport');
            $items['passport_file'] = $img_path;
        }

        $items['expat_id'] = $expat_id;
        $items['passport_number'] = $request->input('passport_number');

        if ($request->has('passport_issue_date')) {
            $items['issue_date'] = date('Y-m-d', strtotime($request->input('passport_issue_date')));
        }

        if ($request->has('passport_expiry_date')) {
            $items['expiry_date'] = date('Y-m-d', strtotime($request->input('passport_expiry_date')));
        }


        $items['issue_place'] = $request->input('passport_issue_place');

        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatPassport::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatPassport::where('id', $id)->update($items);
        }

    }

    private function processVisa($request, $expat_id, $type = 1, $id = null)
    {

        if ($request->hasFile('visa_file')) {
            $img_path = $this->uploadFile($request, 'visa_file', 'visa');
            $items['image'] = $img_path;
        }

        $items['expat_id'] = $expat_id;
        $items['visa_type'] = $request->input('visa_type');
        if ($request->has('visa_issue_date')) {
            $items['issue_date'] = date('Y-m-d', strtotime($request->input('visa_issue_date')));
        }

        if ($request->has('visa_expiry_date')) {
            $items['expiry_date'] = date('Y-m-d', strtotime($request->input('visa_expiry_date')));
        }

        $items['entry_type'] = $request->input('visa_entry_type');

        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatVisaInfo::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatVisaInfo::where('id', $id)->update($items);
        }

    }

    private function processArrival($request, $expat_id, $type = 1, $id = null)
    {
        if ($request->hasFile('immigration_endorsement_file')) {
            $img_path = $this->uploadFile($request, 'immigration_endorsement_file', 'immigration_endorsement');
            $items['immigration_endorsement_file'] = $img_path;
        }

        $items['expat_id'] = $expat_id;
        $items['travel_type'] = 1;
        $items['arrival_country_id'] = $request->input('arrival_country_id');
        if ($request->has('arrival_date')) {
            $items['date'] = date('Y-m-d', strtotime($request->input('arrival_date')));
        }
        $items['iata_code'] = $request->input('arrival_iata_code');
        if ($request->has('immigration_endorsement_date')) {
            $items['immigration_endorsement_date'] = date('Y-m-d', strtotime($request->input('immigration_endorsement_date')));
        }


        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatTravelHistory::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatTravelHistory::where('id', $id)->update($items);
        }

    }

    private function processBMET($request, $expat_id, $type = 1, $id = null)
    {
        if ($request->hasFile('bmet_file')) {
            $img_path = $this->uploadFile($request, 'bmet_file', 'bmet');
            $items['image'] = $img_path;
        }

        $items['expat_id'] = $expat_id;
        $items['bmet_number'] = $request->input('bmet_number');

        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatBmetInfo::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatBmetInfo::where('id', $id)->update($items);
        }

    }

    private function processEmploymentType($request, $expat_id, $type = 1, $id = null)
    {
        $items['expat_id'] = $expat_id;
        $items['worker_category_id'] = $request->input('worker_category_id');
        $items['worker_type_id'] = $request->input('worker_type_id');

        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatEmploymentType::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatEmploymentType::where('id', $id)->update($items);
        }

    }

    private function processMinistryApproval($request, $expat_id, $type = 1, $id = null)
    {

        if ($request->hasFile('ministry_approval_file')) {
            $img_path = $this->uploadFile($request, 'ministry_approval_file', 'ministry_approval');
            $items['image'] = $img_path;
        }

        $items['expat_id'] = $expat_id;
        $items['memo_number'] = $request->input('memo_number');
        if ($request->has('ministry_approval_issue_date')) {
            $items['issue_date'] = date('Y-m-d', strtotime($request->input('ministry_approval_issue_date')));

        }

        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatMinistryApproval::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatMinistryApproval::where('id', $id)->update($items);
        }

    }

    private function processWorkPermit($request, $expat_id, $type = 1, $id = null)
    {

        if ($request->hasFile('work_permit_file')) {
            $img_path = $this->uploadFile($request, 'work_permit_file', 'work_permit');
            $items['image'] = $img_path;
        }

        $items['expat_id'] = $expat_id;
        $items['permit_number'] = $request->input('work_permit_number');

        if ($request->has('work_permit_issue_date')) {
            $items['issue_date'] = date('Y-m-d', strtotime($request->input('work_permit_issue_date')));
        }

        if ($request->has('work_permit_expiry_date')) {
            $items['expiry_date'] = date('Y-m-d', strtotime($request->input('work_permit_expiry_date')));
        }


        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatWorkPermit::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatWorkPermit::where('id', $id)->update($items);
        }

    }

    private function processWorkPlace($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['email'] = $request->input('work_place_email');
        $items['mobile'] = $request->input('work_place_mobile');
        $items['address'] = $request->input('work_place_address');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatWorkPlace::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatWorkPlace::where('id', $id)->update($items);
        }

    }

    private function processMotherCompany($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['name'] = $request->input('mother_company_name');
        $items['business_type'] = $request->input('mother_company_business_type');
        $items['email'] = $request->input('mother_company_email');
        $items['mobile'] = $request->input('mother_company_mobile');
        $items['address'] = $request->input('mother_company_address');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatMotherCompany::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatMotherCompany::where('id', $id)->update($items);
        }

    }

    private function processSupplierCompany($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['name'] = $request->input('supplier_company_name');
        $items['business_type'] = $request->input('supplier_company_business_type');
        $items['email'] = $request->input('supplier_company_email');
        $items['mobile'] = $request->input('supplier_company_mobile');
        $items['address'] = $request->input('supplier_company_address');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatSupplierCompany::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatSupplierCompany::where('id', $id)->update($items);
        }

    }

    private function processRecruitingAgency($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['name'] = $request->input('recruiting_agency_name');
        $items['rl_number'] = $request->input('recruiting_agency_rl_number');
        $items['email'] = $request->input('recruiting_agency_email');
        $items['mobile'] = $request->input('recruiting_agency_mobile');
        $items['address'] = $request->input('recruiting_agency_address');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatRecruitingAgency::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatRecruitingAgency::where('id', $id)->update($items);
        }

    }

    private function processSalaryInfo($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['amount'] = $request->input('salary_amount');
        $items['currency_id'] = $request->input('salary_currency_id');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatSalaryInfo::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatSalaryInfo::where('id', $id)->update($items);
        }

    }

    private function processCurrentCountryBankAccount($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['account_name'] = $request->input('current_country_bank_account_name');
        $items['account_number'] = $request->input('current_country_bank_account_number');
        $items['bank_name'] = $request->input('current_country_bank_name');
        $items['branch_name'] = $request->input('current_country_branch_name');
        $items['routing_number'] = $request->input('current_country_routing_number');
        $items['swift'] = $request->input('current_country_swift');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatCurrentCountryBankAccount::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatCurrentCountryBankAccount::where('id', $id)->update($items);
        }

    }

    private function processBdBankAccount($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['account_name'] = $request->input('bd_bank_account_name');
        $items['account_number'] = $request->input('bd_bank_account_number');
        $items['bank_name'] = $request->input('bd_bank_name');
        $items['branch_name'] = $request->input('bd_branch_name');
        $items['routing_number'] = $request->input('bd_routing_number');
        $items['swift'] = $request->input('bd_swift');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatBdBankAccount::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatBdBankAccount::where('id', $id)->update($items);
        }

    }

    private function processCurrentCountryAddress($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['flat_number'] = $request->input('cur_country_addr_flat_number');
        $items['holding_number'] = $request->input('cur_country_addr_holding_number');
        $items['street'] = $request->input('cur_country_addr_street_number');
        $items['area'] = $request->input('cur_country_addr_area');
        $items['post_code'] = $request->input('cur_country_addr_post_code');
        $items['city'] = $request->input('cur_country_addr_city');
        $items['country_id'] = $request->input('cur_country_addr_country_id');
        $items['email'] = $request->input('cur_country_addr_email');
        $items['mobile'] = $request->input('cur_country_addr_mobile');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatCurrentCountryAddress::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatCurrentCountryAddress::where('id', $id)->update($items);
        }

    }

    private function processCurrentCountryEmergency($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['contact_type'] = 1;
        $items['name'] = $request->input('cur_country_emergency_name');
        $items['relation'] = $request->input('cur_country_emergency_relation');
        $items['email'] = $request->input('cur_country_emergency_email');
        $items['mobile'] = $request->input('cur_country_emergency_mobile');
        $items['address'] = $request->input('cur_country_emergency_address');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatEmergencyContact::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatEmergencyContact::where('id', $id)->update($items);
        }

    }

    private function processBdPermanent($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['location_type'] = 1;
        $items['address_type'] = 2; //permanent Address
        $items['address'] = $request->input('bd_per_address');
        $items['division_id'] = $request->input('bd_per_division_id');
        $items['district_id'] = $request->input('bd_per_district_id');
        $items['upazila_id'] = $request->input('bd_per_upazila_id');
        $items['union_id'] = $request->input('bd_per_union_id');
        $items['area'] = $request->input('bd_per_area');
        $items['post_office'] = $request->input('bd_per_post_office');
        $items['street'] = $request->input('bd_per_street');
        $items['email'] = $request->input('bd_per_email');
        $items['mobile'] = $request->input('bd_per_mobile');

        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatBdAddress::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatBdAddress::where('id', $id)->update($items);
        }

    }

    private function processBdPresent($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['location_type'] = 1;
        $items['address_type'] = 1;
        $items['address'] = $request->input('bd_present_address');
        $items['division_id'] = $request->input('bd_present_division_id');
        $items['district_id'] = $request->input('bd_present_district_id');
        $items['upazila_id'] = $request->input('bd_present_upazila_id');
        $items['union_id'] = $request->input('bd_present_union_id');
        $items['area'] = $request->input('bd_present_area');
        $items['post_office'] = $request->input('bd_present_post_office');
        $items['street'] = $request->input('bd_present_street');
        $items['email'] = $request->input('bd_present_email');
        $items['mobile'] = $request->input('bd_present_mobile');

        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatBdAddress::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatBdAddress::where('id', $id)->update($items);
        }

    }

    private function processBdEmergency($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['contact_type'] = 2;
        $items['name'] = $request->input('bd_emergency_name');
        $items['relation'] = $request->input('bd_emergency_relation');
        $items['email'] = $request->input('bd_emergency_email');
        $items['mobile'] = $request->input('bd_emergency_mobile');
        $items['address'] = $request->input('bd_emergency_address');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatEmergencyContact::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatEmergencyContact::where('id', $id)->update($items);
        }

    }

    private function processDocuments($request, $expat_id, $type = 1, $id = null)
    {

        $items['expat_id'] = $expat_id;
        $items['contact_type'] = 2;
        $items['name'] = $request->input('bd_emergency_name');
        $items['relation'] = $request->input('bd_emergency_relation');
        $items['email'] = $request->input('bd_emergency_email');
        $items['mobile'] = $request->input('bd_emergency_mobile');
        $items['address'] = $request->input('bd_emergency_address');
        if ($type == 1) {
            //Insert data
            $items['active_status'] = 1;
            $items['created_by'] = Auth::id();
            $items['created_at'] = date('Y-m-d H:i:s');
            return ExpatEmergencyContact::insert($items);
        } else {
            //Update data
            // $items['active_status']=1;
            $items['updated_by'] = Auth::id();
            $items['updated_at'] = date('Y-m-d H:i:s');
            return ExpatEmergencyContact::where('id', $id)->update($items);
        }

    }


    private function getExpatInfo($expat_id)
    {

        /**
         * Relational Array
         */
        $withArray = ['religion','visa', 'arrival', 'bmet', 'employmentType', 'ministryApproval', 'workPermit',
            'workPlace', 'motherCompany', 'supplierCompany', 'recruitingAgency', 'salaryInfo',
            'currentCountryBankAccount', 'bdBankAccount', 'currentCountryAddress', 'currentCountryEmergency',
            'bdEmergency'];
        /**
         * Get Expat Basic with relational data
         */
        $items = Expat::with($withArray)->where('id', $expat_id)->get();

        if (empty($items)) {
            return false;
        }

        $items = $items->toArray();

        $item = $items[0];
        /**
         * add bd present address
         */
        $item['bdPresentAddress'] = $this->getExpatBdPresentAddress($expat_id);
        $item['bdPermanentAddress'] = $this->getExpatBdPermanentAddress($expat_id);

        return $item;

    }

    private function getExpatBdPresentAddress($expat_id)
    {
        $with_array = [
            'division', 'district', 'cityCorporation', 'municipal', 'upazila', 'union'
        ];

        $items = ExpatBdAddress::with($with_array)->where('expat_id', $expat_id)->where('address_type', 1)->get();

        if (empty($items)) {
            return [];
        }

        $items = $items->toArray();
        return $items[0];

    }

    private function getExpatBdPermanentAddress($expat_id)
    {
        $with_array = [
            'division', 'district', 'cityCorporation', 'municipal', 'upazila', 'union'
        ];

        $items = ExpatBdAddress::with($with_array)->where('expat_id', $expat_id)->where('address_type', 2)->get();

        if (empty($items)) {
            return [];
        }

        $items = $items->toArray();
        return $items[0];

    }


    private function uploadFile($request, $file_name, $folder_name)
    {

        $passport_img_path = '';
        $path = public_path('uploads/' . $folder_name);
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $image_name = time() . '.' . $request->$file_name->getClientOriginalExtension();

        if ($image_name) {
            request()->$file_name->move($path, $image_name);
            // request()->file($file_name)->move($path, $image_name);
            $passport_img_path = "uploads/" . $folder_name . "/" . $image_name;
        }

        return $passport_img_path;

    }



//    public function store(Request $request)
//    {
//
//
//        $rules =[
//            "passport_number"         => "required",
//            "passport_expiry_date"          => "required",
//            "first_name"          => "required",
//            "visa_type"          => "required",
//            "visa_expiry_date"          => "required",
//        ];
//        //$request->validate($rules);
//
//        $validator = Validator::make($request->all(), $rules);
//        if ($validator->fails())
//        {
//            // if validation fail
//            $errors = $validator->messages()->toArray();
//            return $this->respondWithValidationError($errors);
//        }
//
//        /**
//         * Check is passport Number exist
//         */
//        $isExist     =Expatriate::where('passport_number',$request->input('passport_number'))->where('active_status',1)->count();
//
//        if($isExist||$isExist>0)
//        {
//            //$this->respondWithError('This person is already exist');
//            session()->flash('message', 'This passport already exist in the system');
//            session()->flash('class', '2');
//            return redirect()->route('education_create');
//        }
//
//        /**
//         * Get basic info data from request
//         */
//
//        $basic_data= $request->only([
//            'first_name',
//            'last_name',
//            'father_name',
//            'mother_name',
//            'marital_status',
//            'spouse_name',
//            'nid',
//            'nationality',
//            'date_of_birth',
//            'birth_country_id',
//            'gender',
//            'religion_id',
//            'email',
//            'mobile',
//            'passport_number',
//            'passport_issue_date',
//            'passport_expiry_date',
//            'passport_issue_place',
//            'facebook_id',
//            'linkedin_id',
//            'line_id',
//            'whatsapp_id'
//        ]);
//
//        $basic_data['active_status']=1;
//        $basic_data['created_by']=Auth::id();
//        $basic_data['created_at']=date('Y-m-d H:i:s');
//
//        /**
//         * Insert Into Expatriate table and get ID
//         */
//
//        $id = Expatriate::insertGetId($basic_data);
//
//        /**
//         * Passport image uploading
//         */
//
//        $passport_img_path=null;
//        if($request->hasFile('image'))
//        {
//            $passport_img_path = '';
//            $path = public_path('uploads/passport_images/passport');
//            if(!File::exists($path)) {
//                File::makeDirectory($path, $mode = 0777, true, true);
//            }
//
//            $image_name = time().'.'.$request->image->getClientOriginalExtension();
//
//            if($image_name){
//                request()->image->move($path, $image_name);
//                $passport_img_path = "uploads/passport_images/passport/" . $image_name;
//            }
//        }
//        $passport_data['expat_id']=$id;
//        $passport_data['image']=$passport_img_path;
//        $passport_data['passport_number'] = $basic_data['passport_number'];
//        $passport_data['passport_issue_date'] = $basic_data['passport_issue_date'];
//        $passport_data['passport_expiry_date'] = $basic_data['passport_expiry_date'];
//        $passport_data['passport_issue_place'] = $basic_data['passport_issue_place'];
//        $passport_data['active_status']=1;
//        $passport_data['created_by']=Auth::id();
//        $passport_data['created_at']=date('Y-m-d H:i:s');
//
//        Passport::insert($passport_data);
//
//        $expatriate_info =Expatriate::find($id);
//
//        return $this->respondWithSuccess('Inserted Successfully',$expatriate_info);
//
//    }


//    public function addVisaInfo(Request $request)
//    {
//
//        $rules =[
//            "visa_type"   => "required",
//            "expiry_date"       => "required",
//            "first_name"        => "required",
//            "expat_id"          => "required",
//        ];
//        //$request->validate($rules);
//
//        $validator = Validator::make($request->all(), $rules);
//        if ($validator->fails())
//        {
//            // if validation fail
//            $errors = $validator->messages()->toArray();
//            return $this->respondWithValidationError($errors);
//        }
//
//        /**
//         * Check is passport Number exist
//         */
//        $isExist     =VisaInfo::where('passport_number',$request->input('passport_number'))->where('active_status',1)->count();
//
//        if(!$isExist)
//        {
//            session()->flash('message', 'This passport already exist in the system');
//            session()->flash('class', '2');
//            return redirect()->route('education_create');
//        }
//
//        /**
//         * Get basic info data from request
//         */
//
//        $basic_data= $request->only([
//            'first_name',
//            'last_name',
//            'father_name',
//            'mother_name',
//            'marital_status',
//            'spouse_name',
//            'nid',
//            'nationality',
//            'date_of_birth',
//            'birth_country_id',
//            'gender',
//            'religion_id',
//            'email',
//            'mobile',
//            'passport_number',
//            'passport_issue_date',
//            'passport_expiry_date',
//            'passport_issue_place',
//            'facebook_id',
//            'linkedin_id',
//            'line_id',
//            'whatsapp_id'
//        ]);
//
//        $basic_data['active_status']=1;
//        $basic_data['created_by']=Auth::id();
//        $basic_data['created_at']=date('Y-m-d H:i:s');
//
//        /**
//         * Insert Into Expatriate table and get ID
//         */
//
//        $id = Expatriate::insertGetId($basic_data);
//
//        /**
//         * Insert passport data
//         */
//        $passport_data['expat_id']=$id;
//        $passport_data['passport_number'] = $basic_data['passport_number'];
//        $passport_data['passport_issue_date'] = $basic_data['passport_issue_date'];
//        $passport_data['passport_expiry_date'] = $basic_data['passport_expiry_date'];
//        $passport_data['passport_issue_place'] = $basic_data['passport_issue_place'];
//        $passport_data['active_status']=1;
//        $passport_data['created_by']=Auth::id();
//        $passport_data['created_at']=date('Y-m-d H:i:s');
//
//        Passport::insert($passport_data);
//
//        $expatriate_info =Expatriate::find($id);
//
//        return $this->respondWithSuccess('Inserted Successfully',$expatriate_info);
//
//
//    }


    /**
     * Display the specified resource.
     *
     * @param \App\Model\AssetType $assetType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country_list = $this->getCountryList();
        $item = $this->getExpatInfo($id);

        return view('admin.expatriate.view', compact('item', 'country_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\AssetType $assetType
     * @return \Illuminate\Http\Response
     */

    private function getCountryList()
    {
        $country_list = Country::all();

        $list=[];
        foreach($country_list as $value)
        {
            $list[$value->id]=$value->title;
        }

        return $list;
    }


}
