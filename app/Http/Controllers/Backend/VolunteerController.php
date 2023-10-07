<?php
/*
 * Created by PhpStorm.
 * Developer: Marwa Mahmoud ( marwa.m.ebrahim@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:19 AM
 * Project Name: wafaq
 * File Name: VolunteerController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\VolunteerCreateRequest;
use App\Http\Requests\Backend\VolunteerUpdateRequest;
use App\Models\VolunteerApplication;
use App\Repository\VolunteerRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class VolunteerController extends Controller
{
    /**
     * @var VolunteerRepositoryInterface
     */
    private $volunteerRepository;

    /**
     * VolunteerApplicationController constructor.
     * @param VolunteerRepositoryInterface $volunteerRepository
     */
    public function __construct(VolunteerRepositoryInterface $volunteerRepository)
    {
//        $this->middleware('auth');
//        $this->middleware('permission:volunteers.manage');
//        $this->middleware('permission:volunteers.add', ['only' => ['create']]);
//        $this->middleware('permission:volunteers.edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:volunteers.delete', ['only' => ['destroy']]);
        $this->volunteerRepository = $volunteerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //
        return view('backend.admin.volunteers.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->volunteerRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('volunteers.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<a id="deleteButton" data-id="' . $row->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</a>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('start_date', function ($row) {
                return $row->start_date->format('Y-m-d');
            })
            ->addColumn('end_date', function ($row) {
                return $row->start_date->format('Y-m-d');
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at->diffForHumans();
            })
            ->addColumn('no_applications', function ($row) {

                return "<a href='". route('volunteerApplications.show', $row->id) ."' type='button' class='btn btn-sm btn-info'>". $row->coutapllications ."</a>";
            })
            ->rawColumns(['action', 'created_at', 'updated_at', 'no_applications'])
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
        return view('backend.admin.volunteers.add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VolunteerCreateRequest $request
     * @return Response
     */
    public function store(VolunteerCreateRequest $request)
    {
        $this->volunteerRepository->create($request->all());
        return redirect()->route('volunteers.index')->withSuccess(trans('app.success_created'));
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
        $volunteer = $this->volunteerRepository->find($id);
        return view('backend.admin.volunteers.add-edit', compact('edit', 'volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VolunteerUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(VolunteerUpdateRequest $request, $id)
    {
        $this->volunteerRepository->update($request->all(), $id);
        return redirect()->route('volunteers.index')->withSuccess(trans('app.success_update'));
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
        $this->volunteerRepository->destroy($request->id);

        return response()->json(['message' => 'success']);
    }
}
