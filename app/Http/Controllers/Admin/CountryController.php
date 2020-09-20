<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use Helper;
use App\Model\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        //$countryList = Country::paginate(config('common.pagination.per_page'));
        $countryList = Country::get();
        return view('admin.country.index',compact('countryList'));

        
    }

    public function index()
    {
        //$countryList = Country::paginate(config('common.pagination.per_page'));
        
        return view('admin.country.serverside');

        
    }

    public function serverSideTable(Request $request)
    {
        $columns = array( 
            0 =>'title', 
            1 =>'title_bn',
            2=> 'code',
            3=> 'active_status',
            4=> 'id',
        );

        $totalData = Country::count();
        
        $totalFiltered = $totalData; 
        
        $limit = '10';
        
        $start = $request->input('start');
        
        $order = 'id';
        
        $dir = 'asc';

        if(empty($request->input('search.value')))
        {  
               
        $posts = Country::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        //echo json_encode($posts); exit;       
        }
        
        else {
        $search = $request->input('search.value'); 

        $posts =  Country::where('id','LIKE',"%{$search}%")
                    ->orWhere('title', 'LIKE',"%{$search}%")
                    ->orWhere('title_bn', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Country::where('id','LIKE',"%{$search}%")
                    ->orWhere('title', 'LIKE',"%{$search}%")
                    ->orWhere('title_bn', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post){
                
                $edit =  route('country_edit',$post->id);
                $delete =  route('country_destroy',$post->id);

                $nestedData['title'] = $post->title;
                $nestedData['title_bn'] = $post->title_bn;
                $nestedData['code'] = $post->code;
                $nestedData['active_status'] = $post->active_status;
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allRegions = Helper::regionList();
        return view('admin.country.create', compact('allRegions'));
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
            "title"                  => "required",
            "title_bn"               => "required",
            "code"                   => "required",
            "display_sequence"       => "required",
            "active_status"          => "required",
        ]);

        // $logo_img_path = '';
        // $path = public_path('uploads/logos/country');
        // if(!File::exists($path)) {
        //     File::makeDirectory($path, $mode = 0777, true, true);
        // }
        //
        // $request->validate([
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        // ]);
        // $image_name = time().'.'.$request->image->getClientOriginalExtension();
        //
        // if($image_name){
        //     request()->image->move($path, $image_name);
        //     $logo_img_path = "uploads/logos/country/" . $image_name;
        // }
        if($request->input('display_sequence')!=''||$request->input('display_sequence')!=null){
            $displaySequence = $request->input('display_sequence');
        }else{
            $displaySequence = 0;
        }
        $code = strtoupper($request->input('code'));
        $data = array(
            "title"                 => $request->input('title'),
            "title_bn"              => $request->input('title_bn'),
            "code"                  => $code,
            "display_sequence"     => $displaySequence,
            //"is_default"    => $request->input('is_default'),
            "active_status"         => $request->input('active_status'),
            "created_by"            => Auth::id()
        );
        //print_r($data);exit();
        //$priority = Country::orderBy('id', 'desc')->first()->view_priority;
        //$data["view_priority"] = $priority + 1;

        $countryData = Country::firstOrCreate($data);

        session()->flash('message', 'New Country Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('country');
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
        $country = Country::find($id);
        //print_r($country);exit;
        $allRegions = Helper::regionList();
        return view('admin.country.edit', compact('country', 'allRegions'));
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
        // $country = Country::find($id);

        $validatedData = $request->validate([
            "title"                  => "required",
            "title_bn"               => "required",
            "code"                   => "required",
            "display_sequence"       => "required",
            "active_status"          => "required",
        ]);

        // if(Input::get('delete')){
        //     $del = Country::find($id);
        //     File::delete($del->logo);
        //     $data = array("logo" => '',);
        //     $userData = Country::where('id',$id)->update($data);
        //
        //     session()->flash('message', 'Logo image has been removed Successfully !');
        //     session()->flash('class', '1');
        //     return redirect()->route('country_edit', $id);
        // }
        // else {
            // $logo_img_path = '';
            //
            // if(!empty($request->image)){
            //     $path = public_path('uploads/logos/country');
            //     if(!File::exists($path)) {
            //         File::makeDirectory($path, $mode = 0777, true, true);
            //     }
            //
            //     $request->validate([
            //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            //     ]);
            //     $image_name = time().'.'.$request->image->getClientOriginalExtension();
            //
            //     if($image_name){
            //         request()->image->move($path, $image_name);
            //         $logo_img_path = "uploads/logos/country/" . $image_name;
            //     }
            // }

            // $data = array(
            //     "name"          => $request->input('name'),
            //     "short_name"    => $request->input('short_name'),
            //     "code"          => $request->input('code'),
            //     "region_id"     => $request->input('region_id'),
            //     "is_default"    => $request->input('is_default'),
            //     "active_status" => $request->input('active_status'),
            //     "updated_by"    => Auth::id()
            // );
            if($request->input('display_sequence')!=''||$request->input('display_sequence')!=null){
                $displaySequence = $request->input('display_sequence');
            }else{
                $displaySequence = 0;
            }
            $code = strtoupper($request->input('code'));
            $data = array(
                "title"                 => $request->input('title'),
                "title_bn"              => $request->input('title_bn'),
                "code"                  => $code,
                "display_sequence"     => $displaySequence,
                //"is_default"    => $request->input('is_default'),
                "active_status"         => $request->input('active_status'),
                "created_by"            => Auth::id()
            );
            #return DB::table('files')->latest('id')->first();
            // if($logo_img_path){
            //     $data["logo"]       = $logo_img_path;
            // }

            $CountryData = Country::where('id',$id)->update($data);

            session()->flash('message', 'Country Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('country');
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
        //print_r($id);exit;
        $country = Country::findOrFail($id);

        $country->delete();
    
        return redirect()->route('country');
    }
    


}
