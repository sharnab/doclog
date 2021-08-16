<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Passport_images;
use Illuminate\Support\Facades\Input;

// use App\Http\Requests\EditRequest;
use Validator;
use File;
use App\Model\Area;
use App\Model\Hospital;
use App\Model\Speciality;
use App\Model\DoctorInfo;

use Helper; // Important

class DoctorInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorInfoList = DoctorInfo::get();
        return view('admin.doctor_info.index',compact('doctorInfoList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allArea = $this->getArea();
        $allSpecialities = $this->getSpecialities();
        $allHospitals = $this->getHospital();
        return view('admin.doctor_info.create', compact('allArea','allSpecialities','allHospitals'));
    }

    private function getArea()
    {
        $allArea = Area::all();
        $allAreaData = array();
        foreach ($allArea as $area)
        {
            $allAreaData[$area->id]=$area->name_en ;
        }

        return $allAreaData;
    }

    private function getSpecialities()
    {
        $allSpecialities = Speciality::all();
        $allSpecialityData = array();
        foreach ($allSpecialities as $speciality)
        {
            $allSpecialityData[$speciality->id]=$speciality->name_en ;
        }

        return $allSpecialityData;
    }

    private function getHospital()
    {
        $allHospitals = Hospital::all();
        $allHospitalData = array();
        foreach ($allHospitals as $hospital)
        {
            $allHospitalData[$hospital->id]=$hospital->name_en ;
        }

        return $allHospitalData;
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
            'name_en'          => 'required',
            'name_bn'           => 'required',
            'hospital_id'       => 'required',
            "area_id"           => "required",
            "speciality_id"    => "required",
            "active_status" => "required",
        ]);

        $data = array(
            "name_en"           => $request->input('name_en'),
            "name_bn"           => $request->input('name_bn'),
            'hospital_id'       => $request->input('hospital_id'),
            "area_id"           => $request->input("area_id"),
            "speciality_id"     => $request->input("speciality_id"),
            "active_status"     => $request->input('active_status'),
            "created_by"        => Auth::id()
        );

        DoctorInfo::firstOrCreate($data);

        session()->flash('message', 'New Doctor Information Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('doctor_info');
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
        $item = DoctorInfo::find($id);
        $allArea = $this->getArea();
        $allSpecialities = $this->getSpecialities();
        $allHospitals = $this->getHospital();

        return view('admin.doctor_info.edit', compact('item', 'allArea','allSpecialities','allHospitals'));
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
            'name_en'           => 'required',
            'name_bn'           => 'required',
            'hospital_id'       => 'required',
            "area_id"           => "required",
            "speciality_id"     => "required",
            "active_status"     => "required",
        ]);


        $data = array(
            "name_en"           => $request->input('name_en'),
            "name_bn"           => $request->input('name_bn'),
            'hospital_id'       => $request->input('hospital_id'),
            "area_id"           => $request->input("area_id"),
            "speciality_id"     => $request->input("speciality_id"),
            "active_status"     => $request->input('active_status'),
            "updated_by"        => Auth::id()
        );


        DoctorInfo::where('id',$id)->update($data);

        session()->flash('message', 'Doctor Information Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('doctor_info');
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

    public function serverSideTable(Request $request)
    {
        $columns = array(
            0 => 'name_en',
            1 => 'speciality_name',
            2 => 'hospital_name',
            3 => 'area_name',
            4 => 'active_status',
            5 => 'id',
        );

        $totalData = DoctorInfo::count();

        $totalFiltered = $totalData;

        $limit = '10';

        $start = $request->input('start');

        $order = 'id';

        $dir = 'asc';

        if(empty($request->input('search.value')))
        {

            $posts = DoctorInfo::select('doctor_infos.*', 'area.name_en as area_name', 'hospitals.name_en as hospital_name', 'specialities.name_en as speciality_name')
                ->join('area', 'doctor_infos.area_id', '=', 'area.id')
                ->join('hospitals', 'doctor_infos.hospital_id', '=', 'hospitals.id')
                ->join('specialities', 'doctor_infos.speciality_id', '=', 'specialities.id')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            //echo json_encode($posts); exit;
        }

        else {
            $search = $request->input('search.value');

            $posts = DoctorInfo::select('doctor_infos.*', 'area.name_en as area_name', 'hospitals.name_en as hospital_name', 'specialities.name_en as speciality_name')
                ->join('area', 'doctor_infos.expat_id', '=', 'area.id')
                ->join('hospitals', 'doctor_infos.hospital_id', '=', 'hospitals.id')
                ->join('specialities', 'doctor_infos.speciality_id', '=', 'specialities.id')
                ->where('doctor_infos.name_en','LIKE',"%{$search}%")
                ->orWhere('area.name_en','LIKE',"%{$search}%")
                ->orWhere('hospitals.name_en','LIKE',"%{$search}%")
                ->orWhere('specialities.name_en','LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = DoctorInfo::select('doctor_infos.*', 'area.name_en as area_name', 'hospitals.name_en as hospital_name', 'specialities.name_en as speciality_name')
                ->join('area', 'doctor_infos.expat_id', '=', 'area.id')
                ->join('hospitals', 'doctor_infos.hospital_id', '=', 'hospitals.id')
                ->join('specialities', 'doctor_infos.speciality_id', '=', 'specialities.id')
                ->where('doctor_infos.name_en','LIKE',"%{$search}%")
                ->orWhere('area.name_en','LIKE',"%{$search}%")
                ->orWhere('hospitals.name_en','LIKE',"%{$search}%")
                ->orWhere('specialities.name_en','LIKE',"%{$search}%")
                ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post){

                $edit =  route('doctor_info_edit',$post->id);
                $delete =  route('doctor_info_destroy',$post->id);

                $nestedData['name_en']  = $post->name_en;
                $nestedData['speciality_name']  = $post->speciality_name;
                $nestedData['area_name']        = $post->area_name;
                $nestedData['hospital_name']    = $post->hospital_name;
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


}
