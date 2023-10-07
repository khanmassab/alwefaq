<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repository\ContactusRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ContactUsController extends Controller
{
    /**
     * @var ContactusRepositoryInterface
     */
    private $contactusRepository;

    /**
     * ContactUsController constructor.
     * @param ContactusRepositoryInterface $contactusRepository
     */
    public function __construct(ContactusRepositoryInterface $contactusRepository)
    {
        $this->middleware('permission:contactus.manage');
        $this->contactusRepository = $contactusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('backend.admin.contactus.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getContactus()
    {
        return DataTables::of($this->contactusRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $show = '<a href="' . route('contactus.show', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.show') . '</a> ';
                $delete = '<a id="deleteButton" data-id="' . $row->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</a>';
                return $show . ' ' . $delete;
            })
            ->addColumn('created_at', function ($contactus) {
                return $contactus->created_at->diffForHumans();
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
        $contactus = $this->contactusRepository->find($id);
        return view('backend.admin.contactus.create-edit', compact('contactus', 'show'));
    }

    public function destroy(Request $request)
    {
        //
        $this->contactusRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
