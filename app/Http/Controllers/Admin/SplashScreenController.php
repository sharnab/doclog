<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use File;
use App\Model\SplashScreen;

use Helper; // Important

class SplashScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sScreenList = SplashScreen::get();
        // $customerList = User::with('userGroup')->get();
        // print_r(json_encode($customerList));
        return view('admin.sScreen.index',compact('sScreenList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $sequencelist    = SplashScreen::getSequencelist();
        $array = (array) $sequencelist;
        $array2 = json_decode(json_encode($array), true);
        
        $array3 = array_values($array2);
        $array4 = array_values($array3[0]);
        $array5 = array_column($array4, 'display_sequence');
        $comma_separated = implode(", ", $array5);
        // echo "<pre>";
        // print_r($comma_separated);exit();
        return view('admin.sScreen.create',compact('comma_separated'));
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
            "title"             => "required",
            "title_bn"          => "required",
            "description"       => "required",
            "description_bn"    => "required",
            "display_sequence"  => "required",
            "image"             => "required",
            "active_status"     => "required",
        ]);

        $logo_img_path = '';
        $path = public_path('uploads/sscreen');
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $image_name = time().'.'.$request->image->getClientOriginalExtension();

        if($image_name){
            request()->image->move($path, $image_name);
            $logo_img_path = "uploads/sscreen/" . $image_name;
        }

        $data = array(
            "title"             => $request->input('title'),
            "title_bn"          => $request->input('title_bn'),
            "description"       => $request->input('description'),
            "description_bn"    => $request->input('description_bn'),
            "display_sequence"  => $request->input('display_sequence'),
            "file_url"          => url('/').'/'.$logo_img_path,
            "active_status"     => $request->input('active_status'),
            "created_by"        => Auth::id()
        );
        // echo "<pre>";
        // print_r($data);exit();
        $screenData = SplashScreen::firstOrCreate($data);

        session()->flash('message', 'Splash Screen Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('splashscreen');
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
        $splashscreen = SplashScreen::find($id);
        //return $airline;
        $sequencelist    = SplashScreen::getSequencelist();
        $array = (array) $sequencelist;
        $array2 = json_decode(json_encode($array), true);
        
        $array3 = array_values($array2);
        $array4 = array_values($array3[0]);
        $array5 = array_column($array4, 'display_sequence');
        $comma_separated = implode(", ", $array5);
        return view('admin.sScreen.edit', compact('splashscreen','comma_separated'));
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
            "title"             => "required",
            "title_bn"          => "required",
            "description"       => "required",
            "description_bn"    => "required",
            "display_sequence"  => "required",
            "active_status"     => "required",
        ]);

        if(Input::get('delete')){
            $del = SplashScreen::find($id);
            File::delete($del->file_url);
            $data = array("file_url" => '',);
            $userData = SplashScreen::where('id',$id)->update($data);

            session()->flash('message', 'Image image has been removed Successfully !');
            session()->flash('class', '1');
            return redirect()->route('splashscreen_edit', $id);
        }
        else {
            $logo_img_path = '';

            if(!empty($request->image)){
                $path = public_path('uploads/sscreen');
                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                ]);
                $image_name = time().'.'.$request->image->getClientOriginalExtension();

                if($image_name){
                    request()->image->move($path, $image_name);
                    $logo_img_path = "uploads/sscreen/" . $image_name;
                }
            }

            $data = array(
                "title"             => $request->input('title'),
                "title_bn"          => $request->input('title_bn'),
                "description"       => $request->input('description'),
                "description_bn"    => $request->input('description_bn'),
                "display_sequence"  => $request->input('display_sequence'),
                //"file_url"          => url('/').'/'.$logo_img_path,
                "active_status"     => $request->input('active_status'),
                "updated_by"        => Auth::id()
            );
            if($logo_img_path){
                $data["file_url"]       = url('/').'/'.$logo_img_path;
            }

            $sScreenData = SplashScreen::where('id',$id)->update($data);

            session()->flash('message', 'Splash Screen Updated Successfully !');
            session()->flash('class', '1');
            return redirect()->route('splashscreen');
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
        $sscreen = SplashScreen::findOrFail($id);

        $sscreen->delete();
        session()->flash('message', 'Screen Removed Successfully !');
        session()->flash('class', '1');
        return redirect()->route('splashscreen');
    }
}
