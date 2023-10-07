<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AboutCreateRequest;
use App\Http\Requests\Backend\AboutUpdateRequest;
use App\Repository\AboutRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    /**
     * @var AboutRepositoryInterface
     */
    private $aboutRepository;

    /**
     * CurriculumController constructor.
     * @param AboutRepositoryInterface $aboutRepository
     */
    public function __construct(AboutRepositoryInterface $aboutRepository)
    {
//        $this->middleware('auth:admin');
//        $this->middleware('permission:abouts.manage');
//        $this->middleware('permission:abouts.add', ['only' => ['create']]);
//        $this->middleware('permission:abouts.edit', ['only' => ['edit']]);
//        $this->middleware('permission:abouts.delete', ['only' => ['destroy']]);
        $this->aboutRepository = $aboutRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.about.index');
    }

    public function getAbouts()
    {
        return DataTables::of($this->aboutRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($curriculum) {
                $edit = '<a href="' . route('abouts.edit', $curriculum->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $curriculum->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('created_at', function ($curriculum) {
                return $curriculum->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($curriculum) {
                return $curriculum->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create()
    {
        $edit = false;
                $parents = $this->aboutRepository->getParent();

        return view('backend.admin.about.create-edit', compact('edit','parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AboutCreateRequest $request
     * @return Response
     */
    public function store(AboutCreateRequest $request)
    {
        $this->aboutRepository->create($request->all());
        return redirect()->route('abouts.index')->withSuccess(trans('app.success_created'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $edit = true;
        $about = $this->aboutRepository->find($id);
                        $parents = $this->aboutRepository->getParent();

        return view('backend.admin.about.create-edit', compact('edit', 'about','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AboutUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AboutUpdateRequest $request, $id)
    {
        $this->aboutRepository->update($request->all(), $id);
        return redirect()->route('abouts.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->aboutRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
