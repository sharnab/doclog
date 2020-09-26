<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Address extends Model
{
    public static function getDevisionList($lang){
        if($lang=='en'){
            $division = DB::table('loc_divisions')
                        ->select('id', 'title_en', 'active_status','created_by', 'created_at', 'updated_by','updated_at')
                        ->where('active_status',1)
                        //->orderBy('display_sequence', 'desc')
                        ->get();
        }else if($lang=='bn'){
            $division = DB::table('loc_divisions')
                        ->select('id', 'title', 'active_status','created_by', 'created_at', 'updated_by','updated_at')
                        ->where('active_status',1)
                        //->orderBy('display_sequence', 'desc')
                        ->get();
        }
        $queryCount = $division->count();
        if($queryCount > 0){
            return $division;
        } else {
            return false;
        }

    }

    public static function getDistrictList($lang){
        if($lang=='en'){
            $district = DB::table('loc_districts')
                        ->select('id', 'division_id', 'title_en', 'active_status','created_by', 'created_at', 'updated_by','updated_at')
                        ->where('active_status',1)
                        //->orderBy('display_sequence', 'desc')
                        ->get();
        }else if($lang=='bn'){
            $district = DB::table('loc_districts')
                        ->select('id','division_id', 'title', 'active_status','created_by', 'created_at', 'updated_by','updated_at')
                        ->where('active_status',1)
                        //->orderBy('display_sequence', 'desc')
                        ->get();
        }
        $queryCount = $district->count();
        if($queryCount > 0){
            return $district;
        } else {
            return false;
        }

    }

    public static function getUnionList($lang){
        if($lang=='en'){
            $union = DB::table('loc_unions')
                        ->select('id', 'bbs_code', 'district_id', 'district_bbs_code', 'title_en', 'active_status','upazila_id', 'upazila_bbs_code')
                        ->where('active_status',1)
                        //->orderBy('display_sequence', 'desc')
                        ->get();
        }else if($lang=='bn'){
            $union = DB::table('loc_unions')
                        ->select('id', 'bbs_code', 'district_id', 'district_bbs_code', 'title', 'active_status','upazila_id', 'upazila_bbs_code')
                        ->where('active_status',1)
                        //->orderBy('display_sequence', 'desc')
                        ->get();
        }
        $queryCount = $union->count();
        if($queryCount > 0){
            return $union;
        } else {
            return false;
        }

    }

    public static function getUpazilaList($lang){
        if($lang=='en'){
            $upazila = DB::table('loc_upazilas')
                        ->select('id', 'bbs_code', 'district_id', 'district_bbs_code', 'title_en', 'active_status')
                        ->where('active_status',1)
                        //->orderBy('display_sequence', 'desc')
                        ->get();
        }else if($lang=='bn'){
            $upazila = DB::table('loc_upazilas')
                        ->select('id', 'bbs_code', 'district_id', 'district_bbs_code', 'title', 'active_status')
                        ->where('active_status',1)
                        //->orderBy('display_sequence', 'desc')
                        ->get();
        }
        $queryCount = $upazila->count();
        if($queryCount > 0){
            return $upazila;
        } else {
            return false;
        }

    }

}
