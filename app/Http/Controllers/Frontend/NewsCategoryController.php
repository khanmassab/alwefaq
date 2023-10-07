<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Repository\NewsCategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class NewsCategoryController extends Controller
{
    /**
     * @var NewsCategoryRepositoryInterface
     */
    private $newsCategoryRepository;

    /**
     * ItemController constructor.
     * @param NewsCategoryRepositoryInterface $newsCategoryRepository
     */
    public function __construct(NewsCategoryRepositoryInterface $newsCategoryRepository)
    {
        $this->newsCategoryRepository = $newsCategoryRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $newsCategories = NewsCategory::all();

        return view('frontend.newsCategories.index',compact('newsCategories'));
    }


}
