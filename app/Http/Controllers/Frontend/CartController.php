<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CartCreateRequest;
use App\Http\Requests\Frontend\CartUpdateRequest;
use App\Http\Requests\Frontend\OrderCreateRequest;
use App\Http\Requests\Frontend\OrderUpdateRequest;
use App\Http\Requests\Frontend\OrderItemCreateRequest;
use App\Http\Requests\Frontend\OrderItemUpdateRequest;
use App\Http\Requests\Frontend\TransferCreateRequest;
use App\Http\Requests\Frontend\TransferUpdateRequest;
use App\Models\Cart;
use App\Repository\CartRepositoryInterface;
use App\Repository\SadakatRepositoryInterface;
use App\Repository\AshomRepositoryInterface;
use App\Repository\OrderRepositoryInterface;
use App\Repository\OrderItemRepositoryInterface;
use App\Repository\TransferRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CartController extends Controller
{
    /**
     * @var CartRepositoryInterface
     */
    private $cartRepository;
    private $ashomRepository;
    private $sadakatRepository;
    private $orderRepository;
    private $orderItemRepository;
    private $transferRepository;

    /**
     * ItemController constructor.
     * @param CartRepositoryInterface $cartRepository
     */
    public function __construct(CartRepositoryInterface $cartRepository,SadakatRepositoryInterface $sadakatRepository,AshomRepositoryInterface $ashomRepository,OrderRepositoryInterface $orderRepository,TransferRepositoryInterface $transferRepository,OrderItemRepositoryInterface $orderItemRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->sadakatRepository = $sadakatRepository;
        $this->ashomRepository = $ashomRepository;
        $this->orderRepository = $orderRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->transferRepository = $transferRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $cartItems = $this->cartRepository->getMyCart();

        $totalCart = $this->getTotalPrice();

        return view('frontend.cart.index',compact('cartItems', 'totalCart'));
    }

    public function checkout()
    {
        $cartItems = $this->cartRepository->getMyCart();

        return view('frontend.cart.checkout',compact('cartItems'));
    }

    public function success()
    {

        return view('frontend.cart.success');
    }

    public function payment(OrderCreateRequest $request1,TransferCreateRequest $request2)
    {
        $order = $this->orderRepository->createOrder($request1);
        $transfer = $this->transferRepository->createTransfer($request2,$order->id);
        $order_items = $this->orderItemRepository->createOrderItems($order->id);
        Cart::where('user_id', auth()->user()->id)->delete();

        return Response()->json([
                "success" => true,
            ]);
    }

    public function shop()
    {
        //$cartItems = $this->cartRepository->getMyCart();
        $sadakats = $this->sadakatRepository->all();
        $ashoms = $this->ashomRepository->all();

        return view('frontend.cart.shop',compact('sadakats','ashoms'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CartCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartCreateRequest $request)
    {
        $data = $request->all();


        $checkExistItem = Cart::where('type',$data['type'])
            ->where('item_id',$data['item_id'])
            ->where('price',$data['price'] ?? null)
            ->where('user_id',auth('user')->user()->id)->first();
        if ($checkExistItem){
            Cart::find($checkExistItem->id)->update(
                [
                    'quantity' => $checkExistItem->quantity+$data['quantity']
                ]
            );
        }
        else {
            $data['user_id'] = auth('user')->user()->id;

            $this->cartRepository->create($data);
        }



        return redirect()->route('shop')->withSuccess('تم الاضافة للسله بنجاح ');
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
        $cartItem = $this->cartRepository->find($id);
        return view('fontend.cart.create-edit', compact('edit', 'cartItem'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param CartUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CartUpdateRequest $request, $id)
    {
        $this->cartRepository->update($id, $request);

        return response()->json(['message' => 'success']);

    }

    /**
     * Get total price of the cart.
     *
     * @return int
     */
    public function getTotalPrice()
    {
        $cartItems = $this->cartRepository->all();
        $total = 0;
        foreach ($cartItems as $cartItem){

            if ($cartItem['type'] == 'sadakat')
            {
                $price = Sadakat::where('id' , $cartItem->item_id)->first()->price * $cartItem->quantity ;
            }elseif ($cartItem['type'] == 'ashom'){
                $price = Ashom::where('id' , $cartItem->item_id)->first()->price * $cartItem->quantity ;

            }elseif ($cartItem['type'] == 'zakah'){
                $price = $cartItem->price;
            }

            $total += $price ;
        }

        return $total;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->cartRepository->destroy($request->id);
        return response()->json(['message' => 'success']);
    }
}
