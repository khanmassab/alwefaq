<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FooterCreateRequest;
use App\Http\Requests\Backend\FooterUpdateRequest;
use App\Repository\FooterRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class FooterController extends Controller
{
    /**
     * @var FooterRepositoryInterface
     */
    private $footerRepository;

    /**
     * CurriculumController constructor.
     * @param FooterRepositoryInterface $footerRepository
     */
    public function __construct(FooterRepositoryInterface $footerRepository)
    {
//        $this->middleware('auth:admin');
//        $this->middleware('permission:footers.manage');
//        $this->middleware('permission:footers.add', ['only' => ['create']]);
//        $this->middleware('permission:footers.edit', ['only' => ['edit']]);
//        $this->middleware('permission:footers.delete', ['only' => ['destroy']]);
        $this->footerRepository = $footerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.footer.index');
    }

    public function getFooters()
    {
        return DataTables::of($this->footerRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($curriculum) {
                $edit = '<a href="' . route('footers.edit', $curriculum->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        return view('backend.admin.footer.create-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FooterCreateRequest $request
     * @return Response
     */
    public function store(FooterCreateRequest $request)
    {
        $this->footerRepository->create($request->all());
        return redirect()->route('footers.index')->withSuccess(trans('app.success_created'));
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
        $footer = $this->footerRepository->find($id);
        return view('backend.admin.footer.create-edit', compact('edit', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FooterUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(FooterUpdateRequest $request, $id)
    {
        $this->footerRepository->update($request->all(), $id);
        return redirect()->route('footers.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->footerRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
