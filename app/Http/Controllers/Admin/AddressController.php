<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Model\District;
use App\Model\Union;
use App\Model\Upazila;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;


class AddressController extends ApiController
{
    public function divisionList(Request $request) {
        //$lang = Lang::locale();
        $divisionList   = \App\Model\Address::getDevisionList('en');
        if(!empty($divisionList)){

            return $this->respondWithSuccess(__('Devision List'),$divisionList);

        }else{

            return $this->respondWithSuccess(__('No Devision Found'),607);
        }

    }

    public function districtList(Request $request) {
      //  $lang = Lang::locale();
        $districtList   = \App\Model\Address::getDistrictList('en');
        if(!empty($districtList)){

            return $this->respondWithSuccess(__('District List'),$districtList);

        }else{

            return $this->respondWithSuccess(__('No District Found'),607);
        }

    }

    public function unionList(Request $request) {
       // $lang = Lang::locale();
        $unionList   = \App\Model\Address::getUnionList('en');
        if(!empty($unionList)){

            return $this->respondWithSuccess(__('Union List'),$unionList);

        }else{

            return $this->respondWithSuccess(__('No Union Found'),607);
        }

    }

    public function upazilaList(Request $request) {
        //$lang = Lang::locale();
        $upazilaList   = \App\Model\Address::getUpazilaList('en');
        if(!empty($upazilaList)){

            return $this->respondWithSuccess(__('Upazila List'),$upazilaList);

        }else{

            return $this->respondWithSuccess(__('No Upazila Found'),607);
        }

    }

    public function districtByDivision(Request $request)
    {
        $rules =[
            "division_id"         => "required",
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            $errors = $validator->messages()->toArray();
            return $this->respondWithValidationError($errors);
        }

        $division_id = $request->input('division_id');
        $district_list = District::where('division_id',$division_id)->where('active_status',1)->get();

        if(!empty($district_list)){

            return $this->respondWithSuccess(__('District List'),$district_list);

        }else{

            return $this->respondWithSuccess(__('No Data Found'),607);
        }
    }


    public function upazilaByDistrict(Request $request)
    {
        $rules =[
            "district_id"         => "required",
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            $errors = $validator->messages()->toArray();
            return $this->respondWithValidationError($errors);
        }

        $district_id = $request->input('district_id');
        $upazila_list = Upazila::where('district_id',$district_id)->where('active_status',1)->get();

        if(!empty($upazila_list)){

            return $this->respondWithSuccess(__('Upazila List'),$upazila_list);

        }else{

            return $this->respondWithSuccess(__('No Data Found'),607);
        }
    }

    public function unionByUpazila(Request $request)
    {
        $rules =[
            "upazila_id"         => "required",
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            $errors = $validator->messages()->toArray();
            return $this->respondWithValidationError($errors);
        }

        $upazila_id = $request->input('upazila_id');
        $unionlist = Union::where('upazila_id',$upazila_id)->where('active_status',1)->get();

        if(!empty($unionlist)){

            return $this->respondWithSuccess(__('Union List'),$unionlist);

        }else{

            return $this->respondWithSuccess(__('No Data Found'),607);
        }
    }


}
