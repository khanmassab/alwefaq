<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\InitiativeCreateRequest;
use App\Http\Requests\Backend\InitiativeUpdateRequest;
use App\Repository\InitiativeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class InitiativeController extends Controller
{
    /**
     * @var InitiativeRepositoryInterface
     */
    private $initiativeRepository;

    /**
     * CurriculumController constructor.
     * @param InitiativeRepositoryInterface $initiativeRepository
     */
    public function __construct(InitiativeRepositoryInterface $initiativeRepository)
    {
//        $this->middleware('auth:admin');
//        $this->middleware('permission:initiatives.manage');
//        $this->middleware('permission:initiatives.add', ['only' => ['create']]);
//        $this->middleware('permission:initiatives.edit', ['only' => ['edit']]);
//        $this->middleware('permission:initiatives.delete', ['only' => ['destroy']]);
        $this->initiativeRepository = $initiativeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.initiative.index');
    }

    public function getInitiatives()
    {
        return DataTables::of($this->initiativeRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($curriculum) {
                $edit = '<a href="' . route('initiatives.edit', $curriculum->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        $parents = $this->initiativeRepository->getParent();
        return view('backend.admin.initiative.create-edit', compact('edit','parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InitiativeCreateRequest $request
     * @return Response
     */
    public function store(InitiativeCreateRequest $request)
    {
        $this->initiativeRepository->create($request->all());
        return redirect()->route('initiatives.index')->withSuccess(trans('app.success_created'));
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
        $initiative = $this->initiativeRepository->find($id);
        $parents = $this->initiativeRepository->getParent();
        
        return view('backend.admin.initiative.create-edit', compact('edit', 'initiative','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InitiativeUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(InitiativeUpdateRequest $request, $id)
    {
        $this->initiativeRepository->update($request->all(), $id);
        return redirect()->route('initiatives.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->initiativeRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
