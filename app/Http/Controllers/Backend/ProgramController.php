<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProgramCreateRequest;
use App\Http\Requests\Backend\ProgramUpdateRequest;
use App\Repository\ProgramRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * @var ProgramRepositoryInterface
     */
    private $programRepository;

    /**
     * CurriculumController constructor.
     * @param ProgramRepositoryInterface $programRepository
     */
    public function __construct(ProgramRepositoryInterface $programRepository)
    {
//        $this->middleware('auth:admin');
//        $this->middleware('permission:programs.manage');
//        $this->middleware('permission:programs.add', ['only' => ['create']]);
//        $this->middleware('permission:programs.edit', ['only' => ['edit']]);
//        $this->middleware('permission:programs.delete', ['only' => ['destroy']]);
        $this->programRepository = $programRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.program.index');
    }

    public function getPrograms()
    {
        return DataTables::of($this->programRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($curriculum) {
                $edit = '<a href="' . route('programs.edit', $curriculum->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
                $parents = $this->programRepository->getParent();

        return view('backend.admin.program.create-edit', compact('edit','parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProgramCreateRequest $request
     * @return Response
     */
    public function store(ProgramCreateRequest $request)
    {
        $this->programRepository->create($request->all());
        return redirect()->route('programs.index')->withSuccess(trans('app.success_created'));
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
        $program = $this->programRepository->find($id);
                        $parents = $this->programRepository->getParent();

        return view('backend.admin.program.create-edit', compact('edit', 'program','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProgramUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ProgramUpdateRequest $request, $id)
    {
        $this->programRepository->update($request->all(), $id);
        return redirect()->route('programs.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->programRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
