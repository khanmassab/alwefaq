<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repository\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\backend\OrderCreateRequest;
use App\Http\Requests\frontend\OrderUpdateRequest;
use App\Repository\OrderItemRepositoryInterface;
use App\Repository\TransferRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;


class OrderController extends Controller
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;
    private $orderItemRepository;
    private $transferRepository;
    

    /**
     * OrderController constructor.
     * @param OrderRepositoryInterface $qualificationRepository
     */
    public function __construct(OrderRepositoryInterface $orderRepository,TransferRepositoryInterface $transferRepository,OrderItemRepositoryInterface $orderItemRepository)
    {
        $this->middleware('auth:admin');
        //$this->middleware('permission:orders.manage');
        //$this->middleware('permission:orders.add', ['only' => ['create']]);
        //$this->middleware('permission:orders.edit', ['only' => ['edit']]);
        //$this->middleware('permission:orders.delete', ['only' => ['destroy']]);
        
        $this->orderRepository = $orderRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->transferRepository = $transferRepository;
        
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $orders = $this->orderRepository->getMyOrders();
        return view('backend.admin.orders.index', compact('orders'));
    }
    
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDatatable()
    {
        return Datatables::of($this->orderRepository->getDatatable())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $edit = '<a href="' . route('orders.edit', $row->id) . '" type="button" class="btn btn-sm btn-info">' . trans('app.show') . '</a> ';
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
    
    
    /*
    public function store(OrderCreateRequest $request)
    {
        $this->orderRepository->createNew($request);
        return redirect()->route('create-partner-request')->withSuccess(trans('app.success_created'));
    }
    */
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
        $request = $this->orderRepository->find($id);
        $transfer = $this->transferRepository->getOrderTransfer($id);
        $order_items = $this->orderItemRepository->getOrderItems($id);
        
        return view('backend.admin.orders.create-edit', compact('edit','request','transfer','order_items'));
        
    }
    
    public function show($id)
    {
        
        $order = $this->orderRepository->find($id);
        
        return view('backend.admin.orders.show', compact('order'));
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param AttributeUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->orderRepository->update($id,$request);
        return redirect()->route('orders.index')->withSuccess(trans('app.success_update'));
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
        $this->orderRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
    
    
}
