<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactusRequest;
use App\Mail\ContactEmail;
use App\Repository\ContactusRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    /**
     * @var ContactusRepositoryInterface
     */
    private $contactusRepository;

    /**
     * ContactUsController constructor.
     * @param ContactusRepositoryInterface $contactusRepository
     */
    public function __construct(ContactusRepositoryInterface $contactusRepository)
    {
        $this->contactusRepository = $contactusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('frontend.contact-us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactusRequest $request
     * @return void
     */
    public function store(ContactusRequest $request)
    {
        $this->contactusRepository->createContact($request);
        $objDemo = new \stdClass();
        $objDemo->username = "ادارة جمعية الوفاق";
        $objDemo->from = $request->name;
        $objDemo->subject = $request->subject;
        $objDemo->content = $request->message;
        $objDemo->email = $request->email;

        Mail::to($request->email)->send(new ContactEmail($objDemo));

        return redirect()->route('contactUs')->withSuccess(trans('frontend.contact-us-save-success'));
    }
}
