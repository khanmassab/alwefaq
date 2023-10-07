<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:22 AM
 * Project Name: wafaq
 * File Name: AttributeController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AttributeCreateRequest;
use App\Http\Requests\Backend\AttributeUpdateRequest;
use App\Repository\AttributeRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class AttributeController extends Controller
{
    /**
     * @var AttributeRepositoryInterface
     */
    private $attributeRepository;

    /**
     * AttributeController constructor.
     * @param AttributeRepositoryInterface $attributeRepository
     */
    public function __construct(AttributeRepositoryInterface $attributeRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:attributes.manage');
        $this->middleware('permission:attributes.add', ['only' => ['create']]);
        $this->middleware('permission:attributes.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:attributes.delete', ['only' => ['destroy']]);
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.attributes.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->attributeRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('attributes.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        return view('backend.admin.attributes.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AttributeCreateRequest $request
     * @return Response
     */
    public function store(AttributeCreateRequest $request)
    {
        $this->attributeRepository->create($request->all());
        return redirect()->route('attributes.index')->withSuccess(trans('app.success_created'));
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
        $attribute = $this->attributeRepository->find($id);
        return view('backend.admin.attributes.add-edit', compact('edit','attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AttributeUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AttributeUpdateRequest $request, $id)
    {
        $this->attributeRepository->update($request->all(),$id);
        return redirect()->route('attributes.index')->withSuccess(trans('app.success_update'));
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
        $this->attributeRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
