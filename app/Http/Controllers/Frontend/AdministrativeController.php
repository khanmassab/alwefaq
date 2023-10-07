<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Administrative;
use App\Repository\AdministrativeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AdministrativeController extends Controller
{
    /**
     * @var AdministrativeRepositoryInterface
     */
    private $administrativeRepository;

    /**
     * ItemController constructor.
     * @param AdministrativeRepositoryInterface $administrativeRepository
     */
    public function __construct(AdministrativeRepositoryInterface $administrativeRepository)
    {
        $this->administrativeRepository = $administrativeRepository;
    }

    /**
     * Display a listing of the resource .
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $administratives = $this->administrativeRepository->all();

        return view('frontend.administrative',compact('administratives'));
    }


}
