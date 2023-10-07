<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Repository\PartnerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PartnerController extends Controller
{
    /**
     * @var PartnerRepositoryInterface
     */
    private $partnerRepository;

    /**
     * ItemController constructor.
     * @param PartnerRepositoryInterface $partnerRepository
     */
    public function __construct(PartnerRepositoryInterface $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $partners = Partner::all();

        return view('frontend.partners.index',compact('partners'));
    }


}
