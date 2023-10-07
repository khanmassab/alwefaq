<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PageCreateRequest;
use App\Http\Requests\Backend\PageUpdateRequest;
use App\Repository\PageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

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
        $this->middleware('auth:admin');
        $this->middleware('permission:pages.manage');
        $this->middleware('permission:pages.add', ['only' => ['create']]);
        $this->middleware('permission:pages.edit', ['only' => ['edit']]);
        $this->middleware('permission:pages.delete', ['only' => ['destroy']]);
        $this->pageRepository = $pageRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.pages.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getPages()
    {
        return DataTables::of($this->pageRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
                
                $view = '<a href="' . route('page', $lessons->slug) . '" type="button" class="btn btn-sm btn-success" target="_blank">' . trans('app.view') . '</a> ';
                $edit = '<a href="' . route('pages.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $lessons->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $view.' '.$edit . ' ' . $delete;
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
        return view('backend.admin.pages.create-edit', compact('edit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageCreateRequest $request)
    {
        $this->pageRepository->createWithSlug($request);
        return redirect()->route('pages.index')->withSuccess(trans('app.success_created'));
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
        $page = $this->pageRepository->find($id);
        return view('backend.admin.pages.create-edit', compact('edit', 'page'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, $id)
    {
        $this->pageRepository->update($id,$request);
        return redirect()->route('pages.index')->withSuccess(trans('app.success_update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->pageRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
