@extends('layouts.user')
@section('body_class')
    fill_data shop  invoice orders_pages wizard
@endsection

@section('content')


<div class=" accordion" id="heading_orderr">
                        <div class="card">
                           <div class="card-header" id="heading_order">
                              <h2 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab" aria-expanded="true" aria-controls="tab_order">
                                    <div class="title">
                                       <h2>  تفاصيل الطلب</h2>
                                    </div>
                                 </button>
                              </h2>
                           </div>
        <div id="tab_order" class="collapse show " aria-labelledby="heading_order" data-parent="#heading_orderr">
                              <div class="card-body">
                                     @php $total = $price =0; @endphp
                                    <ul class="list-unstyled content_h"> @foreach($order->order_items as $key => $cartItem)
                                    <li class="order-item" id="item{{$cartItem->id}}">
                                        <div class="item_"> {{++$key}} </div> @if($cartItem->type == "sadakat")
                                        @php $total +=$cartItem->sadakat->price * $cartItem->quantity; $price = $cartItem->sadakat->price; @endphp
                                        <div class="item_">
                                            <h4>{{$cartItem->sadakat->name}}</h4> <span>باقة : </span><span>{{$cartItem->sadakat->price}} ريال </span> </div> @elseif($cartItem->type == "ashom") @php $total += $cartItem->ashom->price * $cartItem->quantity; $price = $cartItem->ashom->price; @endphp
                                        <div class="item_">
                                            <h4>{{$cartItem->ashom->name}}</h4> <span>سعر السهم : </span><span>{{$cartItem->ashom->price}} ريال </span> </div> @else @php $total += $cartItem->price * $cartItem->quantity; $price = $cartItem->price; @endphp
                                        <div class="item_">
                                            <h4>الذكاة</h4> <span>المبلغ : </span><span>{{$cartItem->price}} ريال </span> </div> @endif
                                        <div class="item_">
                                            {{$cartItem->quantity}} </div>
                                        <div class="item_"> <span>الاجمالي : </span>{{$price * $cartItem->quantity}} ريال</div>
                                    </li> @endforeach </ul>
                                <div class="total__"> <span> الأجمالي : </span>
                                   {{$order->total}} ريال </div>

                              </div>
                           </div>
                        </div>
                     </div>


@endsection
