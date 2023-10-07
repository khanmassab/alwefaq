<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MarriageRequest;
use App\Repository\CityRepositoryInterface;
use App\Repository\HelpRequestRepositoryInterface;
use App\Repository\NationalityRepositoryInterface;
use App\Repository\QualificationRepositoryInterface;
use App\Repository\MarriageRequestRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\frontend\MarriageRequestCreateRequest;
use App\Http\Requests\frontend\MarriageRequestUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class MarriageRequestController extends Controller
{
    /**
     * @var CityRepositoryInterface
     * @var NationalityRepositoryInterface
     * @var QualificationRepositoryInterface
     * @var MarriageRequestRepositoryInterface
     * @var HelpRequestRepositoryInterface
     */
    private $cityRepository;
    private $nationalityRepository;
    private $qualificationRepository;
    private $marriageRequestRepository;
    private $helpRequestRepository;

    /**
     * MarriageRequestController constructor.
     * @param CityRepositoryInterface $cityRepository
     * @param NationalityRepositoryInterface $nationalityRepository
     * @param QualificationRepositoryInterface $qualificationRepository
     * @param MarriageRequestRepositoryInterface $qualificationRepository
     * @param HelpRepositoryInterface $qualificationRepository
     */
    public function __construct(CityRepositoryInterface $cityRepository,NationalityRepositoryInterface $nationalityRepository,QualificationRepositoryInterface $qualificationRepository,MarriageRequestRepositoryInterface $marriageRequestRepository,HelpRequestRepositoryInterface $helpRequestRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->nationalityRepository = $nationalityRepository;
        $this->qualificationRepository = $qualificationRepository;
        $this->marriageRequestRepository = $marriageRequestRepository;
        $this->helpRequestRepository = $helpRequestRepository;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $requests = $this->marriageRequestRepository->all();
        return view('backend.admin.marriageRequests.index', compact('requests'));
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->marriageRequestRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('marriageRequests.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.show') . '</a> ';
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
     * Display Suggested Partners Page.
     *
     */

    public function suggestedPartner()
    {
        $suggests = $this->marriageRequestRepository->getSuggests();
        $helps = $this->helpRequestRepository->currentUserRequests();
        $request_id = $this->marriageRequestRepository->getPartnerRequest();
        return view('backend.admin.marriageRequests.suggested', compact('suggests','helps','request_id'));
    }


    /**
     * Display add Marriage Request Page.
     *
     */

    public function addMarriageRequest()
    {
        $marriage_request = $this->marriageRequestRepository->checkMarriageRequest();
        if($marriage_request)
        {
                    return redirect()->route('create-partner-request');

        }else
        {
        $cities = $this->cityRepository->all();
        $nationalities = $this->nationalityRepository->all();
        $qualifications = $this->qualificationRepository->all();
        return view('backend.admin.marriageRequests.addMarriage', compact('cities','nationalities','qualifications'));
        }
    }
    /**
     * Display add Partner Request Page.
     *
     */

    public function addPartnerRequest()
    {
         $request_id = $this->marriageRequestRepository->checkPartnerRequest();
        if($request_id)
        {
                             return redirect()->route('suggested-partner');
        }else
        {
        $edit = false;
        $cities = $this->cityRepository->all();
        $nationalities = $this->nationalityRepository->all();
        $qualifications = $this->qualificationRepository->all();
        return view('backend.admin.marriageRequests.add-edit', compact('cities','nationalities','qualifications','edit'));
        }
    }

    /**
     * Add New Marriage Request.
     *
     */
    public function store(MarriageRequestCreateRequest $request)
    {
        $this->marriageRequestRepository->createNew($request);
        return redirect()->route('create-partner-request')->withSuccess(trans('app.success_created'));
    }
    /**
     * Add New Partner Request.
     *
     */
    public function storePartner(MarriageRequestCreateRequest $request)
    {
        $this->marriageRequestRepository->createNew($request);
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
        $request = $this->marriageRequestRepository->find($id);
        $partner = MarriageRequest::where('user_id', $request->user_id)->where('request_type',2)->first();
        return view('backend.admin.marriageRequests.show', compact('edit','request','partner'));
//        $partner = $this->marriageRequestRepository->find($id);
//        $partner2 = $this->marriageRequestRepository->where('user_id',$id)->where('request_type',1)->get();
    }
    public function show($id)
    {
        //
        $partner = $this->marriageRequestRepository->find($id);
        $request_id = $this->marriageRequestRepository->getPartnerRequest();

        return view('backend.admin.marriageRequests.show', compact('partner','request_id'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param AttributeUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(MarriageRequestUpdateRequest $request, $id)
    {
        $this->marriageRequestRepository->update($request->all(),$id);
        return redirect()->route('backend.admin.marriageRequests.index')->withSuccess(trans('app.success_update'));
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
        $this->marriageRequestRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }


}
