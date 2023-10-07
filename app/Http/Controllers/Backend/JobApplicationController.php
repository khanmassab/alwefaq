<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:21 AM
 * Project Name: wafaq
 * File Name: JobApplicationController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repository\JobApplicationRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobApplicationController extends Controller
{
    /**
     * @var JobApplicationRepositoryInterface
     */
    private $jobApplicationRepository;

    /**
     * JobApplicationController constructor.
     * @param JobApplicationRepositoryInterface $jobApplicationRepository
     */
    public function __construct(JobApplicationRepositoryInterface $jobApplicationRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:jobApplications.manage');
        $this->middleware('permission:jobApplications.add', ['only' => ['create']]);
        $this->middleware('permission:jobApplications.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:jobApplications.delete', ['only' => ['destroy']]);
        $this->jobApplicationRepository = $jobApplicationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.jobApplications.index');
    }


    /**
     * @return mixed
     * @throws \Exception
     */
    public function getJobApplications()
    {
        return DataTables::of($this->jobApplicationRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
//                $edit = '<a href="' . route('jobApplications.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $lessons->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return  $delete;
            })
            ->addColumn('full_name', function ($lessons) {
                return $lessons->full_name;
            })
            ->addColumn('job_id', function ($lessons) {
                return $lessons->job_id;
            })
            ->addColumn('cv', function ($lessons) {
                return "<a href='". $lessons->cv ."' download='". $lessons->full_name . '-' . $lessons->created_at ."'>Download Cv</a>";
            })
            ->addColumn('created_at', function ($lessons) {
                return $lessons->created_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'cv', 'updated_at'])
            ->make(true);
    }

    public function getJobApplicationsByJobId($id)
    {
        return DataTables::of($this->jobApplicationRepository->getDatatableByJobId($id))
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
//                $edit = '<a href="' . route('jobApplications.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $lessons->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $delete;
            })
            ->addColumn('full_name', function ($lessons) {
                return $lessons->full_name;
            })
            ->addColumn('job_id', function ($lessons) {
                return $lessons->job_id;
            })
            ->addColumn('cv', function ($lessons) {
                return "<a href='". $lessons->cv ."' download='". $lessons->full_name . '-' . $lessons->created_at ."'>Download Cv</a>";
            })
            ->addColumn('created_at', function ($lessons) {
                return $lessons->created_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'cv', 'updated_at'])
            ->make(true);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.admin.jobApplications.index', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->jobApplicationRepository->destroy($request->id);

        return response()->json(['message' => 'success']);
    }
}
