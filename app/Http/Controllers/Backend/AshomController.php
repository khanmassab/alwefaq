<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:32 AM
 * Last Modified: 10/21/20, 11:22 AM
 * Project Name: wafaq
 * File Name: AshomController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AshomCreateRequest;
use App\Http\Requests\Backend\AshomUpdateRequest;
use App\Repository\AshomRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class AshomController extends Controller
{
    /**
     * @var AshomRepositoryInterface
     */
    private $ashomRepository;

    /**
     * AshomController constructor.
     * @param AshomRepositoryInterface $ashomRepository
     */
    public function __construct(AshomRepositoryInterface $ashomRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:ashom.manage');
        $this->middleware('permission:ashom.add', ['only' => ['create']]);
        $this->middleware('permission:ashom.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:ashom.delete', ['only' => ['destroy']]);
        $this->ashomRepository = $ashomRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.ashom.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->ashomRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('ashom.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<a id="deleteButton" data-id="' . $row->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</a>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at->diffForHumans();
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
        return view('backend.admin.ashom.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AshomCreateRequest $request
     * @return Response
     */
    public function store(AshomCreateRequest $request)
    {
        $this->ashomRepository->create($request->all());
        return redirect()->route('ashom.index')->withSuccess(trans('app.success_created'));
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
        $ashom = $this->ashomRepository->find($id);
        return view('backend.admin.ashom.add-edit', compact('edit','ashom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AshomUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AshomUpdateRequest $request, $id)
    {
        $this->ashomRepository->update($request->all(),$id);
        return redirect()->route('ashom.index')->withSuccess(trans('app.success_update'));
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
        $this->ashomRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
