<?php
/*
 * Created by PhpStorm.
 * Developer: Marwa Mahmoud ( marwa.m.ebrahim@gmail.com )
 * Date: 10/21/20, 11:33 AM
 * Last Modified: 10/21/20, 11:21 AM
 * Project Name: wafaq
 * File Name: VolunteerApplicationController.php
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repository\VolunteerApplicationRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VolunteerApplicationController extends Controller
{
    /**
     * @var VolunteerApplicationRepositoryInterface
     */
    private $volunteerApplicationRepository;

    /**
     * VolunteerApplicationController constructor.
     * @param VolunteerApplicationRepositoryInterface $volunteerApplicationRepository
     */
    public function __construct(VolunteerApplicationRepositoryInterface $volunteerApplicationRepository)
    {
//        $this->middleware('auth');
//        $this->middleware('permission:volunteerApplications.manage');
//        $this->middleware('permission:volunteerApplications.add', ['only' => ['create']]);
//        $this->middleware('permission:volunteerApplications.edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:volunteerApplications.delete', ['only' => ['destroy']]);
        $this->volunteerApplicationRepository = $volunteerApplicationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.volunteerApplications.index');
    }


    /**
     * @return mixed
     * @throws \Exception
     */
    public function getVolunteerApplications()
    {
        return DataTables::of($this->volunteerApplicationRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
//                $edit = '<a href="' . route('volunteerApplications.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $lessons->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return  $delete;
            })
            ->addColumn('full_name', function ($lessons) {
                return $lessons->full_name;
            })
            ->addColumn('volunteer_id', function ($lessons) {
                return $lessons->volunteer_id;
            })
            ->addColumn('cv', function ($lessons) {
                return "<a href='". $lessons->cv ."' download='". $lessons->full_name . '-' . $lessons->created_at ."'>Download Cv</a>";
            })
            ->addColumn('created_at', function ($lessons) {
                return $lessons->created_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'cv', 'updated_at'])
            ->make(true);
    }

    public function getVolunteerApplicationsByVolunteerId($id)
    {
        return DataTables::of($this->volunteerApplicationRepository->getDatatableByVolunteerId($id))
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
//                $edit = '<a href="' . route('volunteerApplications.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $lessons->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $delete;
            })
            ->addColumn('full_name', function ($lessons) {
                return $lessons->full_name;
            })
            ->addColumn('volunteer_id', function ($lessons) {
                return $lessons->volunteer_id;
            })
            ->addColumn('cv', function ($lessons) {
                return "<a href='". $lessons->cv ."' download='". $lessons->full_name . '-' . $lessons->created_at ."'>Download Cv</a>";
            })
            ->addColumn('created_at', function ($lessons) {
                return $lessons->created_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'cv', 'updated_at'])
            ->make(true);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.admin.volunteerApplications.index', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->volunteerApplicationRepository->destroy($request->id);

        return response()->json(['message' => 'success']);
    }
}
