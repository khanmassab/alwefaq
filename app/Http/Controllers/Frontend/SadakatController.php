<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SadakatCreateRequest;
use App\Http\Requests\Frontend\SadakatUpdateRequest;
use App\Models\Cart;
use App\Models\Sadakat;
use App\Repository\SadakatRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SadakatController extends Controller
{
    /**
     * @var SadakatRepositoryInterface
     */
    private $sadakatRepository;

    /**
     * ItemController constructor.
     * @param SadakatRepositoryInterface $sadakatRepository
     */
    public function __construct(SadakatRepositoryInterface $sadakatRepository)
    {
        $this->sadakatRepository = $sadakatRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $sadakat = $this->sadakatRepository->all();

        return view('frontend.sadakat.create',compact('sadakat'));
    }


}
