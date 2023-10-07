<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/14/20, 3:09 PM
 * Last Modified: 1/5/20, 1:53 AM
 * Project Name: Wafaq
 * File Name: RolesController.php
 */


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Cache;

class RolesController extends Controller
{
    /**
     * RolesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:roles.manage');
//        $this->middleware('permission:roles.add', ['only' => ['create']]);
//        $this->middleware('permission:roles.edit', ['only' => ['edit']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $edit = false;
        return view('backend.admin.role.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:roles,name'
        ]);
        Role::create($request->all());
        return redirect()->route('role.index')->withSuccess(trans('app.role_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $edit = true;
        $role = Role::find($id);
        return view('backend.admin.role.add-edit', compact('edit', 'role'));
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
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:roles,name,' . $id
        ]);
        Role::find($id)->update($request->all());
        return redirect()->route('role.index')->withSuccess(trans('app.role_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        Cache::flush();
        return redirect()->route('role.index')->withSuccess(trans('app.role_deleted'));
    }
}
