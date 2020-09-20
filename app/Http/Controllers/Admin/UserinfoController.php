<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserinfoRequest;
use App\Http\Requests\UserinfoEditRequest;

use App\Model\User;
use App\Model\Role\SysUserGroup;

class UserinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList = User::get();
        // $userList = User::with('userGroup')->get();
        // print_r(json_encode($userList));
        return view('admin.userinfo.index',compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $allUserGroup = $this->getUserGroups();
        return view('admin.userinfo.create',compact('allUserGroup'));
    }

    private function getUserGroups()
    {
        $allUserGroup = SysUserGroup::all();
        $allGroup = array();
        foreach ($allUserGroup as $group)
        {
            $allGroup[$group->id]=$group->name ;
        }

        return $allGroup;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserinfoRequest $request)
    {
        $data = array(
            "full_name"         => $request->input('fullname'),
            "username"          => $request->input('username'),
            "gender"            => $request->input('gender'),
            "email"             => $request->input('email'),
            "contact_no"        => $request->input('contactno'),
            "password"          => bcrypt($request->input('password') ),
            "sys_group_id"      => $request->input('usertype'),
            "created_by"        => Auth::id()
        );

        $userData = User::firstOrCreate($data);

        session()->flash('message', 'New User Created Successfully !');
        session()->flash('class', '1');
        return redirect()->route('userinfo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.userinfo.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userInfo = User::find($id);
        $allUserGroup = $this->getUserGroups();
        return view('admin.userinfo.edit',compact('userInfo','allUserGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function update(UserinfoEditRequest $request, $id)
    {
        $data = array(
            "full_name"         => $request->input('fullname'),
            // "username"          => $request->input('username'),
            "gender"            => $request->input('gender'),
            "email"             => $request->input('email'),
            "contact_no"        => $request->input('contactno'),
            // "password"          => bcrypt($request->input('password') ),
            "sys_group_id"      => $request->input('usertype'),
            "updated_by"        => Auth::id()
        );

        $userData = User::where('id',$id)->update($data);

        session()->flash('message', 'User Updated Successfully !');
        session()->flash('class', '1');
        return redirect()->route('userinfo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AssetType  $assetType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
