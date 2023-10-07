<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Repository\FooterRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class FooterController extends Controller
{
    /**
     * @var FooterRepositoryInterface
     */
    private $footerRepository;

    /**
     * ItemController constructor.
     * @param FooterRepositoryInterface $footerRepository
     */
    public function __construct(FooterRepositoryInterface $footerRepository)
    {
        $this->footerRepository = $footerRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $footers = Footer::all();
        return view('frontend.footers.index',compact('footers'));
    }

    public function show($id)
    {

        $footer = $this->footerRepository->find($id);

        return view('frontend.footers.show', compact('footer'));

    }

//    public function showSingleFooter($id, $name)
//    {
//
//        $footer = $this->footerRepository->find($id);
//
//        return view('frontend.footers.show', compact('footer'));
//
//    }



}
