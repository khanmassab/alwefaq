<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:32 AM
 * Last Modified: 10/21/20, 11:31 AM
 * Project Name: wafaq
 * File Name: AdministrativeController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdministrativeCreateRequest;
use App\Http\Requests\Backend\AdministrativeUpdateRequest;
use App\Repository\AdministrativeRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class AdministrativeController extends Controller
{
    /**
     * @var AdministrativeRepositoryInterface
     */
    private $administrativeRepository;

    /**
     * AdministrativeController constructor.
     * @param AdministrativeRepositoryInterface $administrativeRepository
     */
    public function __construct(AdministrativeRepositoryInterface $administrativeRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:administratives.manage');
        $this->middleware('permission:administratives.add', ['only' => ['create']]);
        $this->middleware('permission:administratives.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:administratives.delete', ['only' => ['destroy']]);
        $this->administrativeRepository = $administrativeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.administratives.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->administrativeRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($admin) {
                $edit = '<a href="' . route('administratives.edit', $admin->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<a id="deleteButton" data-id="' . $admin->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</a>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('created_at', function ($admin) {
                return $admin->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($admin) {
                return $admin->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        //
        $edit = false;
        return view('backend.admin.administratives.add-edit', compact( 'edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdministrativeCreateRequest $request
     * @return Response
     */
    public function store(AdministrativeCreateRequest $request)
    {
        $this->administrativeRepository->createWithUploadImage($request);
        return redirect()->route('administratives.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        //
        $edit = true;
        $administrative = $this->administrativeRepository->find($id);
        return view('backend.admin.administratives.add-edit', compact('edit','administrative'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdministrativeUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AdministrativeUpdateRequest $request, $id)
    {
        $this->administrativeRepository->updateWithUploadImage($id,$request);
        return redirect()->route('administratives.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        //
        $this->administrativeRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
