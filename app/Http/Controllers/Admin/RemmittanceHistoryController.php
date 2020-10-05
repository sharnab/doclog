<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Model\RemmittanceHistory;
use App\Model\Expat;

use DB;


class RemmittanceHistoryController extends Controller
{
    protected $module_title = 'Remmittance History';
    protected $module_route = 'remmittance_history';
    protected $module_model = 'RemmittanceHistory';
    protected $module_view_path = 'admin.remmittance_history';
    public function __construct(){
        // View::share('module_icon', 'md md-style text-info');
        View::share('module_route', $this->module_route);
        View::share('module_view_path', $this->module_view_path);
        View::share('module_title', $this->module_title);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RemmittanceHistory::get();
        return view($this->module_view_path.'.index',compact('items'));
    }

    public function create()
    {
        $expatList = Expat::get();
        return view($this->module_view_path.'.create', compact('expatList'));
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
            "expat_id"      => "required",
            "amount"        => "required|numeric",
            "currency_id"   => "required",
            // "transfer_mode" => "required",
            // "reference_no"  => "required",
            // "transfer_date"       => "numeric",
            "active_status" => "required",
        ]);

        $data = array(
            "expat_id"      => $request->input('expat_id'),
            "amount"        => $request->input('amount'),
            "currency_id"   => $request->input('currency_id'),
            "transfer_mode" => $request->input('transfer_mode'),
            "reference_no"  => $request->input('reference_no'),
            "transfer_date" => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('transfer_date')))),
            "active_status" => $request->input('active_status'),
            "created_by"    => Auth::id()
        );

        $remmittanceHistoryData = RemmittanceHistory::firstOrCreate($data);

        session()->flash('message', 'New Remmittance History Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route($this->module_route);
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
        $expatList = Expat::get();
        $item = DB::table('expat_remittance_history')
            ->join('expat', 'expat_remittance_history.expat_id', '=', 'expat.id')
            ->join('expat_employment_type', 'expat_employment_type.expat_id', '=', 'expat.id')
            ->select('expat_remittance_history.*', 'expat.first_name as first_name','expat.last_name as last_name','expat.mobile as contact_no','expat_employment_type.worker_category_id as worker_category_id')
            ->where('expat_remittance_history.id', $id)
            ->first();

        // $item = RemmittanceHistory::find($id);
        return view($this->module_view_path.'.edit', compact('item', 'expatList'));
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
            "expat_id"      => "required",
            "amount"        => "required|numeric",
            "currency_id"   => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "expat_id"      => $request->input('expat_id'),
            "amount"        => $request->input('amount'),
            "currency_id"   => $request->input('currency_id'),
            "transfer_mode" => $request->input('transfer_mode'),
            "reference_no"  => $request->input('reference_no'),
            "transfer_date" => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('transfer_date')))),
            "active_status" => $request->input('active_status'),
            "updated_by"    => Auth::id()
        );

        $remmittanceHistoryData = RemmittanceHistory::where('id',$id)->update($data);

        session()->flash('message', 'Remmittance History Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route($this->module_route);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remmittanceHistory = RemmittanceHistory::findOrFail($id);

        $remmittanceHistory->delete();
        session()->flash('message', 'Remmittance History Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route($this->module_route.'.index');
    }

    public function serverSideTable(Request $request)
    {
        $columns = array(
            0 =>'passport_no',
            1 =>'amount',
            2=> 'currency_id',
            3=> 'transfer_date',
            4 =>'transfer_mode',
            5=> 'active_status',
            6=> 'id',
        );

        $totalData = RemmittanceHistory::count();

        $totalFiltered = $totalData;

        $limit = '10';

        $start = $request->input('start');

        $order = 'id';

        $dir = 'asc';

        if(empty($request->input('search.value')))
        {

        $posts = RemmittanceHistory::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        //echo json_encode($posts); exit;
        }

        else {
        $search = $request->input('search.value');

        $posts =  RemmittanceHistory::select('*', 'expat.passport_no')
                    ->join('expat', 'expat_remittance_history.expat_id', '=', 'expat.id')
                    ->where('expat.passport_no','LIKE',"%{$search}%")
                    ->orWhere('amount', 'LIKE',"%{$search}%")
                    ->orWhere('currency_id', 'LIKE',"%{$search}%")
                    ->orWhere('transfer_date', 'LIKE',"%{$search}%")
                    ->orWhere('transfer_mode', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = RemmittanceHistory::select('*', 'expat.passport_no')
                    ->join('expat', 'expat_remittance_history.expat_id', '=', 'expat.id')
                    ->where('expat.passport_no','LIKE',"%{$search}%")
                    ->orWhere('amount', 'LIKE',"%{$search}%")
                    ->orWhere('currency_id', 'LIKE',"%{$search}%")
                    ->orWhere('transfer_date', 'LIKE',"%{$search}%")
                    ->orWhere('transfer_mode', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post){

                $edit =  route('remmittance_history.edit',$post->id);
                $delete =  route('remmittance_history.destroy',$post->id);

                $nestedData['passport_no']  = $post->passport_no;
                $nestedData['amount']       = $post->amount;
                $nestedData['currency_id']  = ($post->currency_id==1)?'USD':'BDT';
                $nestedData['transfer_date']= $post->transfer_date;
                $nestedData['transfer_mode']= $post->transfer_mode;
                $nestedData['active_status']= $post->active_status;
                $nestedData['action'] = "&emsp;<a href='{$edit}' title='Edit' class='btn btn-icon-only purple'><i class='fa fa-edit'></i></a>
                                        &emsp;<a href='{$delete}' title='Remove' class='btn btn-icon-only red'> <i class='fa fa-times'></i></a>";
                $data[] = $nestedData;


            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );

        echo json_encode($json_data);
    }

    public function getExpatInfo($id){
        $item = DB::table('expat')
            ->join('expat_employment_type', 'expat_employment_type.expat_id', '=', 'expat.id')
            ->select('expat.first_name as first_name','expat.last_name as last_name','expat.mobile as contact_no','expat_employment_type.worker_category_id as worker_category_id')
            ->first();
        return json_encode($item);
    }
}
