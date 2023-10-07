<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\HelpRequestCreateRequest;
use App\Http\Requests\Frontend\HelpRequestUpdateRequest;
use App\Models\HelpRequestItem;
use App\Models\Item;
use App\Repository\HelpRequestRepositoryInterface;
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
        $this->helpRequestRepository = $helpRequestRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
        public function index()
        {

            return view('frontend.helpRequests.index');
        }
    public function requests()
    {
                $helps = $this->helpRequestRepository->currentUserRequests();

        return view('frontend.helpRequests.request',compact('helps'));

    }
    /**
     * @return mixed
     * @throws \Exception
     */
//    public function getHelpRequests()
//    {
//        $helpRequests = $this->helpRequestRepository->all();
//
//        return view('frontend.helpRequests.index',compact('helpRequests'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function createWithItems()
    {
        $items = Item::all();
        $edit = false;
        return view('frontend.helpRequests.create-items', compact('edit', 'items'));

    }

    public function create()
    {
        $edit = false;
        return view('frontend.helpRequests.create', compact('edit'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HelpRequestCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelpRequestCreateRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = auth('user')->user()->id;
        $data['status'] = 'newRequest';

        $helpRequest = $this->helpRequestRepository->create($data);

        if ($data['type'] == 'item' && !empty($data['items']))
        {
                $items = $data['items'];
                foreach ($items as $item){
                    $item_data = explode("." , $item);
                    HelpRequestItem::create([
                        'item_id' => $item_data[0],
                        'name' => $item_data[1],
                        'help_request_id' => $helpRequest->id
                    ]);
            }


        }


        return redirect()->route('help-requests')->withSuccess(trans('app.success_created'));
    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param int $id
//     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
//     */
//    public function edit($id)
//    {
//        $edit = true;
//        $helpRequest = $this->helpRequestRepository->find($id);
//        return view('backend.admin.helpRequests.create-edit', compact('edit', 'helpRequest'));
//
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param HelpRequestUpdateRequest $request
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(HelpRequestUpdateRequest $request, $id)
//    {
//        $this->helpRequestRepository->update($id,$request);
//        return redirect()->route('helpRequests.index')->withSuccess(trans('app.success_update'));
//
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function destroy(Request $request)
//    {
//        $this->helpRequestRepository->destroy($request->id);
//        return response()->json(['message' => 'success']);
//    }
}
