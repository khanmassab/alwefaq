<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PartnerCreateRequest;
use App\Http\Requests\Backend\PartnerUpdateRequest;
use App\Models\Partner;
use App\Repository\PartnerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PartnerController extends Controller
{
    /**
     * @var PartnerRepositoryInterface
     */
    private $partnerRepository;

    /**
     * PartnerController constructor.
     * @param PartnerRepositoryInterface $partnerRepository
     */
    public function __construct(PartnerRepositoryInterface $partnerRepository)
    {
//        $this->middleware('auth:admin');
//        $this->middleware('permission:partners.manage');
//        $this->middleware('permission:partners.add', ['only' => ['create']]);
//        $this->middleware('permission:partners.edit', ['only' => ['edit']]);
//        $this->middleware('permission:partners.delete', ['only' => ['destroy']]);
        $this->partnerRepository = $partnerRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.admin.partners.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getPartners()
    {
        return DataTables::of($this->partnerRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($lessons) {
                $edit = '<a href="' . route('partners.edit', $lessons->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
                $delete = '<button id="deleteButton" data-id="' . $lessons->id . '" type="button" class="btn btn-sm btn-danger">' . trans('app.delete') . '</button>';
                return $edit .' '. $delete;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
//        $partners = Partner::all();
        $edit = false;
        return view('backend.admin.partners.create-edit', compact('edit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerCreateRequest $request)
    {
        $this->partnerRepository->createWithUploadImage($request);
        return redirect()->route('partners.index')->withSuccess(trans('app.success_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $edit = true;
        $partner = $this->partnerRepository->find($id);
        return view('backend.admin.partners.create-edit', compact('edit', 'partner'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param PartnerUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerUpdateRequest $request, $id)
    {
        $this->partnerRepository->updateWithUploadImage($id,$request);
        return redirect()->route('partners.index')->withSuccess(trans('app.success_update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->partnerRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
