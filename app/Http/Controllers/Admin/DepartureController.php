<?php

namespace App\Http\Controllers\Admin;

use App\Model\Expat;
use App\Model\Country;
use App\Model\DepartureInfo;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

use DB;

class DepartureController extends Controller
{
    protected $module_title = 'Departure Info';
    protected $module_route = 'departure_info';
    protected $module_model = 'Departure Info';
    protected $module_view_path = 'admin.departure_info';
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
        $items = DepartureInfo::get();
        return view($this->module_view_path.'.index',compact('items'));
    }

    public function create()
    {
        $expatList = Expat::get();
        $countries = Country::whereIn('id', [26, 147, 181])->get()->toArray();
        return view($this->module_view_path.'.create', compact('expatList', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data["expat_id"]              = $request->input('expat_id');
        $data["travel_type"]           = 'Departure';
        $data["departure_country_id"]  = $request->input('departure_country_id');
        $data['iata_code']             = $request->input('departure_iata_code');
        $data["active_status"]         = $request->input('active_status');
        $data["created_by"]            = Auth::id();
        $data["date"]                  = date('Y-m-d', strtotime(str_replace('/', '-', $request->input("departure_date"))));

        $DepartureData = DepartureInfo::firstOrCreate($data);

        session()->flash('message', 'New Departure Info Created Successfully !');
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
        $countries = Country::whereIn('id', [26, 147, 181])->get()->toArray();
        $item = DB::table('expat_travel_history')
            ->join('expat', 'expat_travel_history.expat_id', '=', 'expat.id')
            ->join('expat_employment_type', 'expat_employment_type.id', '=', 'expat_travel_history.expat_id')
            ->select('expat_travel_history.*', 'expat.first_name as first_name','expat.last_name as last_name','expat.mobile as contact_no','expat_employment_type.worker_category_id as worker_category_id')
            ->where('expat_travel_history.id', $id)
            ->where('expat_travel_history.travel_type', 'Departure')
            ->first();

        // $item = Feedback::find($id);
        if(!empty($item)){
            return view($this->module_view_path.'.edit', compact('item', 'expatList', 'countries'));
        }
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
        // $validatedData = $request->validate([
        //     "expat_id"      => "required",
        //     "feedback"      => "required",
        //     "active_status" => "required",
        // ]);

        $data["expat_id"]              = $request->input('expat_id');
        $data["travel_type"]           = 'Departure';
        $data["departure_country_id"]  = $request->input('departure_country_id');
        $data['iata_code']             = $request->input('departure_iata_code');
        $data["active_status"]         = $request->input('active_status');
        $data["created_by"]            = Auth::id();
        $data["date"]                  = date('Y-m-d', strtotime(str_replace('/', '-', $request->input("departure_date"))));

        $DepartureData = DepartureInfo::where('id',$id)->update($data);

        session()->flash('message', 'Departure Info Updated Successfully !');
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
        $item = DepartureInfo::findOrFail($id);

        $item->delete();
        session()->flash('message', 'Departure Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route($this->module_route);
    }

    public function serverSideTable(Request $request)
    {
        $columns = array(
            0 =>'passport_number',
            1 =>'date',
            2=> 'active_status',
            3=> 'id',
        );

        $totalData = DepartureInfo::count();

        $totalFiltered = $totalData;

        $limit = '10';

        $start = $request->input('start');

        $order = 'id';

        $dir = 'asc';

        if(empty($request->input('search.value')))
        {

        $posts = DepartureInfo::select('expat_travel_history.*', 'expat.passport_number')
                    ->join('expat', 'expat_travel_history.expat_id', '=', 'expat.id')
                    ->where('expat_travel_history.travel_type', 'departure')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
        //echo json_encode($posts); exit;
        }

        else {
        $search = $request->input('search.value');

        $posts =  DepartureInfo::select('expat_travel_history.*', 'expat.passport_number')
                    ->join('expat', 'expat_travel_history.expat_id', '=', 'expat.id')
                    ->where('expat_travel_history.travel_type', 'departure')
                    ->where('expat.passport_number','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = DepartureInfo::select('expat_travel_history.*', 'expat.passport_number')
                    ->join('expat', 'expat_travel_history.expat_id', '=', 'expat.id')
                    ->where('expat_travel_history.travel_type', 'departure')
                    ->where('expat.passport_number','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post){

                $edit =  route('departure_info.edit',$post->id);
                $delete =  route('departure_info.destroy',$post->id);

                $nestedData['passport_number']  = $post->passport_number;
                $nestedData['date']         = date('d M, Y', strtotime($post->date));
                $nestedData['active_status']    = $post->active_status;
                $nestedData['action']           = "&emsp;<a href='{$edit}' title='Edit' class='btn btn-icon-only purple'><i class='fa fa-edit'></i></a>
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
