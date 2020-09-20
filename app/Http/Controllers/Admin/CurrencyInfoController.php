<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CurrencyInfoRequest;
use App\Model\Country;
use App\Model\CurrencyInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CurrencyInfoController extends Controller
{
    protected $module_title = 'Currency';
    protected $module_route = 'currency';
    protected $module_model = 'Currency';
    protected $module_view_path = 'admin.currency_info';
    public function __construct(){
        View::share('module_icon', 'md md-style text-info');
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
        $items = CurrencyInfo::paginate(config('common.pagination.per_page'));
        return view($this->module_view_path.'.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->module_view_path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyInfoRequest $request)
    {
        $data=$request->only(['name','short_name','sign','rate','active_status']);
        $data['created_by'] =Auth::id();

        CurrencyInfo::firstOrCreate($data);

        session()->flash('message', 'New Currency Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route($this->module_route.'.index');
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
        $item = CurrencyInfo::find($id);
        return view($this->module_view_path.'.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyInfoRequest $request, $id)
    {
        $data=$request->only(['name','short_name','sign','rate','active_status']);
        $data['updated_by'] =Auth::id();

        CurrencyInfo::where('id',$id)->update($data);
        session()->flash('message', 'Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route($this->module_route.'.index');
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
}
