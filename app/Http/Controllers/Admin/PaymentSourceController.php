<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PaymentSourceRequest;
use App\Http\Requests\PaymentTypeRequest;
use App\Model\PaymentSource;
use App\Model\PaymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PaymentSourceController extends Controller
{
    protected $module_title = 'Payment Source';
    protected $module_route = 'payment_source';
    protected $module_view_path = 'admin.payment_source';
    public function __construct(){
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
        $items = PaymentSource::paginate(config('common.pagination.per_page'));
        return view($this->module_view_path.'.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allPaymentType = getAllPaymentType();
        return view($this->module_view_path.'.create',compact('allPaymentType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentSourceRequest $request)
    {
        $data=$request->only(['name','payment_type_id','charged_percentage','remarks','active_status']);
        $data['created_by'] =Auth::id();

        PaymentSource::firstOrCreate($data);

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
        $allPaymentType = getAllPaymentType();
        $item = PaymentSource::find($id);
        return view($this->module_view_path.'.edit', compact('item','allPaymentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentSourceRequest $request, $id)
    {
        $data=$request->only(['name','charged_percentage','remarks','active_status']);
        $data['updated_by'] =Auth::id();

        PaymentSource::where('id',$id)->update($data);
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
