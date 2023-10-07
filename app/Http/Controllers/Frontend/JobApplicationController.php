<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobApplicationCreateRequest;
use App\Models\Job;
use App\Models\JobApplication;
use App\Repository\JobApplicationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class JobApplicationController extends Controller
{
    /**
     * @var JobApplicationRepositoryInterface
     */
    private $jobApplicationRepository;

    /**
     * ItemController constructor.
     * @param JobApplicationRepositoryInterface $jobApplicationRepository
     */
    public function __construct(JobApplicationRepositoryInterface $jobApplicationRepository)
    {
        $this->jobApplicationRepository = $jobApplicationRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::all();
        $jobApplications = $this->jobApplicationRepository->currentUserApplications();

        return view('frontend.jobApplications.index',compact('jobApplications', 'jobs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $edit = false;
        return view('frontend.jobApplications.create-edit', compact('edit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobApplicationCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobApplicationCreateRequest $request)
    {
        $data = $request->all();

//        $jobId = $data
        $jobApplication = $this->jobApplicationRepository->createWithUploadCV($request);

        return redirect()->back()->withSuccess(trans('app.success_created'));
    }

}
