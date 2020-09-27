<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\Division;
use App\Model\Expatriate;
use App\Model\Gender;
use App\Model\Passport;
use App\Model\Religion;
use App\Model\VisaInfo;
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
        $userList = Expatriate::get();
        //$skillList = Skill::paginate(config('common.pagination.per_page'));
        // $userList = User::with('userGroup')->get();
        //print_r(json_encode($religionList));

        return view('admin.expatriate.index',compact('userList'));
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
        $religion=Religion::where('active_status',1)->get()->toArray();
        $gender=Gender::where('active_status',1)->get()->toArray();
        $countries=Country::whereIn('id',[26,147])->get()->toArray();
        $country=Country::where('id',181)->get()->toArray();
        $division=Division::where('active_status',1)->get()->toArray();
        /**
         * call form wizard with reference data
         */
         return view('admin.expatriate.create', compact('religion','gender','countries','country'));
    }

    public function store(Request $request)
    {


        $rules =[
            "passport_number"         => "required",
            "passport_expiry_date"          => "required",
            "first_name"          => "required",
            "visa_type"          => "required",
            "visa_expiry_date"          => "required",
        ];
        $request->validate($rules);


        /**
         * Check is passport Number exist
         */
        $isExist     =Expatriate::where('passport_number',$request->input('passport_number'))->where('active_status',1)->count();

        if($isExist||$isExist>0)
        {
            session()->flash('message', 'This passport already exist in the system');
            session()->flash('class', '2');
            return redirect()->route('education_create');
        }

        $expat_id = $this->processBasicInfo($request,1);
        $this->processPassport($request,$expat_id,1);
        $this->processVisa($request,$expat_id,1);
        $this->processArrival($request,$expat_id,1);

    }

    private function processBasicInfo($request,$type=1,$id=null)
    {
        /**
         * Get basic info data from request
         */

        $basic_data= $request->only([
            'first_name',
            'last_name',
            'father_name',
            'mother_name',
            'marital_status',
            'spouse_name',
            'nid',
            'nationality',
            'date_of_birth',
            'birth_country_id',
            'gender',
            'religion_id',
            'email',
            'mobile',
            'passport_number',
            'passport_issue_date',
            'passport_expiry_date',
            'passport_issue_place',
            'facebook_id',
            'linkedin_id',
            'line_id',
            'whatsapp_id'
        ]);

        $basic_data['active_status']=1;

        if($type==1)
        {
            //Insert
            $basic_data['created_by']=Auth::id();
            $basic_data['created_at']=date('Y-m-d H:i:s');
            return Expatriate::insertGetId($basic_data);
        }else{
            //Update
            $basic_data['updated_by']=Auth::id();
            $basic_data['updated_at']=date('Y-m-d H:i:s');
            Expatriate::where('id',$id)->update($basic_data);
        }


    }

    private function processPassport($request,$expat_id,$type=1,$id=null)
    {

        if($request->hasFile('passport_file'))
        {
            $img_path = $this->uploadFile($request,'passport_file','passport');
            $items['passport_file']=$img_path;
        }

        $items['expat_id']=$expat_id;
        $items['passport_number'] = $request->input('passport_number');
        $items['passport_issue_date'] = $request->input('passport_issue_date');
        $items['passport_expiry_date'] = $request->input('passport_expiry_date');
        $items['passport_issue_place'] = $request->input('passport_issue_place');

        if($type==1)
        {
            //Insert data
            $items['active_status']=1;
            $items['created_by']=Auth::id();
            $items['created_at']=date('Y-m-d H:i:s');
            return VisaInfo::insert($items);
        }else{
            //Update data
            // $items['active_status']=1;
            $items['updated_by']=Auth::id();
            $items['updated_at']=date('Y-m-d H:i:s');
            return VisaInfo::where('id',$id)->update($items);
        }

    }

    private function processVisa($request,$expat_id,$type=1,$id=null)
    {

        if($request->hasFile('visa_file'))
        {
            $img_path = $this->uploadFile($request,'visa_file','visa');
            $items['visa_file']=$img_path;
        }

        $items['expat_id']=$expat_id;
        $items['visa_type']=$request->input('visa_type');
        $items['issue_date']=$request->input('visa_issue_date');
        $items['expiry_date']=$request->input('visa_expiry_date');
        $items['entry_type']=$request->input('visa_entry_type');

        if($type==1)
        {
            //Insert data
            $items['active_status']=1;
            $items['created_by']=Auth::id();
            $items['created_at']=date('Y-m-d H:i:s');
           return VisaInfo::insert($items);
        }else{
            //Update data
           // $items['active_status']=1;
            $items['updated_by']=Auth::id();
            $items['updated_at']=date('Y-m-d H:i:s');
           return VisaInfo::where('id',$id)->update($items);
        }

    }

    private function processArrival($request,$expat_id,$type=1,$id=null)
    {
        if($request->hasFile('arrival_immigration_endorsement_file'))
        {
            $img_path = $this->uploadFile($request,'arrival_immigration_endorsement_file','immigration_endorsement');
            $items['immigration_endorsement_file']=$img_path;
        }

        $items['expat_id']=$expat_id;
        $items['travel_type']=$request->input('travel_type');
        $items['arrival_country_id']=$request->input('arrival_country_id');
        $items['date']=date('Y-m-d',strtotime($request->input('arrival_date')));
        $items['iata_code']=$request->input('arrival_iata_code');
        $items['immigration_endorsement_date']=date('Y-m-d',strtotime($request->input('immigration_endorsement_date')));


        if($type==1)
        {
            //Insert data
            $items['active_status']=1;
            $items['created_by']=Auth::id();
            $items['created_at']=date('Y-m-d H:i:s');
            return VisaInfo::insert($items);
        }else{
            //Update data
            // $items['active_status']=1;
            $items['updated_by']=Auth::id();
            $items['updated_at']=date('Y-m-d H:i:s');
            return VisaInfo::where('id',$id)->update($items);
        }

    }





    
    private function uploadFile($request,$file_name,$folder_name)
    {

        $passport_img_path = '';
        $path = public_path('uploads/'.$folder_name);
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $image_name = time().'.'.$request->$file_name->getClientOriginalExtension();

        if($image_name){
            request()->image->move($path, $image_name);
            $passport_img_path = "uploads/".$folder_name."/" . $image_name;
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
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.app_user.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */


}
