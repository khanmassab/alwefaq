<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceCreateRequest;
use App\Http\Requests\Backend\ServiceUpdateRequest;
use App\Models\Service;
use App\Repository\ServiceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * @var ServiceRepositoryInterface
     */
    private $serviceRepository;

    /**
     * ServiceController constructor.
     * @param ServiceRepositoryInterface $serviceRepository
     */
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
//        $this->middleware('auth:admin');
//        $this->middleware('permission:news.manage');
//        $this->middleware('permission:news.add', ['only' => ['create']]);
//        $this->middleware('permission:news.edit', ['only' => ['edit']]);
//        $this->middleware('permission:news.delete', ['only' => ['destroy']]);
        $this->serviceRepository = $serviceRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.services.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getServices()
    {
        return DataTables::of($this->serviceRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
                $edit = '<a href="' . route('services.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        $services = Service::all();
                $parents = $this->serviceRepository->getParent();
        
        return view('backend.admin.services.create-edit', compact('edit', 'services','parents'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCreateRequest $request)
    {
        $this->serviceRepository->create($request->all());
        return redirect()->route('services.index')->withSuccess(trans('app.success_created'));
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
                $parents = $this->serviceRepository->getParent();
        
        $service = $this->serviceRepository->find($id);
        return view('backend.admin.services.create-edit', compact('edit', 'service','parents'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdateRequest $request, $id)
    {
        $this->serviceRepository->update($id, $request);
        return redirect()->route('services.index')->withSuccess(trans('app.success_update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->serviceRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
