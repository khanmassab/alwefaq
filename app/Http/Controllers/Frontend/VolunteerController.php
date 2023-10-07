<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use App\Repository\VolunteerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class VolunteerController extends Controller
{
    /**
     * @var VolunteerRepositoryInterface
     */
    private $volunteerRepository;

    /**
     * ItemController constructor.
     * @param VolunteerRepositoryInterface $volunteerRepository
     */
    public function __construct(VolunteerRepositoryInterface $volunteerRepository)
    {
        $this->volunteerRepository = $volunteerRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $volunteers = Volunteer::all();

        return view('frontend.volunteers.index',compact('volunteers'));
    }

    public function show($id)
    {

        $volunteer = $this->volunteerRepository->find($id);

        return view('frontend.volunteers.show', compact('volunteer','id'));

    }

}
