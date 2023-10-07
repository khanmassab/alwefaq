<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/14/20, 6:37 PM
 * Last Modified: 9/14/20, 6:37 PM
 * Project Name: Wafaq
 * File Name: AdminsController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminCreateRequest;
use App\Http\Requests\Backend\AdminUpdateRequest;
use App\Repository\AdminRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class AdminsController extends Controller
{

    /**
     * @var AdminRepositoryInterface
     */
    private $adminRepository;
    protected $guard = 'admin';

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:admins.manage');
        $this->middleware('permission:admins.add', ['only' => ['create']]);
        $this->middleware('permission:admins.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admins.delete', ['only' => ['destroy']]);
        $this->adminRepository = $adminRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        return view('backend.admin.admins.index');
    }

    public function getAdmins()
    {
        return Datatables::of($this->adminRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($admin) {
                $edit = '<a href="' . route('admins.edit', $admin->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<a id="deleteButton" data-id="' . $admin->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</a>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('created_at', function ($admin) {
                return $admin->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($admin) {
                return $admin->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'status'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id');
        $edit = false;
        $profile = false;
        return view('backend.admin.admins.add-edit', compact('roles', 'edit', 'profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(AdminCreateRequest $request)
    {
        $this->adminRepository->createWithRole($request->all());
        return redirect()->route('admins.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //
        $edit = true;
        $admin = $this->adminRepository->find($id);
        $roles = Role::pluck('name', 'name');
        return view('backend.admin.admins.add-edit', compact('edit', 'admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        $this->adminRepository->updateWithRole($id,$request->all());
        return redirect()->route('admins.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        //
        $this->adminRepository->delete($request->id);
        return response()->json(['message' => 'success']);
    }
}
