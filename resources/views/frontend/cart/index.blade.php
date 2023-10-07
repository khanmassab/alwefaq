@extends('layouts.user')
@section('body_class')
 fill_data shp
@endsection

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif

@php $total = 0; @endphp
@if(count($cartItems) > 0)

            <h1>صدقة</h1>
            <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الباقة</th>
                        <th>الكمية</th>
                        <th>سعر الباقة</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                                @foreach($cartItems as $key => $cartItem)


                @if($cartItem->type == "sadakat")
                    @php $total +=$cartItem->sadakat->price; @endphp
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$cartItem->sadakat->name}}</td>
                        <td>{{$cartItem->quantity}}</td>
                        <td>{{$cartItem->sadakat->price}}</td>
                       <td><form action="{{route('cart.destroy')}}" method="post">
                               @csrf<input type="hidden" name="id" value="{{$cartItem->id}}"><button type="submit">Delete</button></form></td>

                    </tr>

            @endif
            @endforeach

                </tbody>

            </table>
            <h1>اسهم</h1>

            <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم السهم</th>
                        <th>الكمية</th>
                        <th>سعر السهم الواحد</th>
                        <th>المجموع</th>
                        <th>الاجراء</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $key => $cartItem)


                @if($cartItem->type == "ashom")
                                        @php $total += $cartItem->ashom->price * $cartItem->quantity; @endphp

                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$cartItem->ashom->name}}</td>
                        <td>{{$cartItem->quantity}}</td>
                        <td>{{$cartItem->ashom->price}}</td>
                        <td>{{$cartItem->ashom->price*$cartItem->quantity  }}</td>
                                           <td><form action="{{route('cart.destroy')}}" method="post">@csrf<input type="hidden" name="id" value="{{$cartItem->id}}"><button type="submit">Delete</button></form></td>

                    </tr>

            @endif
            @endforeach

                </tbody>

            </table>
            <h1>زكاه</h1>
            <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المبلغ</th>
                        <th>الاجراء</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $key => $cartItem)


                @if($cartItem->type == "zakah")
                                        @php $total += $cartItem->price; @endphp

                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$cartItem->price}}</td>
                        <td><form action="{{ route('cart.destroy') }}" method="post">@csrf @method('POST')<input type="hidden" name="id" value="{{$cartItem->id}}"><button type="submit">Delete</button></form></td>
                    </tr>

            @endif
            @endforeach

                </tbody>

            </table>

    <h1>المجموع : {{$total}}</h1>

    <a href="{{route('checkout')}}" class="btn btn-primary btn-lg" >الدفع</a>

@else
<h1>Cart is Empty</h1>
@endif
@endsection
