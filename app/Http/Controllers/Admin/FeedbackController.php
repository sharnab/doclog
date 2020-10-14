<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Model\Feedback;
use App\Model\Expat;

use DB;


class FeedbackController extends Controller
{
    protected $module_title = 'Feedback';
    protected $module_route = 'feedback';
    protected $module_model = 'Feedback';
    protected $module_view_path = 'admin.feedback';
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
        $items = Feedback::get();
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
            "feedback"      => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "expat_id"      => $request->input('expat_id'),
            "feedback"      => $request->input('feedback'),
            "active_status" => $request->input('active_status'),
            "created_by"    => Auth::id()
        );

        $FeedbackData = Feedback::firstOrCreate($data);

        session()->flash('message', 'New Feedback Created Successfully !');
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
        $item = DB::table('expat_feedback')
            ->join('expat', 'expat_feedback.expat_id', '=', 'expat.id')
            ->join('expat_employment_type', 'expat_employment_type.expat_id', '=', 'expat.id')
            ->select('expat_feedback.*', 'expat.first_name as first_name','expat.last_name as last_name','expat.mobile as contact_no','expat_employment_type.worker_category_id as worker_category_id')
            ->where('expat_feedback.id', $id)
            ->first();

        // $item = Feedback::find($id);
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
            "feedback"      => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "expat_id"      => $request->input('expat_id'),
            "feedback"      => $request->input('feedback'),
            "active_status" => $request->input('active_status'),
            "updated_by"    => Auth::id()
        );

        $FeedbackData = Feedback::where('id',$id)->update($data);

        session()->flash('message', 'Feedback Updated Successfully !');
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
        $Feedback = Feedback::findOrFail($id);

        $Feedback->delete();
        session()->flash('message', 'Feedback Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route($this->module_route.'.index');
    }

    public function serverSideTable(Request $request)
    {
        $columns = array(
            0 =>'passport_number',
            1 =>'feedback',
            2=> 'active_status',
            3=> 'id',
        );

        $totalData = Feedback::count();

        $totalFiltered = $totalData;

        $limit = '10';

        $start = $request->input('start');

        $order = 'id';

        $dir = 'asc';

        if(empty($request->input('search.value')))
        {

        $posts = Feedback::select('expat_feedback.*', 'expat.passport_number')
                    ->join('expat', 'expat_feedback.expat_id', '=', 'expat.id')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
        //echo json_encode($posts); exit;
        }

        else {
        $search = $request->input('search.value');

        $posts =  Feedback::select('expat_feedback.*', 'expat.passport_number')
                    ->join('expat', 'expat_feedback.expat_id', '=', 'expat.id')
                    ->where('expat.passport_number','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Feedback::select('expat_feedback.*', 'expat.passport_number')
                    ->join('expat', 'expat_feedback.expat_id', '=', 'expat.id')
                    ->where('expat.passport_number','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post){

                $edit =  route('feedback.edit',$post->id);
                $delete =  route('feedback.destroy',$post->id);

                $nestedData['passport_number']  = $post->passport_number;
                $nestedData['feedback']         = $post->feedback;
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
