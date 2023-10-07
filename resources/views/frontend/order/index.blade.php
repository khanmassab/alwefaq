@extends('layouts.user')
@section('body_class ')
fill_data shop  invoice cart_pro
@endsection

@section('content')
 <style>
    .order_cart .header_left .first li svg{
      position: relative;
       top: 12px;
    }
    .order_cart  .header_left .second li:not(:last-child) svg{
      position: relative;
       top: 9px;
    }
    @media (max-width: 767px) {
      .order_cart .header_left .first li svg{
       top: 4px;
    }
    .order_cart  .header_left .second li:not(:last-child) svg{
      top: 1px;

    }
    }
 </style>
<div class=" accordion" id="heading_orderr">
                        <div class="card">
                           <div class="card-header" id="heading_order">
                              <h2 class="mb-0">
{{--                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab" aria-expanded="true" aria-controls="tab_order">--}}
                                    <div class="title">
                                       <h2>  الطلبات</h2>
                                    </div>
{{--                                 </button>--}}
                              </h2>
                           </div>
                           <div id="tab_order" class="collapse show " aria-labelledby="heading_order" data-parent="#heading_orderr">
                              <div class="card-body">
                                 <table class="  bt table table-bordered">
                                    <tbody><tr>
                                       <th>الرقم</th>
                                       <th>التاريخ</th>
                                       <th>الاجمالي</th>
                                       <th>الاجراء</th>
                                    </tr>
                                    @foreach($orders as $order)
                                    <tr>
                                       <td>{{$order->id}}</td>
                                       <td>{{$order->created_at}}
                                       </td>
                                       <td>{{$order->total}} ريال</td>
                                       <td><a href="{{route('order.show',$order->id)}}"><i class="fa fa-eye"></i></a></td>
                                    </tr>

                                    @endforeach

                                     </tbody>

                                  </table>
                              </div>
                           </div>
                        </div>
                     </div>


@endsection
<script>
   $=jQuery;
 $( document ).ready(function() {
    $('.table').basictable();
})
</script>
