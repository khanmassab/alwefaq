<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:17 AM
 * Project Name: wafaq
 * File Name: MismatchRequestController.php
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MismatchRequestCreateRequest;
use App\Http\Requests\Frontend\MismatchRequestUpdateRequest;
use App\Repository\MismatchRequestRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MismatchRequestController extends Controller
{
    /**
     * @var MismatchRequestRepositoryInterface
     */
    private $MismatchRequestRepository;

    /**
     * MismatchRequestController constructor.
     * @param MismatchRequestRepositoryInterface $MismatchRequestRepository
     */
    public function __construct(MismatchRequestRepositoryInterface $MismatchRequestRepository)
    {
        $this->MismatchRequestRepository = $MismatchRequestRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.mismatchRequest.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->MismatchRequestRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('mismatchRequest.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        return view('backend.admin.mismatchRequest.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MismatchRequestCreateRequest $request
     * @return Response
     */
    public function store(MismatchRequestCreateRequest $request)
    {
        $this->MismatchRequestRepository->createNew($request);
        return redirect()->route('suggested-partner')->withSuccess(trans('app.success_created'));
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
        $mismatchRequest = $this->MismatchRequestRepository->find($id);
        return view('backend.admin.mismatchRequest.add-edit', compact('edit', 'mismatchRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MismatchRequestUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(MismatchRequestUpdateRequest $request, $id)
    {
        $this->MismatchRequestRepository->update($request->all(), $id);
        return redirect()->route('frontend.mismatchRequest.index')->withSuccess(trans('app.success_update'));
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
        $this->MismatchRequestRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
