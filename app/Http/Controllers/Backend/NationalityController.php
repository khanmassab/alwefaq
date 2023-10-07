<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:17 AM
 * Project Name: wafaq
 * File Name: NationalityController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NationalityCreateRequest;
use App\Http\Requests\Backend\NationalityUpdateRequest;
use App\Repository\NationalityRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class NationalityController extends Controller
{
    /**
     * @var NationalityRepositoryInterface
     */
    private $nationalityRepository;

    /**
     * NationalityController constructor.
     * @param NationalityRepositoryInterface $nationalityRepository
     */
    public function __construct(NationalityRepositoryInterface $nationalityRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:nationalities.manage');
        $this->middleware('permission:nationalities.add', ['only' => ['create']]);
        $this->middleware('permission:nationalities.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:nationalities.delete', ['only' => ['destroy']]);
        $this->nationalityRepository = $nationalityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.nationalities.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->nationalityRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('nationalities.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<a id="deleteButton" data-id="' . $row->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</a>';
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
     * @return Factory|View
     */
    public function create()
    {
        //
        $edit = false;
        return view('backend.admin.nationalities.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NationalityCreateRequest $request
     * @return Response
     */
    public function store(NationalityCreateRequest $request)
    {
        $this->nationalityRepository->create($request->all());
        return redirect()->route('nationalities.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        //
        $edit = true;
        $nationalities = $this->nationalityRepository->find($id);
        return view('backend.admin.nationalities.add-edit', compact('edit', 'nationalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NationalityUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(NationalityUpdateRequest $request, $id)
    {
        $this->nationalityRepository->update($request->all(), $id);
        return redirect()->route('nationalities.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        //
        $this->nationalityRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
