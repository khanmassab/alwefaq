<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 12:14 PM
 * Last Modified: 10/21/20, 12:07 PM
 * Project Name: wafaq
 * File Name: CityController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CityCreateRequest;
use App\Http\Requests\Backend\CityUpdateRequest;
use App\Repository\AttributeRepositoryInterface;
use App\Repository\CityRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * @var CityRepositoryInterface
     */
    private $cityRepository;

    /**
     * CityController constructor.
     * @param CityRepositoryInterface $cityRepository
     */
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:cities.manage');
        $this->middleware('permission:cities.add', ['only' => ['create']]);
        $this->middleware('permission:cities.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:cities.delete', ['only' => ['destroy']]);
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.cities.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->cityRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('cities.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        return view('backend.admin.cities.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityCreateRequest $request
     * @return Response
     */
    public function store(CityCreateRequest $request)
    {
        $this->cityRepository->create($request->all());
        return redirect()->route('cities.index')->withSuccess(trans('app.success_created'));
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
        $city = $this->cityRepository->find($id);
        return view('backend.admin.cities.add-edit', compact('edit', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CityUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(CityUpdateRequest $request, $id)
    {
        $this->cityRepository->update($request->all(), $id);
        return redirect()->route('cities.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->cityRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
