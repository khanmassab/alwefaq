<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SystemCreateRequest;
use App\Http\Requests\Backend\SystemUpdateRequest;
use App\Repository\SystemRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class SystemController extends Controller
{
    /**
     * @var SystemRepositoryInterface
     */
    private $systemRepository;

    /**
     * CurriculumController constructor.
     * @param SystemRepositoryInterface $systemRepository
     */
    public function __construct(SystemRepositoryInterface $systemRepository)
    {
//        $this->middleware('auth:admin');
//        $this->middleware('permission:systems.manage');
//        $this->middleware('permission:systems.add', ['only' => ['create']]);
//        $this->middleware('permission:systems.edit', ['only' => ['edit']]);
//        $this->middleware('permission:systems.delete', ['only' => ['destroy']]);
        $this->systemRepository = $systemRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.system.index');
    }

    public function getSystems()
    {
        return DataTables::of($this->systemRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($curriculum) {
                $edit = '<a href="' . route('systems.edit', $curriculum->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $curriculum->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit . ' ' . $delete;
            })
//            ->addColumn('image', function ($curriculum) {
//                return "<img style='max-height: 30px; max-width: 60px;' src='{$curriculum->image}'/>";
//            })
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
                $parents = $this->systemRepository->getParent();
        
        return view('backend.admin.system.create-edit', compact('edit','parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SystemCreateRequest $request
     * @return Response
     */
    public function store(SystemCreateRequest $request)
    {
        $this->systemRepository->create($request->all());
        return redirect()->route('systems.index')->withSuccess(trans('app.success_created'));
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
                        $parents = $this->systemRepository->getParent();

        $system = $this->systemRepository->find($id);
        return view('backend.admin.system.create-edit', compact('edit', 'system','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SystemUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(SystemUpdateRequest $request, $id)
    {
        $this->systemRepository->update($request->all(), $id);
        return redirect()->route('systems.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->systemRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
