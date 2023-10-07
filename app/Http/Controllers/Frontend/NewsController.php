<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Repository\NewsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    /**
     * @var NewsRepositoryInterface
     */
    private $newsRepository;

    /**
     * ItemController constructor.
     * @param NewsRepositoryInterface $newsRepository
     */
    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::all();
        $categories = NewsCategory::all();

        return view('frontend.news.categories',compact('news','categories'));
    }

    public function categoryIndex($categoryId)
    {
        $news = News::where('news_category_id', $categoryId)->get();

        $categories = NewsCategory::all();


        return view('frontend.news.index',compact('news','categories'));
    }

    public function show($id)
    {

        $new = $this->newsRepository->find($id);

        return view('frontend.news.show', compact('new'));

    }

    public function showSingleNews($id, $name)
    {

        $new = $this->newsRepository->find($id);

        return view('frontend.news.show', compact('new'));

    }



}
