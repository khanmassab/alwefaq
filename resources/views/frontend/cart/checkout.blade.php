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
        </tr>

        @endif
        @endforeach

    </tbody>

</table>
<h1>اسهم</h1>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم السهم</th>
            <th>الكمية</th>
            <th>سعر السهم الواحد</th>
            <th>المجموع</th>
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
            <td>{{$cartItem->ashom->price*$cartItem->quantity }}</td>

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

        </tr>
    </thead>
    <tbody>
        @foreach($cartItems as $key => $cartItem)


        @if($cartItem->type == "zakah")
        @php $total += $cartItem->price; @endphp

        <tr>
            <td>{{++$key}}</td>
            <td>{{$cartItem->price}}</td>
        </tr>

        @endif
        @endforeach

    </tbody>

</table>

<h1>المجموع : {{$total}}</h1>


<h2>طريقة الدفع</h2>
<form method="post" action="{{route('payment')}}" class="row" enctype="multipart/form-data" >
    @csrf
    <input type="hidden" name="total" value="{{$total}}" >
    <div class="form-group">
        <label>حواله بنكية</label>
        <input name="payment_method" value="حواله بنكية" checked type="radio" required="">
    </div>
    <div>
        <img src="{{asset('img/bank.jpg')}}" >
    </div>
    <div class="form-group">

        <input type="file" required name="transfer_image"  >
    </div>
    <br>
    <button class="btn btn-success" type="submit" >دفع</button>
</form>
@else

<h1>Cart is Empty</h1>

@endif

@endsection
