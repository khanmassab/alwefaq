<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NewsCreateRequest;
use App\Http\Requests\Backend\NewsUpdateRequest;
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
     * NewsController constructor.
     * @param NewsRepositoryInterface $newsRepository
     */
    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:news.manage');
        $this->middleware('permission:news.add', ['only' => ['create']]);
        $this->middleware('permission:news.edit', ['only' => ['edit']]);
        $this->middleware('permission:news.delete', ['only' => ['destroy']]);
        $this->newsRepository = $newsRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.news.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getNews()
    {
        return DataTables::of($this->newsRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
                $edit = '<a href="' . route('news.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
               $delete = '<button id="deleteButton" data-id="' . $lessons->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('created_at', function ($lessons) {
                return $lessons->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($lessons) {
                return $lessons->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $edit = false;
        $categories = NewsCategory::all();
        return view('backend.admin.news.create-edit', compact('edit', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        $this->newsRepository->createWithUploadImage($request);
        return redirect()->route('news.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $edit = true;
        $news = $this->newsRepository->find($id);
        $categories = NewsCategory::all();

        return view('backend.admin.news.create-edit', compact('edit', 'news', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        $this->newsRepository->updateWithUploadImage($id, $request);
        return redirect()->route('news.index')->withSuccess(trans('app.success_update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->newsRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
