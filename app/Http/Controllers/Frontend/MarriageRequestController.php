<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MarriageRequest;
use App\Repository\CityRepositoryInterface;
use App\Repository\HelpRequestRepositoryInterface;
use App\Repository\NationalityRepositoryInterface;
use App\Repository\QualificationRepositoryInterface;
use App\Repository\MarriageRequestRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\Frontend\MarriageRequestCreateRequest;
use App\Http\Requests\Frontend\MarriageRequestUpdateRequest;
use App\Models\MatchRequest;

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
     * @param MarriageRequestRepositoryInterface $marriageRequestRepository
     * @param HelpRequestRepositoryInterface $helpRequestRepository
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
        $requests = $this->marriageRequestRepository->getMyRequests();
        return view('frontend.marriageRequest.index', compact('requests'));
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
                $edit = '<a href="' . route('attributes.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.edit') . '</a> ';
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
        $request_id = $this->marriageRequestRepository->getMarriageRequest();
        $request = $this->marriageRequestRepository->find($request_id);
//        $my_request_id = $this->marriageRequestRepository->getMyRequests();
//        $my_request = $this->marriageRequestRepository->find($my_request_id);


        return view('frontend.marriageRequest.suggested', compact('suggests','request_id','request'));
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
        $edit = false;
        
        $request = MarriageRequest::where('user_id',Auth::user()->id)->where('request_type', 1)->first();
        
        // dd($request);
        return view('frontend.marriageRequest.addMarriage', compact('edit', 'request', 'cities','nationalities','qualifications'));
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
        return view('frontend.marriageRequest.add-edit', compact('cities','nationalities','qualifications','edit'));
        }
    }

    /**
     * Add New Marriage Request.
     * @param MarriageRequestCreateRequest $request
     * @return
     */

    public function store(MarriageRequestCreateRequest $request)
    {
        $this->marriageRequestRepository->createNew($request);
        return redirect()->route('create-partner-request')->withSuccess(trans('app.success_created'));
    }

    /**
     * Add New Partner Request.
     * @param MarriageRequestCreateRequest $request
     * @return
     */

    public function storePartner(MarriageRequestCreateRequest $request)
    {
        $this->marriageRequestRepository->createNew($request);
        return redirect()->route('suggested-partner')->withSuccess(trans('app.success_created'));
    }

    public function show($id)
    {
        //
        $suggestIds = [];

        foreach ($this->marriageRequestRepository->getSuggests() as $suggest){
            $suggestIds[] = $suggest->id;
        }
        if(!in_array($id, $suggestIds))
            return redirect(url('/'));

        $partner = $this->marriageRequestRepository->find($id);

        $request_id = $this->marriageRequestRepository->getPartnerRequest();

        $checkMatchDone = MatchRequest::where('match_request_id', $partner->id)
                            ->where('request_id', $request_id)
                            ->where('user_id', auth()->user()->id)->first();


        $matched = MatchRequest::where('status', 1)
                            ->where('request_id', $request_id)
                            ->where('user_id', auth()->user()->id)->first();

        return view('frontend.marriageRequest.show', compact('partner','request_id', 'checkMatchDone','matched'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function editMarriage($id)
    {
        //
        $edit = true;
//        $request = $this->marriageRequestRepository->find($id);
        $request = MarriageRequest::where('user_id',Auth::user()->id)->where('request_type',1)->first();
        $cities = $this->cityRepository->all();
        $nationalities = $this->nationalityRepository->all();
        $qualifications = $this->qualificationRepository->all();
        return view('frontend.marriageRequest.addMarriage', compact('edit','request','cities','nationalities','qualifications'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param AttributeUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function updateMarriage(MarriageRequestUpdateRequest $request, $id)
    {
        $this->marriageRequestRepository->update($request->all(),$id);

        return redirect()->route('partner.edit', $id)->withSuccess(trans('app.success_update'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function editPartner($id)
    {
        //
        $edit = true;
        $request = MarriageRequest::where('user_id',Auth::user()->id)->where('request_type',2)->first();

        $partnerRequest = $this->marriageRequestRepository->getPartnerRequest();
        $cities = $this->cityRepository->all();
        $nationalities = $this->nationalityRepository->all();
        $qualifications = $this->qualificationRepository->all();
        return view('frontend.marriageRequest.add-edit', compact('edit', 'request','partnerRequest','cities','nationalities','qualifications'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param AttributeUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function updatePartner(MarriageRequestUpdateRequest $request, $id)
    {
        $this->marriageRequestRepository->update($request->all(),$id);
        return redirect()->route('suggested-partner')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function delete($id)
    {
        $user = Auth::user()->id;

        MarriageRequest::where('user_id',$user)->delete();
        MatchRequest::where('user_id',$user)->delete();
        MatchRequest::where('match_request_id',$id)->delete();
//      $this->marriageRequestRepository->destroy($request->id);

        return redirect(url('marriage-request'))->withSuccess(trans('app.success_update'));
    }


}
