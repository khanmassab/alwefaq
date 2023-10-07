<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repository\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\Frontend\OrderCreateRequest;
use App\Http\Requests\Frontend\OrderUpdateRequest;

class OrderController extends Controller
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * OrderController constructor.
     * @param OrderRepositoryInterface $qualificationRepository
     */
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $orders = $this->orderRepository->getMyOrders();
        return view('frontend.order.index', compact('orders'));
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
    
    
    
    public function store(OrderCreateRequest $request)
    {
        $this->orderRepository->createNew($request);
        return redirect()->route('create-partner-request')->withSuccess(trans('app.success_created'));
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
        $request = $this->orderRepository->find($id);
        return view('frontend.order.add-edit', compact('edit','request'));
        
    }
    
    public function show($id)
    {
        
        $order = $this->orderRepository->find($id);
        
        return view('frontend.order.show', compact('order'));
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param AttributeUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(OrderUpdateRequest $request, $id)
    {
        $this->orderRepository->update($request->all(),$id);
        return redirect()->route('frontend.order.index')->withSuccess(trans('app.success_update'));
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
        return redirect()->route('frontend.order.index')->withSuccess(trans('app.success_update'));
    }
    
    
}
