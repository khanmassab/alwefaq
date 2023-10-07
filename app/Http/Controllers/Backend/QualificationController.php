<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:15 AM
 * Project Name: wafaq
 * File Name: QualificationController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\QualificationCreateRequest;
use App\Http\Requests\Backend\QualificationUpdateRequest;
use App\Repository\QualificationRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class QualificationController extends Controller
{
    /**
     * @var QualificationRepositoryInterface
     */
    private $qualificationRepository;

    /**
     * QualificationController constructor.
     * @param QualificationRepositoryInterface $qualificationRepository
     */
    public function __construct(QualificationRepositoryInterface $qualificationRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:qualifications.manage');
        $this->middleware('permission:qualifications.add', ['only' => ['create']]);
        $this->middleware('permission:qualifications.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:qualifications.delete', ['only' => ['destroy']]);
        $this->qualificationRepository = $qualificationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.qualifications.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->qualificationRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('qualifications.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        return view('backend.admin.qualifications.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QualificationCreateRequest $request
     * @return Response
     */
    public function store(QualificationCreateRequest $request)
    {
        $this->qualificationRepository->create($request->all());
        return redirect()->route('qualifications.index')->withSuccess(trans('app.success_created'));
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
        $qualification = $this->qualificationRepository->find($id);
        return view('backend.admin.qualifications.add-edit', compact('edit', 'qualification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QualificationUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(QualificationUpdateRequest $request, $id)
    {
        $this->qualificationRepository->update($request->all(), $id);
        return redirect()->route('qualifications.index')->withSuccess(trans('app.success_update'));
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
        $this->qualificationRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
