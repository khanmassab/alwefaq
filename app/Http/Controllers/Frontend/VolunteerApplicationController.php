<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\VolunteerApplicationCreateRequest;
use App\Models\Volunteer;
use App\Models\VolunteerApplication;
use App\Repository\VolunteerApplicationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class VolunteerApplicationController extends Controller
{
    /**
     * @var VolunteerApplicationRepositoryInterface
     */
    private $volunteerApplicationRepository;

    /**
     * ItemController constructor.
     * @param VolunteerApplicationRepositoryInterface $volunteerApplicationRepository
     */
    public function __construct(VolunteerApplicationRepositoryInterface $volunteerApplicationRepository)
    {
        $this->volunteerApplicationRepository = $volunteerApplicationRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $volunteers = Volunteer::all();
        $volunteerApplications = $this->volunteerApplicationRepository->currentUserApplications();

        return view('frontend.volunteerApplications.index',compact('volunteerApplications', 'volunteers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $edit = false;
        return view('frontend.volunteerApplications.create-edit', compact('edit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VolunteerApplicationCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VolunteerApplicationCreateRequest $request)
    {
        $data = $request->all();

//        $volunteerId = $data
        $volunteerApplication = $this->volunteerApplicationRepository->createWithUploadCV($request);

        return redirect()->back()->withSuccess(trans('app.success_created'));
    }

}
