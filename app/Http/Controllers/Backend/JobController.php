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
use App\Http\Requests\Backend\JobCreateRequest;
use App\Http\Requests\Backend\JobUpdateRequest;
use App\Models\JobApplication;
use App\Repository\JobRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class JobController extends Controller
{
    /**
     * @var JobRepositoryInterface
     */
    private $jobRepository;

    /**
     * JobApplicationController constructor.
     * @param JobRepositoryInterface $jobRepository
     */
    public function __construct(JobRepositoryInterface $jobRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:jobs.manage');
        $this->middleware('permission:jobs.add', ['only' => ['create']]);
        $this->middleware('permission:jobs.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:jobs.delete', ['only' => ['destroy']]);
        $this->jobRepository = $jobRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.jobs.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->jobRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('jobs.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<a id="deleteButton" data-id="' . $row->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</a>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('start_date', function ($row) {
                return $row->start_date->format('Y-m-d');
            })
            ->addColumn('end_date', function ($row) {
                return $row->start_date->format('Y-m-d');
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at->diffForHumans();
            })
            ->addColumn('no_applications', function ($row) {

                return "<a href='". route('jobApplications.show', $row->id) ."' type='button' class='btn btn-sm btn-info'>". $row->coutapllications ."</a>";
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'no_applications'])
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
        return view('backend.admin.jobs.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobCreateRequest $request
     * @return Response
     */
    public function store(JobCreateRequest $request)
    {
        $this->jobRepository->create($request->all());
        return redirect()->route('jobs.index')->withSuccess(trans('app.success_created'));
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
        $job = $this->jobRepository->find($id);
        return view('backend.admin.jobs.add-edit', compact('edit', 'job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param JobUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(JobUpdateRequest $request, $id)
    {
        $this->jobRepository->update($request->all(), $id);
        return redirect()->route('jobs.index')->withSuccess(trans('app.success_update'));
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
        $this->jobRepository->destroy($request->id);

        return response()->json(['message' => 'success']);
    }
}
