<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:16 AM
 * Project Name: wafaq
 * File Name: SadakatController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SadakatCreateRequest;
use App\Http\Requests\Backend\SadakatUpdateRequest;
use App\Repository\SadakatRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class SadakatController extends Controller
{
    /**
     * @var SadakatRepositoryInterface
     */
    private $sadakatRepository;

    /**
     * SadakatController constructor.
     * @param SadakatRepositoryInterface $sadakatRepository
     */
    public function __construct(SadakatRepositoryInterface $sadakatRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:sadakat.manage');
        $this->middleware('permission:sadakat.add', ['only' => ['create']]);
        $this->middleware('permission:sadakat.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sadakat.delete', ['only' => ['destroy']]);
        $this->sadakatRepository = $sadakatRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.sadakat.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->sadakatRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('sadakat.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        return view('backend.admin.sadakat.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SadakatCreateRequest $request
     * @return Response
     */
    public function store(SadakatCreateRequest $request)
    {
        $this->sadakatRepository->create($request->all());
        return redirect()->route('sadakat.index')->withSuccess(trans('app.success_created'));
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
        $sadakat = $this->sadakatRepository->find($id);
        return view('backend.admin.sadakat.add-edit', compact('edit', 'sadakat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SadakatUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(SadakatUpdateRequest $request, $id)
    {
        $this->sadakatRepository->update($request->all(), $id);
        return redirect()->route('sadakat.index')->withSuccess(trans('app.success_update'));
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
        $this->sadakatRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
