<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repository\ReportRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    /**
     * @var ReportRepositoryInterface
     */
    private $reportRepository;

    /**
     * ReportController constructor.
     * @param ReportRepositoryInterface $reportRepository
     */
    public function __construct(ReportRepositoryInterface $reportRepository)
    {
//        $this->middleware('permission:report.manage');
        $this->reportRepository = $reportRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('backend.admin.reports.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getReports()
    {
        return DataTables::of($this->reportRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $show = '<a href="' . route('reports.show', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.show') . '</a> ';
                $delete = '<a id="deleteButton" data-id="' . $row->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</a>';
                return $show . ' ' . $delete;
            })
            ->addColumn('created_at', function ($report) {
                return $report->created_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at'])
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function show($id)
    {
        $show = true;
        $report = $this->reportRepository->find($id);
        return view('backend.admin.reports.create-edit', compact('report', 'show'));
    }

    public function destroy(Request $request)
    {
        //
        $this->reportRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
