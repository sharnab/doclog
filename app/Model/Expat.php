<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use DB;
class Expat extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'expat';
   // protected $guarded = ['id'];
    protected $guarded = ['id'];


    public function passport()
    {
        return $this->hasOne('App\Model\ExpatPassport', 'expat_id');
    }
    public function visa()
    {
        return $this->hasOne('App\Model\ExpatVisaInfo', 'expat_id');
    }
    public function arrival()
    {
        return $this->hasOne('App\Model\ExpatTravelHistory', 'expat_id')->where('travel_type',1);
    }
    public function bmet()
    {
        return $this->hasOne('App\Model\ExpatBmetInfo', 'expat_id');
    }
    public function employmentType()
    {
        return $this->hasOne('App\Model\ExpatEmploymentType', 'expat_id');
    }
    public function ministryApproval()
    {
        return $this->hasOne('App\Model\ExpatMinistryApproval', 'expat_id');
    }
    public function workPermit()
    {
        return $this->hasOne('App\Model\ExpatWorkPermit', 'expat_id');
    }
    public function workPlace()
    {
        return $this->hasOne('App\Model\ExpatWorkPlace', 'expat_id');
    }
    public function motherCompany()
    {
        return $this->hasOne('App\Model\ExpatMotherCompany', 'expat_id');
    }
    public function supplierCompany()
    {
        return $this->hasOne('App\Model\ExpatSupplierCompany', 'expat_id');
    }
    public function recruitingAgency()
    {
        return $this->hasOne('App\Model\ExpatRecruitingAgency', 'expat_id');
    }
    public function salaryInfo()
    {
        return $this->hasOne('App\Model\ExpatSalaryInfo', 'expat_id');
    }
    public function currentCountryBankAccount()
    {
        return $this->hasOne('App\Model\ExpatCurrentCountryBankAccount', 'expat_id');
    }
    public function bdBankAccount()
    {
        return $this->hasOne('App\Model\ExpatBdBankAccount', 'expat_id');
    }
    public function currentCountryAddress()
    {
        return $this->hasOne('App\Model\ExpatCurrentCountryAddress', 'expat_id');
    }
    public function currentCountryEmergency()
    {
        return $this->hasOne('App\Model\ExpatEmergencyContact', 'expat_id')->where('contact_type',1)->where('active_status',1);
    }
    public function bdEmergency()
    {
        return $this->hasOne('App\Model\ExpatEmergencyContact', 'expat_id')->where('contact_type',2)->where('active_status',1);

    }

    public function religion()
    {
        return $this->belongsTo('App\Model\Religion', 'religion_id');

    }



}
