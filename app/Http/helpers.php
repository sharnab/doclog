<?php

use App\Model\Customer;
use App\Model\PaymentType;
use App\Model\Role\SysGroupPermissions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Model\AssetType;
use App\Model\Company;
use App\Model\UserCompany;

if (! function_exists('readMoreString')) {
    function readMoreString($str,$limit=40){
        if(strlen($str)>$limit){
            $stringCut = substr($str, 0, $limit);
            $serRpos = strrpos($stringCut, ' ');
            $first_part = substr(substr($str, 0, $limit), 0,$serRpos);
            $last_part = substr($str,$serRpos);
            return $first_part.'<span title="Show More" class="hidden-more-text" onclick="showText(this)"> >><span>'.$last_part.'</span></span>';
        }
        else
            return $str;
    }
}
if (! function_exists('getRoles')) {
    function getRoles(){
        if(!Cache::has(config('sys.role_cache'))){
            Cache::rememberForever(config('sys.role_cache'), function() {
                return SysGroupPermissions::all()->toArray();
            });
        }
        return Cache::get(config('sys.role_cache'));
    }
}
if (! function_exists('getRolesByGroupId')) {
    function getRolesByGroupId($group_id){
        $cache_key = config('sys.role_cache').'_'.$group_id;
//        Cache::forget($cache_key);
        if(!Cache::has($cache_key)){
            Cache::rememberForever($cache_key, function() use($group_id) {
                return SysGroupPermissions::where('sys_group_id',$group_id)->get();
            });
        }
        return Cache::get($cache_key);
    }
}
function buildTree($rows,$roles,$parent_id = 0)
{
    $arrange_menus = [];
    $i = 0;
    foreach ($rows as $row)
    {
        $i++;
        if($row['parent_id'] == $parent_id)
        {
            $children = buildTree($rows,$roles,$row['id']);
            if ($children)
            {
                $row['sub_menu'] = $children;
                $arrange_menus[] = $row;
            }
            else
            {
                if($row['status']==1&&in_array($row['uri'],$roles))
                    $arrange_menus[] = $row;
            }
        }
    }
    return $arrange_menus;
}

function buildChildParent($rows)
{
    $arrange_menus=[];
    foreach ($rows as $row)
    {
        $arrange_menus[$row['id']]=$row['parent_id'];
    }
    return $arrange_menus;
}

function getActiveNodes($array, $id)
{

    $ids[]=$id;
    while(!empty($array[$id]))
    {
        $ids[]=$array[$id];
        $id = $array[$id];
    }
   return $ids;
}


if (! function_exists('getAllAsset')) {
    function getAllAsset(){
        $allAssetType = AssetType::active()->get();
        $allAsset = array();
        foreach ($allAssetType as $asset) {
            $allAsset[$asset->asset_type_id] = $asset->asset_name ;
        }

        return $allAsset;
    }
}

if (! function_exists('getAllCompany')) {
    function getAllCompany(){
        $allCompanyData = Company::active()->get();
        $allCompany = array();
        foreach ($allCompanyData as $comp) {
            $allCompany[$comp->company_id] = $comp->company_name ;
        }
        return $allCompany;
    }
}

if (! function_exists('getUserCompany')) {
    function getUserCompany(){
        $userCompany = UserCompany::where('user_id',Auth::id())->get();
        $allCompany = array();
        foreach ($userCompany as $comp) {
            $allCompany[] = $comp->company_id ;
        }
        return $allCompany;
    }
}

if (! function_exists('getAllPaymentType')) {
    function getAllPaymentType(){
        $items = PaymentType::all();
        $generated_items = array();
        foreach ($items as $item)
        {
            $generated_items[$item->id]=$item->name ;
        }

        return $generated_items;
    }
}

if (! function_exists('getAllCustomer')) {
    function getAllCustomer(){
        $allCustomers = Customer::where('active_status',1)->get();
        $allCustomersData = array();
        foreach ($allCustomers as $customer)
        {
            $allCustomersData[$customer->id]=$customer->given_name ;
        }

        return $allCustomersData;
    }
}

if (! function_exists('convertNumberToWord')) {
    function convertNumberToWord($number){
        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $in_word= $f->format($number);
        return $in_word;
    }
}




if (! function_exists('generate_invoice_nubmer')) {
    function generate_invoice_nubmer($number){
       $generated= str_pad($number, 6, '0', STR_PAD_LEFT);
       $generated_final = 'S'.$generated;
        return $generated_final;
    }
}





