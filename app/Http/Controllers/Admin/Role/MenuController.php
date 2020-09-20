<?php

namespace App\Http\Controllers\Admin\Role;

use App\Model\Role\SysMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = new SysMenu();
        $menu = SysMenu::get();
        // echo "<pre>";
        // print_r($menu);exit;
        // $menu = $menu->with('parent')->paginate(config('common.pagination.per_page'));
        
        return view('admin.role.menu.index',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$menus = SysMenu::get()->pluck('title','id');
        $menus = SysMenu::get();
       
        $routes = \Route::getRoutes();
        $all_routes = [];
        foreach($routes as $key=>$route){
            if(in_array('GET',$route->methods)&&
                ((is_array($route->action['middleware'])&&in_array('RoleBuzz',$route->action['middleware']))||
                (!is_array($route->action['middleware'])&&$route->action['middleware']=='RoleBuzz'))
            )
            $all_routes[$route->uri]=$route->uri;
        }
        // echo "<pre>";
        // print_r($all_routes);exit;
        return view('admin.role.menu.create',compact('menus','all_routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";print_r($request->all());exit;
        $this->validate($request,[
           //'parent_id'=>'integer|nullable',
           'title'=>'required',
           'icon'=>'max:100',
           'status'=>'integer',
        ]);
        $input = $request->all();
        unset($input['_token']);
        SysMenu::firstOrCreate($input);
        $request->session()->flash('status', __('Menu Saved successfully'));
        return redirect(route('menu.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$menu = SysMenu::findOrFail($id);
        $menu = SysMenu::find($id);
        // echo "<pre>";
        // print_r($menu);exit;
        //$menus = SysMenu::where('id','!=',$id)->pluck('title','id');
        $menus = SysMenu::get();
        $routes = \Route::getRoutes();
        $all_routes = [];
        foreach($routes as $key=>$route){
            if(in_array('GET',$route->methods)&&
                ((is_array($route->action['middleware'])&&in_array('RoleBuzz',$route->action['middleware']))||
                    (!is_array($route->action['middleware'])&&$route->action['middleware']=='RoleBuzz'))
            )
                $all_routes[$route->uri]=$route->uri;
        }
        return view('admin.role.menu.edit',compact('menu','menus','all_routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            //'parent_id'=>'integer|nullable',
            'title'=>'required',
            'icon'=>'max:100',
            'status'=>'integer',
        ]);
        $inputs = $request->all();
        $inputs['status'] = isset($inputs['status'])?1:0;
        unset($inputs['_token']);
        SysMenu::findOrFail($id)->update($inputs);
        $request->session()->flash('status', __('Menu Updated Successfully'));
        return redirect(route('menu.index'));
    }

}
