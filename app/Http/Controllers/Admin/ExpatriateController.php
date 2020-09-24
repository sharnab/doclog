<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Model\Country;
use App\Model\Expatriate;
use App\Model\Gender;
use App\Model\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use Helper;
use App\Model\AppUser;

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


        /**
         * call form wizard with reference data
         */
       // return view('admin.bank.create');
    }

    public function addBasicInfo(Request $request)
    {
        $request->validate([
            "passport_number"         => "required",
            "expiry_date"          => "required",
            "first_name"          => "required",
        ]);

        /**
         * Check is passport Number exist
         */
        $isExist     =Expatriate::where('passport_number',$request->input('passport_number'))->where('active_status',1)->count();

        if(!$isExist)
        {
            session()->flash('message', 'This passport already exist in the system');
            session()->flash('class', '2');
            return redirect()->route('education_create');
        }

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
        $basic_data['created_by']=Auth::id();
        $basic_data['created_at']=date('Y-m-d H:i:s');

        /**
         * Insert Into Expatriate table and get ID
         */

        $id = Expatriate::insertGetId($basic_data);


            $educationData = Education::firstOrCreate($data);

            session()->flash('message', 'New Institute Created Successfully !');
            session()->flash('class', '1');
            return redirect()->route('education');

    }



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
