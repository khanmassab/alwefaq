<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
//use App\Http\Requests\Backend\ItemCreateRequest;
use App\Http\Requests\Backend\HelpRequestUpdateRequest;
use App\Repository\HelpRequestRepositoryInterface;
use App\Support\Enum\HelpRequestStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class HelpRequestController extends Controller
{
    /**
     * @var HelpRequestRepositoryInterface
     */
    private $helpRequestRepository;

    /**
     * ItemController constructor.
     * @param HelpRequestRepositoryInterface $helpRequestRepository
     */
    public function __construct(HelpRequestRepositoryInterface $helpRequestRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:helpRequests.manage');
        $this->middleware('permission:helpRequests.add', ['only' => ['create']]);
        $this->middleware('permission:helpRequests.edit', ['only' => ['edit']]);
        $this->middleware('permission:helpRequests.delete', ['only' => ['destroy']]);
        $this->helpRequestRepository = $helpRequestRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.helpRequests.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getHelpRequests()
    {
        return DataTables::of($this->helpRequestRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
                $edit = '<a href="' . route('helpRequests.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.view') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $lessons->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit .' '. $delete;
            })
            ->addColumn('status', function ($lessons) {
                return trans('app.' . $lessons->status);
            })
            ->addColumn('created_at', function ($lessons) {
                return $lessons->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($lessons) {
                return $lessons->updated_at->diffForHumans();
            })
            ->rawColumns(['action', 'created_at', 'updated_at'])
            ->make(true);
    }



//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
//     */
//    public function create()
//    {
//        $edit = false;
//        return view('backend.admin.helpRequests.create-edit', compact('edit'));
//
//    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param ItemCreateRequest $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(ItemCreateRequest $request)
//    {
//        $data = $request->all();
//        $album = $this->itemRepository->create($data);
//        return redirect()->route('items.edit',$album->id)->withSuccess(trans('app.success_created'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $edit = true;
        $status = HelpRequestStatus::lists();

        $helpRequest = $this->helpRequestRepository->find($id);
//        echo '<pre>';
//        print_r($helpRequest->help_request_items()->get()->item()->first());
//        echo "</pre>";
//        die;
        return view('backend.admin.helpRequests.create-edit', compact('edit', 'helpRequest','status'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param HelpRequestUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(HelpRequestUpdateRequest $request, $id)
    {
        $this->helpRequestRepository->update($id,$request);
        return redirect()->route('helpRequests.index')->withSuccess(trans('app.success_update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->helpRequestRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
