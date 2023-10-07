<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Repository\JobRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{
    /**
     * @var JobRepositoryInterface
     */
    private $jobRepository;

    /**
     * ItemController constructor.
     * @param JobRepositoryInterface $jobRepository
     */
    public function __construct(JobRepositoryInterface $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::all();

        return view('frontend.jobs.index',compact('jobs'));
    }

    public function show($id)
    {

        $job = $this->jobRepository->find($id);

        return view('frontend.jobs.show', compact('job','id'));

    }

}
