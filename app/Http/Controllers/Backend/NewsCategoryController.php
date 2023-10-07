<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NewsCategoryCreateRequest;
use App\Http\Requests\Backend\NewsCategoryUpdateRequest;
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
     * NewsController constructor.
     * @param NewsCategoryRepositoryInterface $newsCategoryRepository
     */
    public function __construct(NewsCategoryRepositoryInterface $newsCategoryRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:newsCategories.manage');
        $this->middleware('permission:newsCategories.add', ['only' => ['create']]);
        $this->middleware('permission:newsCategories.edit', ['only' => ['edit']]);
        $this->middleware('permission:newsCategories.delete', ['only' => ['destroy']]);
        $this->newsCategoryRepository = $newsCategoryRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.newsCategories.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getNewsCategories()
    {
        return DataTables::of($this->newsCategoryRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('newsCategories.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $row->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at->diffForHumans();
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
        return view('backend.admin.newsCategories.create-edit', compact('edit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCategoryCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCategoryCreateRequest $request)
    {
        $this->newsCategoryRepository->createWithUploadImage($request);
        return redirect()->route('newsCategories.index')->withSuccess(trans('app.success_created'));
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
        $newsCategory = $this->newsCategoryRepository->find($id);
        return view('backend.admin.newsCategories.create-edit', compact('edit', 'newsCategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsCategoryUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCategoryUpdateRequest $request, $id)
    {
        $this->newsCategoryRepository->updateWithUploadImage($id, $request);
        return redirect()->route('newsCategories.index')->withSuccess(trans('app.success_update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->newsCategoryRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
