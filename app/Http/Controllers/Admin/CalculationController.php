<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\CurrencyInfo;
use App\Model\Airline;

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCurrencies =  $this->getCurrencies();
        $allAirlines =  $this->getAirlines();
        return  view('admin.calculation.create', compact('allCurrencies', 'allAirlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('calculation.create', compact('allCurrencies', 'allAirlines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

    private function getCurrencies()
    {
        $allData = CurrencyInfo::all();
        $allCurrencies = array();
        foreach ($allData as $Currency)
        {
            $allCurrencies[$Currency->id]=$Currency->name ;
        }

        return $allCurrencies;
    }

    private function getAirlines()
    {
        $AirlinesData = Airline::all();
        $allAirlines = array();
        foreach ($AirlinesData as $Airline)
        {
            $allAirlines[$Airline->id]=$Airline->name ;
        }

        return $allAirlines;
    }

    public function get_commssion($id){
        if($id){
            $airline = Airline::find($id);
            $data['commission_1']=$airline->commission_1;
            $data['commission_2']=$airline->commission_2;
            return $data;
        }
        else{
            return 0;
        }
    }
}
