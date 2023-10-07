<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:17 AM
 * Project Name: wafaq
 * File Name: MatchRequestController.php
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MatchRequestCreateRequest;
use App\Http\Requests\Frontend\MatchRequestUpdateRequest;
use App\Repository\MatchRequestRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MatchRequestController extends Controller
{
    /**
     * @var MatchRequestRepositoryInterface
     */
    private $MatchRequestRepository;

    /**
     * MatchRequestController constructor.
     * @param MatchRequestRepositoryInterface $MatchRequestRepository
     */
    public function __construct(MatchRequestRepositoryInterface $MatchRequestRepository)
    {
        $this->MatchRequestRepository = $MatchRequestRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.matchRequest.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->MatchRequestRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('matchRequest.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        return view('backend.admin.matchRequest.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MatchRequestCreateRequest $request
     * @return Response
     */
    public function store(MatchRequestCreateRequest $request)
    {
        $this->MatchRequestRepository->createNew($request);
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
        $matchRequest = $this->MatchRequestRepository->find($id);
        return view('backend.admin.matchRequest.add-edit', compact('edit', 'matchRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MatchRequestUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(MatchRequestUpdateRequest $request, $id)
    {
        $this->MatchRequestRepository->update($request->all(), $id);
        return redirect()->route('frontend.matchRequest.index')->withSuccess(trans('app.success_update'));
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
        $this->MatchRequestRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
