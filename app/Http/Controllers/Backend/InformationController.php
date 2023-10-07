<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:19 AM
 * Project Name: wafaq
 * File Name: JobController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\InformationCreateRequest;
use App\Http\Requests\Backend\InformationUpdateRequest;
use App\Models\Information;
use App\Repository\InformationRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class InformationController extends Controller
{
    /**
     * @var InformationRepositoryInterface
     */
    private $informationRepository;

    /**
     * JobApplicationController constructor.
     * @param InformationRepositoryInterface $informationRepository
     */
    public function __construct(InformationRepositoryInterface $informationRepository)
    {
//        $this->middleware('auth');
//        $this->middleware('permission:jobs.manage');
//        $this->middleware('permission:jobs.add', ['only' => ['create']]);
//        $this->middleware('permission:jobs.edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:jobs.delete', ['only' => ['destroy']]);
        $this->informationRepository = $informationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.information.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->informationRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('information.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        return view('backend.admin.information.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InformationCreateRequest $request
     * @return Response
     */
    public function store(InformationCreateRequest $request)
    {
        $this->informationRepository->create($request->all());
        return redirect()->route('information.index')->withSuccess(trans('app.success_created'));
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
        $information = $this->informationRepository->find($id);
        return view('backend.admin.information.add-edit', compact('edit', 'information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InformationUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(InformationUpdateRequest $request, $id)
    {
        $this->informationRepository->update($request->all(), $id);
        return redirect()->route('information.index')->withSuccess(trans('app.success_update'));
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
        $this->informationRepository->destroy($request->id);

        return response()->json(['message' => 'success']);
    }
}
