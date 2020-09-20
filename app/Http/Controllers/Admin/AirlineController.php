<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\Airline;

use Helper; // Important

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airlineList = Airline::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.airline.index',compact('airlineList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.airline.create', compact('allCustomers', 'allNations', 'allSalesExecutives'));
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
            "name"          => "required|unique:airlines",
            "type"          => "required",
            "ticket_code"   => "required",
            "commission_1"  => "required",
            "commission_2"  => "required",
            "email"         => "required|unique:airlines",
            "mobile"        => "required|unique:airlines|max:15|min:7",
            "address"       => "required",
            "contact_person"=> "required",
            "active_status" => "required",
        ]);

        $logo_img_path = '';
        $path = public_path('uploads/logos/airline');
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $image_name = time().'.'.$request->image->getClientOriginalExtension();

        if($image_name){
            request()->image->move($path, $image_name);
            $logo_img_path = "uploads/logos/airline/" . $image_name;
        }

        $data = array(
            "name"              => $request->input('name'),
            "type"              => $request->input('type'),
            "short_name"        => $request->input('short_name'),
            "ticket_code"       => $request->input('ticket_code'),
            "commission_1"      => $request->input('commission_1'),
            "commission_2"      => $request->input('commission_2'),
            "code"              => $request->input('code'),
            "email"             => $request->input('email'),
            "mobile"            => $request->input('mobile'),
            "address"           => $request->input('address'),
            "contact_person"    => $request->input('contact_person'),
            "logo"              => $logo_img_path,
            "remarks"           => $request->input('remarks'),
            "active_status"     => $request->input('active_status'),
            "created_by"        => Auth::id()
        );

        $airlineData = Airline::firstOrCreate($data);

        session()->flash('message', 'New Airline Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('airline');
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
        $airline = Airline::find($id);
        return $airline;

        return view('admin.airline.edit', compact('airline'));
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
        // $airline = Airline::find($id);

        $validatedData = $request->validate([
            "name"          => "required|unique:airlines,name,$id",
            "type"          => "required",
            "ticket_code"   => "required",
            "commission_1"  => "required",
            "commission_2"  => "required",
            "email"         => "required|email|unique:airlines,email,$id",
            "mobile"        => "required||max:15|min:7|unique:airlines,mobile,$id",
            "address"       => "required",
            "contact_person"=> "required",
            "active_status" => "required",
        ]);

        if(Input::get('delete')){
            $del = Airline::find($id);
            File::delete($del->logo);
            $data = array("logo" => '',);
            $userData = Airline::where('id',$id)->update($data);

            session()->flash('message', 'Logo image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('airline_edit', $id);
        }
        else {
            $logo_img_path = '';

            if(!empty($request->image)){
                $path = public_path('uploads/logos/airline');
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                ]);
                $image_name = time().'.'.$request->image->getClientOriginalExtension();

                if($image_name){
                    request()->image->move($path, $image_name);
                    $logo_img_path = "uploads/logos/airline/" . $image_name;
                }
            }

            $data = array(
                "name"              => $request->input('name'),
                "type"              => $request->input('type'),
                "short_name"        => $request->input('short_name'),
                "ticket_code"       => $request->input('ticket_code'),
                "commission_1"      => $request->input('commission_1'),
                "commission_2"      => $request->input('commission_2'),
                "code"              => $request->input('code'),
                "email"             => $request->input('email'),
                "mobile"            => $request->input('mobile'),
                "address"           => $request->input('address'),
                "contact_person"    => $request->input('contact_person'),
                "remarks"           => $request->input('remarks'),
                "active_status"     => $request->input('active_status'),
                "updated_by"        => Auth::id()
            );
            if($logo_img_path){
                $data["logo"]       = $logo_img_path;
            }

            $AirlineData = Airline::where('id',$id)->update($data);

            session()->flash('message', 'Airline Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('airline');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
