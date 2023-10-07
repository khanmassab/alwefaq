<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repository\PageRepositoryInterface;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    /**
     * PageController constructor.
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }
    public function index($slug)
    {
        $data = $this->pageRepository->whereSlug($slug);
        return  view('frontend.page.index',compact('data'));
   
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($slug)
    {
        $data = $this->pageRepository->whereSlug($slug);
        return  view('frontend.page',compact('data'));
    }
}
