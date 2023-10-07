<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repository\AshomRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AshomController extends Controller
{
    /**
     * @var AshomRepositoryInterface
     */
    private $ashomRepository;

    /**
     * ItemController constructor.
     * @param AshomRepositoryInterface $ashomRepository
     */
    public function __construct(AshomRepositoryInterface $ashomRepository)
    {
        $this->ashomRepository = $ashomRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $ashom = $this->ashomRepository->all();

        return view('frontend.ashom.index',compact('ashom'));
    }


}
