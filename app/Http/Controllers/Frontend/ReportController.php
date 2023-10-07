<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ReportRequest;
use App\Mail\ReportEmail;
use App\Models\User;
use App\Repository\ReportRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;


class ReportController extends Controller
{
    /**
     * @var ReportRepositoryInterface
     */
    private $reportRepository;

    /**
     * ReportController constructor.
     * @param ReportRepositoryInterface $reportRepository
     */
    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('frontend.reports');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReportRequest $request
     * @return void
     */
    public function store(ReportRequest $request)
    {
        $this->reportRepository->createReport($request);

        $objDemo = new \stdClass();
        $objDemo->username = "ادارة جمعية الوفاق";
        $objDemo->from = $request->name;
        $objDemo->subject = $request->subject;
        $objDemo->content = $request->message;
        $objDemo->email = $request->email;

        Mail::to($request->email)->send(new ReportEmail($objDemo));

        return redirect()->route('report')->withSuccess(trans('frontend.reports-save-success'));

    }
}
