<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Rowaad">
    <meta name="description" content="جمعية الوفاق  ">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('frontend/images/logo.png') }}" alt="icon" type="image/x-icon"
        sizes="40*40" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="https://s.cdpn.io/42883/mixins.scss">

    <!-- swiper slider css files -->
    <link rel="stylesheet" href="{{ asset('css/swiper/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper/swiper2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    <!-- fonts -->
    <!--
    <link rel="stylesheet" href="{{ asset('fonts/Bukra/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/DIN-Arabic/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/loew/loew.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/Helvetica/helvetica.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('fonts/FrutigerLTArabic-67BoldCn.css') }}">

    <link rel="stylesheet" href="{{ asset('css/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon/flaticon.css') }}">
    <!-- animation -->
    <link rel="stylesheet" href="{{ asset('css/animation/aos.css') }}">
    <!-- main stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-new.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @yield('css')
</head>

<body class="page order_cart">
    <!-- Header -->@php
        $cart = AppHelper::cart();
        $cart_count = 0;
    @endphp

    <div class="modal fade in" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="bookModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content2">
                <div class="modal-body  ">
                    <div class="title_page ">
                        <h2>السلة</h2>
                        <button type="button" class="close close_model text-center" data-dismiss="modal"
                            aria-label="Close"> <span aria-hidden="true"> إغلاق</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.706" height="24.329"
                                viewBox="0 0 25.706 24.329">
                                <g id="Group_714" data-name="Group 714" transform="translate(-198 -222.086)">
                                    <g id="Group_601" data-name="Group 601" transform="translate(-1363 -858)">
                                        <g id="Component_1_16" data-name="Component 1 – 16"
                                            transform="translate(1562 1081.5)">
                                            <path id="Path_11605" data-name="Path 11605"
                                                d="M1572.75,1103,1562,1092.25l10.75-10.75"
                                                transform="translate(-1562 -1081.5)" fill="none" stroke="#fff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        </g>
                                        <path id="Path_11606" data-name="Path 11606"
                                            d="M1579.75,1103,1569,1092.25l10.75-10.75" transform="translate(5.542)"
                                            fill="none" stroke="#bfc9ce" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"></path>
                                    </g>
                                </g>
                            </svg>
                        </button>
                    </div>
                    @if (count($cart) > 0) @php $total = $price =0; @endphp
                        <div id="book-details">
                            <h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25.734" height="24.274"
                                    viewBox="0 0 25.734 24.274">
                                    <g id="Group_600" data-name="Group 600" transform="translate(-658.149 -360.696)">
                                        <path id="Path_11489" data-name="Path 11489"
                                            d="M671.813,395.306a3.242,3.242,0,1,0,3.242,3.242A3.246,3.246,0,0,0,671.813,395.306Zm1.632,3.242a1.632,1.632,0,1,1-1.632-1.632A1.634,1.634,0,0,1,673.445,398.548Z"
                                            transform="translate(-5.058 -16.87)" fill="#fff" stroke="#fff"
                                            stroke-width="0.1" />
                                        <path id="Path_11490" data-name="Path 11490"
                                            d="M683.673,366.225a.807.807,0,0,0-.642-.32H663.862l-.357-2a3.568,3.568,0,0,0-2.881-2.873l-1.417-.247a.8.8,0,1,0-.375,1.565.716.716,0,0,0,.079.015l1.437.251a1.946,1.946,0,0,1,1.571,1.573l1.944,10.96a2.989,2.989,0,0,0,2.95,2.479h11.538a3.011,3.011,0,0,0,2.866-2.13l2.581-8.556A.829.829,0,0,0,683.673,366.225Zm-1.722,1.284-2.273,7.514h0a1.39,1.39,0,0,1-1.326.986H666.82a1.365,1.365,0,0,1-1.367-1.15l-1.3-7.351Z"
                                            fill="#fff" stroke="#fff" stroke-width="0.1" />
                                        <path id="Path_11491" data-name="Path 11491"
                                            d="M694.342,395.306a3.242,3.242,0,1,0,3.241,3.242A3.245,3.245,0,0,0,694.342,395.306Zm1.632,3.242a1.632,1.632,0,1,1-1.632-1.632A1.634,1.634,0,0,1,695.974,398.548Z"
                                            transform="translate(-16.06 -16.87)" fill="#fff" stroke="#fff"
                                            stroke-width="0.1" />
                                    </g>
                                </svg>
                            </h3>
                            <section>
                                <div class="date content_h ">
                                    <ul class="list-unstyled">
                                        @foreach ($cart as $key => $cartItem)
                                            <li class="order-item" id="item{{ $cartItem->id }}">
                                                <div class="item_" data-status="{{ $cartItem->status }}">
                                                    {{ ++$key }} </div>
                                                @if ($cartItem->type == 'sadakat')
                                                    @php$total += $cartItem->sadakat->price * $cartItem->quantity;
                                                    $price = $cartItem->sadakat->price; @endphp
                                                    <div class="item_">
                                                        <h4>{{ $cartItem->sadakat->name }}</h4> <span>باقة :
                                                        </span><span>{{ $cartItem->sadakat->price }} ريال </span>
                                                    </div>
                                                @elseif($cartItem->type == 'ashom')
                                                    @php
                                                        $total += $cartItem->ashom->price * $cartItem->quantity;
                                                        $price = $cartItem->ashom->price;
                                                    @endphp
                                                    <div class="item_">
                                                        <h4>{{ $cartItem->ashom->name }}</h4> <span>سعر السهم :
                                                        </span><span>{{ $cartItem->ashom->price }} ريال </span>
                                                    </div>
                                                @else
                                                    @php
                                                        $total += $cartItem->price * $cartItem->quantity;
                                                        $price = $cartItem->price;
                                                    @endphp
                                                    <div class="item_">
                                                        <h4>الذكاة</h4> <span>المبلغ :
                                                        </span><span>{{ $cartItem->price }} ريال </span>
                                                    </div>
                                                @endif
                                                <div class="item_">
                                                    @php $cart_count += $cartItem->quantity; @endphp
                                                    <input type="number"
                                                        @if ($cartItem->type == 'zakah') disabled="disabled" @endif
                                                        @if ($cartItem->type == 'ashom') max="{{ $cartItem->ashom->total_stocks }}" @endif
                                                        data-item="{{ $cartItem->id }}"
                                                        data-type="{{ $cartItem->type }}" class="updateQty"
                                                        min="1" value="{{ $cartItem->quantity }}" />
                                                </div>
                                                <div class="item_" style="display:block;"> <span>الاجمالى : </span>
                                                    <div style="display:flex;">

                                                        <input type="hidden" value="{{ $price }}"
                                                            class="item-price" id="itemPrice{{ $cartItem->id }}">

                                                        <input type="hidden"
                                                            value="{{ $price * $cartItem->quantity }}"
                                                            class="item-total" id="itemTotal{{ $cartItem->id }}">

                                                        <input type="text" class="priceItemPrice"
                                                            value="{{ $price * $cartItem->quantity }} ريال"
                                                            readonly />
                                                    </div>
                                                </div>
                                                <div class="item_ ">
                                                    <div class="dropdown">
                                                        <button type="button" data-item="{{ $cartItem->id }}"
                                                            class="btn dropdown-toggle btn-danger deleteItem"> <i
                                                                class="fa fa-trash"></i> </button>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="total__" style="display:block;">
                                        <span>
                                            الأجمالي :
                                        </span>
                                        <div style="display:flex;">
                                            <input type="text" readonly="readonly" id="total" name="total"
                                                value="{{ $total }} ريال" />
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25.083" height="24.907"
                                    viewBox="0 0 25.083 24.907">
                                    <g id="Group_593" data-name="Group 593"
                                        transform="translate(-1873.648 -751.592)">
                                        <path id="Path_11773" data-name="Path 11773"
                                            d="M1898.538,767.784a.7.7,0,0,0-.009-.079l-1.894-10.408a3.678,3.678,0,0,0-1.239-1.934.662.662,0,0,0-.149-.092l-5.642-2.622a11.469,11.469,0,0,0-4.768-1.054h-10.4a.734.734,0,0,0-.539.159.7.7,0,0,0,.387,1.234.668.668,0,0,0,.127,0h10.425a10.072,10.072,0,0,1,4.182.928l5.595,2.615a2.294,2.294,0,0,1,.652,1.037l1.1,6.049-.62-.483a7.42,7.42,0,0,0-2.62-1.312l-.18-.049-.035-.182c-.222-1.133-.35-1.745-.383-1.821a.692.692,0,0,0-.38-.382.683.683,0,0,0-.536,0,.7.7,0,0,0-.414.8c.026.1.112.519.211,1.014l.072.358-.365,0a7.44,7.44,0,0,0-5.012,1.968l-.389.359-.108-.519c-.138-.671-.274-1.3-.39-1.818l-.032-.144.094-.113a5.784,5.784,0,0,1,2.307-1.676.712.712,0,0,0,.5-.878.7.7,0,0,0-.986-.429,7.044,7.044,0,0,0-3.258,2.6.685.685,0,0,0-.078.509,71.59,71.59,0,0,1,1.468,8.069,1.334,1.334,0,0,1-1.317,1.337h0a1.284,1.284,0,0,1-1.076-.579l-4.293-8.869a.644.644,0,0,0-.058-.1,2.533,2.533,0,0,0-2.061-1.067h-1.988a.685.685,0,0,0-.448.247.7.7,0,0,0,.475,1.146h1.961a1.131,1.131,0,0,1,.87.407l4.3,8.853a2.7,2.7,0,0,0,2.316,1.347,1.7,1.7,0,0,0,.277-.013l.2-.018.091.183a7.476,7.476,0,0,0,10.028,3.343c.08-.04.159-.082.237-.124a.686.686,0,0,0,.284-.431.7.7,0,0,0-.972-.783,6.077,6.077,0,0,1-8.231-2.438l-.175-.332.162-.156a2.679,2.679,0,0,0,.819-1.921,28.065,28.065,0,0,0-.531-3.7l-.027-.126.072-.106a6.079,6.079,0,0,1,10.8,5.307.71.71,0,0,0,.362.943.7.7,0,0,0,.917-.37.615.615,0,0,0,.038-.115,7.582,7.582,0,0,0,.273-3.545l.19-.04Z"
                                            fill="#ccd2d4" />
                                        <path id="Path_11774" data-name="Path 11774"
                                            d="M1891.431,771.9a.7.7,0,0,0,.7-.7v-4.482a.7.7,0,0,0-.7-.7h0a.716.716,0,0,0-.416.141l-1.594,1.207a.7.7,0,0,0,.859,1.1l.46-.29V771.2A.7.7,0,0,0,1891.431,771.9Z"
                                            fill="#ccd2d4" />
                                    </g>
                                </svg>
                            </h3>
                            <section>
                                <div class="pays content_h">
                                    <div class="title_page  ">
                                        <h2> ملخص الطلب</h2>
                                    </div>
                                    <div class="total__"> <span> الأجمالي : </span>
                                        <input type="text" id="total2" readonly disabled
                                            value=" {{ $total }} ريال " />
                                    </div>
                                    <div class="title_page  title_page2">
                                        <h2> اختار طريقة الدفع</h2>
                                    </div>
                                    <!--
                           <div class=" accordion" id="accordione">
                              <div class="card">
                                 <div class="card-header" id="heading_pay1">
                                    <h2 class="mb-0">
                                       <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab_pay1" aria-expanded="true" aria-controls="tab_pay1">
                                          <div class="title">
                                             <h4>  الدفع عن طريق بطاقة الائتمان</h4>
                                          </div>
                                       </button>
                                    </h2>
                                 </div>
                                 <div id="tab_pay1" class="collapse  " aria-labelledby="heading_pay1" data-parent="#accordione">
                                    <div class="card-body">
                                       <form action="" method="">
                                          <p>
                                             <label> رقم البطاقة </label>
                                             <input type="number" class="form-control" name=""  placeholder ="7419  9412  5910  9218" />
                                          </p>
                                          <p>
                                             <label> cvv  </label>
                                             <input type="number" class="form-control" name=""   placeholder="253"/>
                                          </p>
                                          <p>
                                             <label>  اسم حامل البطاقة</label>
                                             <input type="name" class="form-control" name=""  placeholder="Anass " />
                                          </p>
                                          <p class="diff" >
                                             <label>     تاريخ الانتهاء </label>
                                             <select class="form-control select_ ">
                                                <option>                          10</option>
                                                <option>                          10</option>
                                                <option>                          10</option>
                                                <option>                          10</option>
                                             </select>
                                             <select class="form-control select_ ">
                                                <option>                          February</option>
                                                <option>                          February</option>
                                                <option>                          February</option>
                                                <option>                          February</option>
                                             </select>
                                             <select class="form-control select_ ">
                                                <option>                          1967</option>
                                                <option>                          1967</option>
                                                <option>                          1967</option>
                                                <option>                          1967</option>
                                             </select>
                                          </p>
                                          <p class="check">
                                             <label>  <span>  احفظ البطاقة لدفع اسرع المرة القادمة</span>
                                             <input type="radio" class="form-check-input" value=""  checked name="">
                                             </label>
                                          </p>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=" accordion" id="accordione2">
                              <div class="card">
                                 <div class="card-header" id="heading_pay2">
                                    <h2 class="mb-0">
                                       <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab_pay2" aria-expanded="true" aria-controls="tab_pay2">
                                          <div class="title">
                                             <h4>الدفع عن طريق مدي</h4>
                                          </div>
                                       </button>
                                    </h2>
                                 </div>
                                 <div id="tab_pay2" class="collapse  " aria-labelledby="heading_pay2" data-parent="#accordione2">
                                    <div class="card-body">
                                       <form action="" method="">
                                          <p>
                                             <label> رقم البطاقة </label>
                                             <input type="number" class="form-control" name=""  placeholder ="7419  9412  5910  9218" />
                                          </p>
                                          <p>
                                             <label> cvv  </label>
                                             <input type="number" class="form-control" name=""   placeholder="253"/>
                                          </p>
                                          <p>
                                             <label>  اسم حامل البطاقة</label>
                                             <input type="name" class="form-control" name=""  placeholder="Anass " />
                                          </p>
                                          <p class="diff" >
                                             <label>     تاريخ الانتهاء </label>
                                             <select class="form-control select_ ">
                                                <option>                          10</option>
                                                <option>                          10</option>
                                                <option>                          10</option>
                                                <option>                          10</option>
                                             </select>
                                             <select class="form-control select_ ">
                                                <option>                          February</option>
                                                <option>                          February</option>
                                                <option>                          February</option>
                                                <option>                          February</option>
                                             </select>
                                             <select class="form-control select_ ">
                                                <option>                          1967</option>
                                                <option>                          1967</option>
                                                <option>                          1967</option>
                                                <option>                          1967</option>
                                             </select>
                                          </p>
                                          <p class="check">
                                             <label>  <span>  احفظ البطاقة لدفع اسرع المرة القادمة</span>
                                             <input type="radio" class="form-check-input" value=""  checked name="">
                                             </label>
                                          </p>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                            -->
                                    <div class=" accordion" id="accordione3">
                                        <div class="card">
                                            <div class="card-header" id="heading_pay3">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link" type="button"
                                                        data-toggle="collapse" data-target="#tab_pay3"
                                                        aria-expanded="true" aria-controls="tab_pay3">
                                                        <div class="title">
                                                            <h4>الدفع عن طريق التحويل البنكي</h4>
                                                        </div>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="tab_pay3" class="collapse  " aria-labelledby="heading_pay3"
                                                data-parent="#accordione3">
                                                <div class="card-body text-center">
                                                    <h3>بنك الراجحي : SA1680000663608010004446</h3>
                                                    <hr>
                                                    <h3>بنك البلاد : SA5115000999131201620006</h3>
                                                    <hr>

                                                    <h3>بنك الإنماء : SA9505000068202756706000</h3>
                                                    {{--                                                <div><img class="img-fluid" src="{{asset('images/bank.jpg')}}"></div> --}}
                                                    <br>
                                                    <form id="checkoutform" enctype="multipart/form-data"
                                                        action="{{ route('payment') }}" method="post">
                                                        @csrf
                                                        <p>
                                                            <label>صورة الحواله</label>
                                                            <input accept="image/*" type="file"
                                                                name="transfer_image" id="transfer_image"
                                                                required="required">
                                                        </p>
                                                        <input name="total" type="hidden" id="total3"
                                                            value="{{ $total }}">
                                                        <input name="payment_method" value="حواله بنكية"
                                                            type="hidden">

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24.401" height="28.023"
                                    viewBox="0 0 24.401 28.023">
                                    <g id="Group_596" data-name="Group 596"
                                        transform="translate(-1901.569 -707.749)">
                                        <path id="Path_11777" data-name="Path 11777"
                                            d="M1922.872,729.742a.82.82,0,0,0,1.119-.284,13.759,13.759,0,0,0,1.979-7v-8.815a.816.816,0,0,0-.489-.745h0l-11.438-5.074a.82.82,0,0,0-.333-.071.8.8,0,0,0-.332.071l-11.323,5.075a.816.816,0,0,0-.484.744v8.817a14.083,14.083,0,0,0,3.538,9.146,12.694,12.694,0,0,0,3.869,3.015,10.688,10.688,0,0,0,4.8,1.155,10.925,10.925,0,0,0,6.5-2.168.816.816,0,0,0-.972-1.3,9.325,9.325,0,0,1-5.53,1.847c-5.533,0-10.57-5.569-10.57-11.684v-8.294l10.513-4.713.123.054,10.495,4.661v8.286a12.115,12.115,0,0,1-1.742,6.17.814.814,0,0,0,.285,1.116Z"
                                            fill="#ccd2d4" />
                                        <path id="Path_11778" data-name="Path 11778"
                                            d="M1914.738,725.771l5.55-7.75a.816.816,0,0,0-1.326-.952l-.29.405v0l-5.21,7.28a.946.946,0,0,1-1.341.115l-3.585-3.5a.816.816,0,1,0-1.139,1.17l3.561,3.475a2.77,2.77,0,0,0,1.8.716c.046,0,.092,0,.138,0A2.592,2.592,0,0,0,1914.738,725.771Z"
                                            fill="#ccd2d4" />
                                    </g>
                                </svg>
                            </h3>
                            <section>
                                <div class="thanks content_h">
                                    <div class="text-center thanks_">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="74.015" height="85.001"
                                            viewBox="0 0 74.015 85.001">
                                            <g id="Group_660" data-name="Group 660"
                                                transform="translate(-1901.569 -707.749)">
                                                <path id="Path_11777" data-name="Path 11777"
                                                    d="M1966.186,774.46a2.487,2.487,0,0,0,3.395-.862,41.739,41.739,0,0,0,6-21.245V725.615a2.476,2.476,0,0,0-1.483-2.26h-.006L1939.4,707.964a2.486,2.486,0,0,0-1.01-.215,2.422,2.422,0,0,0-1.007.215l-34.346,15.394a2.475,2.475,0,0,0-1.468,2.257v26.744A42.716,42.716,0,0,0,1912.3,780.1a38.5,38.5,0,0,0,11.735,9.146,32.417,32.417,0,0,0,14.544,3.5,33.137,33.137,0,0,0,19.713-6.576,2.474,2.474,0,0,0-2.949-3.958,28.287,28.287,0,0,1-16.774,5.6c-16.783,0-32.062-16.892-32.062-35.441V727.22l31.889-14.3.373.164,31.834,14.138v25.134a36.746,36.746,0,0,1-5.284,18.715,2.47,2.47,0,0,0,.864,3.385Z"
                                                    transform="translate(0 0)" fill="#6ec51e" />
                                                <path id="Path_11778" data-name="Path 11778"
                                                    d="M1930.17,744.157,1947,720.649a2.476,2.476,0,0,0-4.022-2.888l-.879,1.229,0-.006-15.8,22.082a2.868,2.868,0,0,1-4.068.349l-10.874-10.607a2.476,2.476,0,1,0-3.455,3.549l10.8,10.541a8.4,8.4,0,0,0,5.469,2.172c.139,0,.279,0,.418-.012A7.861,7.861,0,0,0,1930.17,744.157Z"
                                                    transform="translate(11.345 18.257)" fill="#6ec51e" />
                                            </g>
                                        </svg>
                                        <h2>تم العملية بنجاح شكرا لك</h2>
                                        <p>نسأل الله ان يتقبل منا ومنكم صالح الأعمال وأن يجمعنا بكم في الفردوس الاعلى
                                        </p>
                                        <ul class="list-inline ">
                                            <li class="list-inline-item"> <a href="{{ route('order.index') }}">
                                                    مشاركاتك
                                                </a> </li>
                                            <li class="list-inline-item"> <a href="{{ route('home') }}">
                                                    الصفحة الرئسية
                                                </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">إغلاق </span>
                        </button>
                    @else
                        <div class="p-5 text-center">
                            <h1>السلة فارغة</h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <header class="d-none d-sm-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-12">
                    <a href="{{ route('home') }}">
                        <div class="header_right d-flex">
                            <a href="{{ route('home') }}"><img src="{{ asset('images/after_about.svg') }}"
                                    class="img-fluid" alt=" " /></a>

                        </div>
                    </a>
                </div>

                <div class="col-xl-10 col-lg-10 col-md-10 col-12" style="padding-right: 80pc; padding-left: 0%">
                    <div class="header_left d-flex">
                        <ul class="list-inline first " style="padding-left: 11pc">
                            <li class="list-inline-item">
                                <a href="#" data-toggle="modal" data-target="#bookModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.617" height="24.16"
                                        viewBox="0 0 25.617 24.16">
                                        <g id="Group_492" data-name="Group 492"
                                            transform="translate(-658.214 -360.76)">
                                            <path id="Path_11489" data-name="Path 11489"
                                                d="M671.813,395.306a3.242,3.242,0,1,0,3.242,3.242A3.246,3.246,0,0,0,671.813,395.306Zm1.632,3.242a1.632,1.632,0,1,1-1.632-1.632A1.634,1.634,0,0,1,673.445,398.548Z"
                                                transform="translate(-5.058 -16.87)" fill="#fff" />
                                            <path id="Path_11490" data-name="Path 11490"
                                                d="M683.673,366.225a.807.807,0,0,0-.642-.32H663.862l-.357-2a3.568,3.568,0,0,0-2.881-2.873l-1.417-.247a.8.8,0,1,0-.375,1.565.716.716,0,0,0,.079.015l1.437.251a1.946,1.946,0,0,1,1.571,1.573l1.944,10.96a2.989,2.989,0,0,0,2.95,2.479h11.538a3.011,3.011,0,0,0,2.866-2.13l2.581-8.556A.829.829,0,0,0,683.673,366.225Zm-1.722,1.284-2.273,7.514h0a1.39,1.39,0,0,1-1.326.986H666.82a1.365,1.365,0,0,1-1.367-1.15l-1.3-7.351Z"
                                                fill="#fff" />
                                            <path id="Path_11491" data-name="Path 11491"
                                                d="M694.342,395.306a3.242,3.242,0,1,0,3.241,3.242A3.245,3.245,0,0,0,694.342,395.306Zm1.632,3.242a1.632,1.632,0,1,1-1.632-1.632A1.634,1.634,0,0,1,695.974,398.548Z"
                                                transform="translate(-16.06 -16.87)" fill="#fff" />
                                        </g>
                                    </svg> <span id="num">{{ $cart_count }}</span> </a>
                            </li>
                        </ul>
                        <ul class=" list-inline second admin ">
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <a type="button" data-toggle="dropdown">
                                        @if (auth('user')->user()->gender == 'male')
                                            <img src="{{ asset('/new/img/user.png') }}">
                                        @else
                                            <img src="{{ asset('/new/img/user.png') }}">
                                        @endif
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('profile') }}">الملف الشخصى</a>
                                        <a class="dropdown-item" href="{{ route('changePassword') }}">اعدادات
                                            الحساب</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            style="z-index:1000;">تسجيل الخروج</a>
                                    </div>
                                </div>
                            </li>
                            {{--                            <li class="list-inline-item"> --}}
                            {{--                                <a href="{{route('profile')}}"> <img src="{{ asset('images/admin.svg') }}" class="img-fluid" alt=" admin" /> </a> --}}
                            {{--                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="d-block d-sm-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <a href="{{ route('home') }}">
                        <div class="header_right d-flex">
                            <a href="{{ route('home') }}"><img src="{{ asset('images/after_about.svg') }}"
                                    class="img-fluid" alt=" " /></a>

                        </div>
                    </a>
                </div>

                <div class="col-8">
                    <div class="header_left d-flex">
                        <ul class="list-inline first ">
                            <li class="list-inline-item">
                                <a href="#" data-toggle="modal" data-target="#bookModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.617" height="24.16"
                                        viewBox="0 0 25.617 24.16">
                                        <g id="Group_492" data-name="Group 492"
                                            transform="translate(-658.214 -360.76)">
                                            <path id="Path_11489" data-name="Path 11489"
                                                d="M671.813,395.306a3.242,3.242,0,1,0,3.242,3.242A3.246,3.246,0,0,0,671.813,395.306Zm1.632,3.242a1.632,1.632,0,1,1-1.632-1.632A1.634,1.634,0,0,1,673.445,398.548Z"
                                                transform="translate(-5.058 -16.87)" fill="#fff" />
                                            <path id="Path_11490" data-name="Path 11490"
                                                d="M683.673,366.225a.807.807,0,0,0-.642-.32H663.862l-.357-2a3.568,3.568,0,0,0-2.881-2.873l-1.417-.247a.8.8,0,1,0-.375,1.565.716.716,0,0,0,.079.015l1.437.251a1.946,1.946,0,0,1,1.571,1.573l1.944,10.96a2.989,2.989,0,0,0,2.95,2.479h11.538a3.011,3.011,0,0,0,2.866-2.13l2.581-8.556A.829.829,0,0,0,683.673,366.225Zm-1.722,1.284-2.273,7.514h0a1.39,1.39,0,0,1-1.326.986H666.82a1.365,1.365,0,0,1-1.367-1.15l-1.3-7.351Z"
                                                fill="#fff" />
                                            <path id="Path_11491" data-name="Path 11491"
                                                d="M694.342,395.306a3.242,3.242,0,1,0,3.241,3.242A3.245,3.245,0,0,0,694.342,395.306Zm1.632,3.242a1.632,1.632,0,1,1-1.632-1.632A1.634,1.634,0,0,1,695.974,398.548Z"
                                                transform="translate(-16.06 -16.87)" fill="#fff" />
                                        </g>
                                    </svg> <span id="num">{{ $cart_count }}</span> </a>
                            </li>
                        </ul>
                        <ul class=" list-inline second admin ">
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        @if (auth('user')->user()->gender == 'male')
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                y="0px" width="25" height="25"
                                                viewBox="0 0 515.5 515.5"
                                                style="enable-background:new 0 0 515.5 515.5;" xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M364.35,201c12.9-4.5,23.601-17.4,27.801-33.9c5.699-22.8-2.7-44-19.301-50.4c1.5-6,2.2-12.3,2.2-18.7
		c0-54.1-54-98-120.7-98c-66.7,0-120.7,43.9-120.7,98c0,7.7,1.2,15.2,3.2,22.4c-11.9,9-17.2,27.2-12.4,46.7
		c4.1,16.6,15,29.5,27.8,33.9c15,49.4,53.6,100.7,106,100.7C310.65,301.7,349.35,250.4,364.35,201z M258.35,284.1
		c-42.8,0-77.8-46.6-90.399-92.699l-1.6-5.6l-5.7-0.8c-6.9-0.9-15.7-8.8-19-22.2c-2.4-9.4-1-18.9,2.7-24.8c1.8-2.8,4.1-4.9,6.9-5.6
		c0.6-0.1,1.1-0.2,1.9-0.2c0.4,0,1,0,1.5,0.1l8.3,0.8l1.2-8.2c2.6-17.1,8-32.6,15.5-45.7c14,15.8,42.1,26.7,74.5,26.7
		c36.5,0,67.5-13.8,79.1-32.9c9.6,14.4,16.5,32,19.5,52.1l1.2,8.2l8.3-0.8c1.2-0.1,2.5-0.1,3.4,0.1c0.6,0.1,1,0.4,1.6,0.7
		c7.6,3.4,11.3,16.6,8.1,29.7c-3.399,13.3-12.1,21.3-19,22.2l-5.8,0.8l-1.6,5.6C336.35,237.4,301.15,284.1,258.35,284.1z
		 M293.85,312l-24.199,11.9c-2.101-4.6-5.9-7.7-10.4-7.7c-4.7,0-8.6,3.5-10.8,8.399l-25.5-12.5c-11.6-5.699-21.2,1-21.2,15.101
		c0,4.601,1.1,8.5,3,11.601c3,5,8,7.699,13.9,7.399c1.6-0.101,3.2-0.3,5-1l24.1-8.2c1.7,6,6.2,10.4,11.4,10.4
		c5.199,0,9.5-4.1,11.3-9.9l22.6,7.6c3,1,5.9,1.201,8.5,0.9c3.2-0.4,5.9-2.1,8.2-4.4c3.2-3.399,5.3-8.299,5.3-14.6
		C315.05,313.1,305.55,306.301,293.85,312z M362.85,310.5c-11.399,19.4-24.5,35.7-42,44.7c-36,18.399-62.7,33.4-62.7,33.4
		l-0.1-0.101v-0.3l-0.3,0.2l-0.3-0.2v0.3l-0.1,0.101c0,0-26.8-14.9-62.7-33.4c-17.5-9-30.6-25.3-42-44.7
		c-53.3,21.6-90.4,71.5-90.4,114.8c0,45.801,0,90.2,0,90.2h195h0.8h195.2c0,0,0-44.399,0-90.2
		C453.25,381.9,416.05,332.1,362.85,310.5z" />
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                            </svg>
                                        @else
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                y="0px" width="25" height="25"
                                                viewBox="0 0 537.6 537.6"
                                                style="enable-background:new 0 0 537.6 537.6;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M173.2,314.4c21.3,3.199,47.3-1.701,75.7-3.4c5.3,1.199,10.6,2,16.1,2c5.6,0,11.1-0.801,16.6-2.1
			c73.9,3.6,131.5,24.5,131.5-125.9C413.1,82.9,346.8,0,265,0c-81.8,0-148.1,82.9-148.1,185c0,82.1,15.7,114,41.2,125.1
			C162.8,312.3,167.9,313.6,173.2,314.4z M149.6,127.3c15.5,21.5,55.7,16.9,90.4-10.3c8.8-6.9,16.5-14.8,22.7-22.8
			c0.8,0.1,1.6,0.2,2.4,0.4c3.4,0.6,6.5,1.8,10,2.9c3.101,1.5,6.5,2.7,9.5,4.6c3.101,1.6,5.9,3.8,8.7,5.7c2.5,2.2,5.3,4.3,7.4,6.7
			c2.199,2.2,4.3,4.6,5.899,6.9c1.8,2.2,3.101,4.5,4.4,6.5s2.399,3.8,3,5.4c1.5,3.1,2.399,4.9,2.399,4.9s-0.3-1.9-0.899-5.4
			c-0.2-1.8-0.7-3.8-1.3-6.2c-0.601-2.4-1.301-5.2-2.5-8c-1-2.9-2.4-5.9-4-9.1c-1.5-3.2-3.7-6.3-5.801-9.7c-2.5-3.1-4.8-6.5-7.8-9.5
			c-2.8-3.2-6.2-5.9-9.5-8.8c-3.1-2.2-6.399-4.6-9.899-6.5c1.5-3.1,2.699-6.3,3.699-9.3c12.4,5.6,25.101,12.7,35.2,22.8
			c37.101,37.1,22.5,80.2,51.101,51.7c4.5-4.5,8.199-9.2,11.1-13.9c1,0,2-0.1,2.8,0.1c3.9,1,6.4,4,7.8,6.4
			c3.9,6.5,4.801,15.9,2.4,25.3c-3.6,14-12.8,22.3-20.2,23.2l-6,0.8L361,188c-14.2,51.5-52.5,106.3-95.8,106.3
			c-43.3,0-81.5-54.8-95.8-106.3l-1.6-5.9l-6-0.8c-7.3-1-16.6-9.3-20.2-23.2c-2.4-9.4-1.5-18.8,2.4-25.3
			C144.9,131,146.9,128.7,149.6,127.3z" />
                                                        <path
                                                            d="M376.3,327.9c-11.6,19.799-25.1,36.5-42.9,45.699c-36.8,18.8-64.199,34.2-64.199,34.2l-0.101-0.1v-0.301l-0.3,0.2
			l-0.3-0.2v0.301l-0.1,0.1c0,0-27.3-15.2-64.2-34.2c-17.8-9.199-31.2-25.9-42.9-45.699c-54.5,22.199-92.5,72.999-92.5,117.499
			c0,46.801,0,92.2,0,92.2h199.6h0.8h199.6c0,0,0-45.399,0-92.2C468.8,401,430.7,350.1,376.3,327.9z" />
                                                    </g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                            </svg>
                                        @endif
                                    </button>
                                    <div class="dropdown-menu" style="width:120px;">
                                        <a class="dropdown-item" href="{{ route('profile') }}">الملف الشخصى</a>
                                        <a class="dropdown-item" href="{{ route('changePassword') }}">اعدادات
                                            الحساب</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            style="z-index:1000;">تسجيل الخروج</a>
                                    </div>
                                </div>
                            </li>
                            <!--<li class="list-inline-item">-->
                            <!--    <a href="{{ route('profile') }}"> <img src="{{ asset('images/admin.svg') }}" class="img-fluid" alt=" admin" /> </a>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-xl-12  col-lg-12 col-md-12  col-sm-12">
                    <div class="search">
                        <form role="search" method="get" id="searchform" action="{{ route('search') }}">
                            <div class="input-group">
                                <input type="text" required="required" value="" name="keyword"
                                    id="s" class="form-control" placeholder="ابحث هنا علي شئ"> <span
                                    class="input-group-btn">
                                    <button type="submit" class="btn btn-default" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23.993" height="24"
                                            viewBox="0 0 23.993 24">
                                            <path id="Path_11402" data-name="Path 11402"
                                                d="M1307.79,70.776l-5.84-5.832a10.228,10.228,0,1,0-1.01,1.011l5.84,5.832a.7.7,0,0,0,.5.213.715.715,0,0,0,.51-.213A.732.732,0,0,0,1307.79,70.776Zm-22.36-12.543a8.795,8.795,0,1,1,8.8,8.8A8.808,8.808,0,0,1,1285.43,58.233Z"
                                                transform="translate(-1284 -48)" fill="#b6b6b6" />
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- page content -->
    <div class="global-page">
        <div class="container" style="padding-top: 50px">
            <div class="row">
                <div class="sidebar col-xl-2 col-lg-2 col-md-2 col-12">
                    <aside>
                        <div class="">
                            <ul class=" list-unstyled">
                                <li>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35.186" height="31"
                                            viewBox="0 0 35.186 31">
                                            <g id="store" transform="translate(0 -20.416)">
                                                <g id="Group_578" data-name="Group 578"
                                                    transform="translate(0 20.416)">
                                                    <g id="Group_577" data-name="Group 577"
                                                        transform="translate(0 0)">
                                                        <path id="Path_11765" data-name="Path 11765"
                                                            d="M35.143,33.538l-2.46-9.021a5.9,5.9,0,0,0-5.372-4.1H8.613a6.223,6.223,0,0,0-5.536,4.019L.945,31l-.9,2.542a.576.576,0,0,0,.082.574.7.7,0,0,0,.533.287,3.076,3.076,0,0,1,1.886.656,7,7,0,0,0,1.107.574V51.416H31.74V35.588a4.8,4.8,0,0,0,1.025-.574,2.618,2.618,0,0,1,1.763-.615.661.661,0,0,0,.533-.246A.669.669,0,0,0,35.143,33.538ZM23.621,21.728l1.8,11.4a3.526,3.526,0,0,0-1.8.82,2.434,2.434,0,0,1-1.722.615,2.721,2.721,0,0,1-1.722-.615,3.888,3.888,0,0,0-1.8-.82v-11.4ZM3.241,33.866a5.322,5.322,0,0,0-1.681-.7l.615-1.763,2.173-6.561a4.864,4.864,0,0,1,4.306-3.116h1.927l-1.8,11.358a4.207,4.207,0,0,0-1.927.82,2.434,2.434,0,0,1-1.722.615A3.076,3.076,0,0,1,3.241,33.866ZM12.877,50.1H4.963V35.875h.164a3.837,3.837,0,0,0,2.46-.861A2.434,2.434,0,0,1,9.31,34.4a2.633,2.633,0,0,1,1.722.615,3.864,3.864,0,0,0,1.845.82ZM11.77,33.948a4.494,4.494,0,0,0-1.722-.82l1.8-11.4h5.167v11.4a3.526,3.526,0,0,0-1.8.82,2.633,2.633,0,0,1-1.722.615A2.721,2.721,0,0,1,11.77,33.948ZM14.189,50.1V35.793a3.539,3.539,0,0,0,1.763-.82,2.434,2.434,0,0,1,1.722-.615,2.721,2.721,0,0,1,1.722.615,3.935,3.935,0,0,0,2.46.861,3.837,3.837,0,0,0,2.46-.861,2.434,2.434,0,0,1,1.722-.615,2.721,2.721,0,0,1,1.722.615,3.935,3.935,0,0,0,2.46.861h.164V50.1ZM32.027,33.948a2.618,2.618,0,0,1-1.763.615,2.721,2.721,0,0,1-1.722-.615,3.7,3.7,0,0,0-1.8-.82l-1.8-11.4h2.378a4.546,4.546,0,0,1,4.1,3.116l1.763,6.438.492,1.845A4.1,4.1,0,0,0,32.027,33.948Z"
                                                            transform="translate(0 -20.416)" fill="#bfbfbf" />
                                                    </g>
                                                </g>
                                                <g id="Group_580" data-name="Group 580"
                                                    transform="translate(9.761 41.452)">
                                                    <g id="Group_579" data-name="Group 579"
                                                        transform="translate(0 0)">
                                                        <circle id="Ellipse_220" data-name="Ellipse 220"
                                                            cx="1.107" cy="1.107" r="1.107"
                                                            fill="#bfbfbf" />
                                                    </g>
                                                </g>
                                                <g id="Group_582" data-name="Group 582"
                                                    transform="translate(17.039 37.413)">
                                                    <g id="Group_581" data-name="Group 581"
                                                        transform="translate(0 0)">
                                                        <path id="Path_11766" data-name="Path 11766"
                                                            d="M174.807,186.4a.694.694,0,0,0-.943,0l-7.463,7.34a.694.694,0,0,0,0,.943.6.6,0,0,0,.9,0l7.463-7.381A.61.61,0,0,0,174.807,186.4Z"
                                                            transform="translate(-166.216 -186.216)" fill="#bfbfbf" />
                                                    </g>
                                                </g>
                                                <g id="Group_584" data-name="Group 584"
                                                    transform="translate(20.689 40.636)">
                                                    <g id="Group_583" data-name="Group 583">
                                                        <path id="Path_11767" data-name="Path 11767"
                                                            d="M208.643,217.863a.656.656,0,0,0-.943,0l-5.7,5.618a.694.694,0,0,0,0,.943.6.6,0,0,0,.9,0l5.741-5.618A.694.694,0,0,0,208.643,217.863Z"
                                                            transform="translate(-201.816 -217.663)" fill="#bfbfbf" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        متجر الوفاق
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="41.18" height="41.656"
                                            viewBox="0 0 41.18 41.656">
                                            <g id="Group_574" data-name="Group 574" transform="translate(0.3 0.355)">
                                                <g id="Group_573" data-name="Group 573" transform="translate(0 0)">
                                                    <g id="Group_572" data-name="Group 572">
                                                        <path id="Path_11758" data-name="Path 11758"
                                                            d="M464.832,387.417l-2.661-2.66a.6.6,0,1,0-.849.849l2.661,2.66a.6.6,0,0,0,.849-.849Z"
                                                            transform="translate(-424.428 -353.783)" fill="#bfbfbf"
                                                            stroke="#bfbfbf" stroke-width="0.6" />
                                                        <path id="Path_11759" data-name="Path 11759"
                                                            d="M17.711,106.861a.6.6,0,1,0,1.2,0v-3.83a2.349,2.349,0,0,0-.219-4.464,2.348,2.348,0,0,0-1.992-3.58,2.348,2.348,0,0,0-2.049-3.5H13.5a2.348,2.348,0,0,0-2.049-3.5h-.029a.6.6,0,1,0,0,1.2h.029a1.148,1.148,0,0,1,0,2.3H8.7a1.148,1.148,0,0,1-.1-2.292A.6.6,0,1,0,8.487,88a2.361,2.361,0,0,0-.877.254L3.658,84.3a.6.6,0,0,0-.849.849l3.913,3.913A2.355,2.355,0,0,0,8.7,92.691h.3a2.348,2.348,0,0,0,2.049,3.5h.033a2.348,2.348,0,0,0,2.049,3.5h.769a2.348,2.348,0,0,0,2.049,3.5H17.71v3.676ZM9.895,93.84a1.15,1.15,0,0,1,1.148-1.148h3.607a1.148,1.148,0,1,1,0,2.3H11.043A1.15,1.15,0,0,1,9.895,93.84Zm2.082,3.5a1.15,1.15,0,0,1,1.148-1.148h3.566a1.148,1.148,0,1,1,0,2.3H13.125a1.15,1.15,0,0,1-1.148-1.148Zm2.817,3.5a1.15,1.15,0,0,1,1.148-1.148h2.135a1.148,1.148,0,1,1,0,2.3H15.942A1.15,1.15,0,0,1,14.794,100.835Z"
                                                            transform="translate(-2.632 -77.39)" fill="#bfbfbf"
                                                            stroke="#bfbfbf" stroke-width="0.6" />
                                                        <path id="Path_11760" data-name="Path 11760"
                                                            d="M116.754,25.209a2.663,2.663,0,0,0-.786-1.917l-3.483-3.483a6.156,6.156,0,0,0-2.227-1.42l-4.691-1.712-1.712-4.691a6.155,6.155,0,0,0-1.42-2.227L99.54,6.864A2.681,2.681,0,0,0,95.1,7.9L87.794.187a.6.6,0,1,0-.872.826L101.5,16.4a.6.6,0,0,0,.23.151l8.12,2.963a4.945,4.945,0,0,1,1.79,1.141l3.483,3.483a1.482,1.482,0,0,1-.016,2.111,1.488,1.488,0,0,1-2.082-.017l-2.905-2.911a.6.6,0,0,0-1.026.424v10.3a1.148,1.148,0,0,1-2.3,0V30.426a.6.6,0,0,0-1.2,0v2.689a1.148,1.148,0,0,1-1.191,1.148,1.18,1.18,0,0,1-1.106-1.19V29.226a.6.6,0,0,0-1.2,0v2.951a1.148,1.148,0,0,1-2.3,0V28.357a.6.6,0,0,0-1.2,0V30.3a1.148,1.148,0,0,1-1.191,1.148,1.18,1.18,0,0,1-1.106-1.19v-.81a.6.6,0,1,0-1.2,0v.81a2.391,2.391,0,0,0,2.265,2.39,2.332,2.332,0,0,0,1.239-.3,2.348,2.348,0,0,0,3.716,1.738,2.366,2.366,0,0,0,2.04,1.381,2.329,2.329,0,0,0,1.447-.433,2.347,2.347,0,0,0,2.9,1.242l4.553,4.553a.6.6,0,1,0,.849-.849l-4.39-4.39a2.339,2.339,0,0,0,.573-1.535V25.2l6.981,6.975a.6.6,0,0,0,.849,0c.235-.235,0-.849,0-.849l-3.516-3.513a2.673,2.673,0,0,0,2.148-2.605ZM96.183,9.022a1.483,1.483,0,0,1,2.508-1.309l2.895,2.895a4.945,4.945,0,0,1,1.141,1.79l1.365,3.741-1.82-.664s-6.087-6.444-6.089-6.453Z"
                                                            transform="translate(-80.021 0)" fill="#bfbfbf"
                                                            stroke="#bfbfbf" stroke-width="0.6" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        طلب مساعدة
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30.5" height="30.473"
                                            viewBox="0 0 30.5 30.473">
                                            <g id="wedding-rings" transform="translate(0 -0.232)">
                                                <path id="Path_11761" data-name="Path 11761"
                                                    d="M318.571,10.16a.952.952,0,0,0,.719,0c.227-.092,5.56-2.31,5.56-6.217A3.742,3.742,0,0,0,321.086.232,3.792,3.792,0,0,0,318.93.9a3.792,3.792,0,0,0-2.155-.669,3.742,3.742,0,0,0-3.764,3.712C313.011,7.85,318.344,10.068,318.571,10.16Zm-1.8-8.024a1.877,1.877,0,0,1,1.431.654.952.952,0,0,0,1.448,0,1.877,1.877,0,0,1,1.431-.654,1.836,1.836,0,0,1,1.859,1.807c0,1.987-2.623,3.636-4.008,4.291-1.04-.5-4.021-2.135-4.021-4.291a1.836,1.836,0,0,1,1.859-1.807Z"
                                                    transform="translate(-294.382)" fill="#bfbfbf" />
                                                <path id="Path_11762" data-name="Path 11762"
                                                    d="M20.733,100.861A11.445,11.445,0,0,0,8.127,96.578,11.624,11.624,0,0,0,.27,105.061a11.187,11.187,0,0,0,.416,6.292,11.47,11.47,0,0,0,8.579,7.388l.009,0a11.009,11.009,0,0,0,1.7.2.952.952,0,1,0,0-1.9,9.514,9.514,0,0,1-8.492-6.323l0-.007a9.292,9.292,0,0,1,1.984-9.632,9.492,9.492,0,0,1,13.987,0,10,10,0,1,0,2.285-.21Zm-.232,18.09A8.044,8.044,0,0,1,16.4,117.83a11.451,11.451,0,0,0,6.445-11.275,11.306,11.306,0,0,0-.352-2.007l0-.016a.952.952,0,0,0-1.859.412c0,.012.01.047.025.1a9.365,9.365,0,0,1,.291,1.666v.007a9.538,9.538,0,0,1-6.256,9.763,8.09,8.09,0,1,1,5.813,2.468Zm1.985-14.413c0,.015.006.027.007.033C22.492,104.56,22.489,104.549,22.487,104.538Z"
                                                    transform="translate(0 -90.151)" fill="#bfbfbf" />
                                            </g>
                                        </svg>
                                        طلب الزواج
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32.917" height="33.434"
                                            viewBox="0 0 32.917 33.434">
                                            <g id="Group_576" data-name="Group 576"
                                                transform="translate(-952.18 -85.734)">
                                                <path id="Path_11763" data-name="Path 11763"
                                                    d="M975.793,118.718a8.849,8.849,0,0,0,7.944-12.728l-.014-.029v-2.924c-.039-.937-2.183-3.5-5.734-6.855-.04-.048-2.49-3.224-2.918-3.7-.628-.694-3.765-2.375-9.324-5a13.474,13.474,0,0,0-5.79-1.3H952.63v.934h7.327a12.548,12.548,0,0,1,5.391,1.213c7.411,3.5,8.784,4.507,9.03,4.779.336.373,2.2,2.771,2.886,3.664l.057.062c2.206,2.079,5.368,5.388,5.468,6.209v1.4l-.249-.3a8.832,8.832,0,0,0-6.763-3.135c-.239,0-.489.012-.788.039l-.05,0-.042-.029a13.791,13.791,0,0,0-6.088-1.663c-1.523,0-2.443.449-2.734,1.335a7.158,7.158,0,0,0,2.538,5.887,5.211,5.211,0,0,1,.838.917,3.171,3.171,0,0,1,.426,2.6,2.421,2.421,0,0,1-1.177,1.515,1.028,1.028,0,0,1-.831.09c-.4-.157-.8-.82-1.157-1.4a7.922,7.922,0,0,0-.695-1.027,53.113,53.113,0,0,0-5.01-5.139,15.591,15.591,0,0,1-3.208-3.606,12.891,12.891,0,0,1-.764-1.5c-.056-.125-.11-.244-.164-.361a2.756,2.756,0,0,0-1.523-1.639L955.266,97H952.63v.934h2.46l.028.013a1.31,1.31,0,0,1,.3.195,3.524,3.524,0,0,1,.763,1.269,13.8,13.8,0,0,0,.82,1.608,16.292,16.292,0,0,0,3.373,3.808,52.234,52.234,0,0,1,4.933,5.059,7.3,7.3,0,0,1,.6.9,4.783,4.783,0,0,0,1.374,1.672l.046.028.016.051a8.859,8.859,0,0,0,8.445,6.176v0Zm-7.306-13.862-.109.158-.118-.151a6.452,6.452,0,0,1-1.243-3.974l0-.06.042-.043c.774-.8,2.616-.649,5.973.406l.419.132-.418.137a8.842,8.842,0,0,0-4.543,3.4Zm.69,9.368a8.024,8.024,0,0,1-.728-1.378l-.064-.156.165-.035a2.492,2.492,0,0,0,.55-.188,3.328,3.328,0,0,0,1.673-2.1,4.093,4.093,0,0,0-.534-3.359,5.95,5.95,0,0,0-.982-1.093l-.21-.2.059-.1a7.919,7.919,0,1,1,.07,8.61Z"
                                                    transform="translate(0 0)" fill="#bfbfbf" stroke="#bfbfbf"
                                                    stroke-width="0.9" />
                                                <path id="Path_11764" data-name="Path 11764"
                                                    d="M1046.417,167.994h-2.932v-2.708h3.233v-.934h-1.534v-1.735h-.933v1.735h-1.233a.467.467,0,0,0-.467.467v3.641a.467.467,0,0,0,.467.467h2.932v2.707h-3.233v.934h1.534V174.3h.933v-1.735h1.233a.467.467,0,0,0,.467-.467v-3.641A.467.467,0,0,0,1046.417,167.994Z"
                                                    transform="translate(-68.933 -58.592)" fill="#bfbfbf"
                                                    stroke="#bfbfbf" stroke-width="0.9" />
                                            </g>
                                        </svg>
                                        مشاركاتك
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25.701" height="30"
                                            viewBox="0 0 25.701 30">
                                            <g id="list" transform="translate(0 0.25)">
                                                <path id="Path_11751" data-name="Path 11751"
                                                    d="M22.109,2.1H20.937V.67A.67.67,0,1,0,19.6.67V2.1H6.076V.67a.67.67,0,1,0-1.339,0V2.1H3.6A3.35,3.35,0,0,0,.25,5.451v20.7A3.35,3.35,0,0,0,3.6,29.5H22.1a3.35,3.35,0,0,0,3.349-3.349V5.445A3.349,3.349,0,0,0,22.109,2.1Zm2.009,24.049a2.015,2.015,0,0,1-2.009,2.009H3.6a2.015,2.015,0,0,1-2.009-2.009V5.445A2.015,2.015,0,0,1,3.6,3.436H4.737V4.474a.67.67,0,0,0,1.339,0V3.436H19.6V4.474a.67.67,0,1,0,1.339,0V3.436h1.172a2.015,2.015,0,0,1,2.009,2.009Zm0,0"
                                                    fill="#bfbfbf" stroke="#bfbfbf" stroke-width="0.5" />
                                                <path id="Path_11752" data-name="Path 11752"
                                                    d="M61.278,209.33l-2.471,2.357-1.138-1.138a.668.668,0,1,0-.944.944l1.6,1.6a.657.657,0,0,0,.475.194.649.649,0,0,0,.462-.188l2.94-2.813a.666.666,0,1,0-.924-.958Zm0,0"
                                                    transform="translate(-52.509 -195.132)" fill="#bfbfbf"
                                                    stroke="#bfbfbf" stroke-width="0.5" />
                                                <path id="Path_11753" data-name="Path 11753"
                                                    d="M193.82,230.2h-7.7a.67.67,0,1,0,0,1.339h7.7a.67.67,0,0,0,0-1.339Zm0,0"
                                                    transform="translate(-172.796 -214.783)" fill="#bfbfbf"
                                                    stroke="#bfbfbf" stroke-width="0.5" />
                                                <path id="Path_11754" data-name="Path 11754"
                                                    d="M61.278,109.33l-2.471,2.357-1.138-1.138a.668.668,0,0,0-.944.944l1.6,1.6a.657.657,0,0,0,.475.194.649.649,0,0,0,.462-.188l2.94-2.813a.666.666,0,1,0-.924-.958Zm0,0"
                                                    transform="translate(-52.509 -101.829)" fill="#bfbfbf"
                                                    stroke="#bfbfbf" stroke-width="0.5" />
                                                <path id="Path_11755" data-name="Path 11755"
                                                    d="M193.82,130.2h-7.7a.67.67,0,1,0,0,1.339h7.7a.67.67,0,0,0,0-1.339Zm0,0"
                                                    transform="translate(-172.796 -121.48)" fill="#bfbfbf"
                                                    stroke="#bfbfbf" stroke-width="0.5" />
                                                <path id="Path_11756" data-name="Path 11756"
                                                    d="M61.278,309.33l-2.471,2.357-1.138-1.138a.668.668,0,0,0-.944.944l1.6,1.6a.657.657,0,0,0,.475.194.649.649,0,0,0,.462-.188l2.94-2.813a.666.666,0,1,0-.924-.958Zm0,0"
                                                    transform="translate(-52.509 -288.435)" fill="#bfbfbf"
                                                    stroke="#bfbfbf" stroke-width="0.5" />
                                                <path id="Path_11757" data-name="Path 11757"
                                                    d="M193.82,330.2h-7.7a.67.67,0,1,0,0,1.339h7.7a.67.67,0,1,0,0-1.339Zm0,0"
                                                    transform="translate(-172.796 -308.086)" fill="#bfbfbf"
                                                    stroke="#bfbfbf" stroke-width="0.5" />
                                            </g>
                                        </svg>
                                        طلباتي
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg id="Group_802" data-name="Group 802" xmlns="http://www.w3.org/2000/svg"
                                            width="27.998" height="28" viewBox="0 0 27.998 28">
                                            <path id="Path_11768" data-name="Path 11768"
                                                d="M23.908,4.1A14,14,0,0,0,3.231,22.927,5.356,5.356,0,0,1,.987,25.413a1.313,1.313,0,0,0,.379,2.474,7.235,7.235,0,0,0,1.107.083A8.358,8.358,0,0,0,7.4,26.337,14,14,0,0,0,23.908,4.1ZM22.778,22.767A12.4,12.4,0,0,1,7.73,24.7a.8.8,0,0,0-.971.124.263.263,0,0,0-.065.047,6.835,6.835,0,0,1-4.221,1.5H2.467a7.838,7.838,0,0,0,2.4-3.191.818.818,0,0,0,.041-.515.831.831,0,0,0-.2-.45,12.4,12.4,0,1,1,18.061.551Z"
                                                transform="translate(-0.019)" fill="#bebebe" />
                                            <circle id="Ellipse_221" data-name="Ellipse 221" cx="0.983"
                                                cy="0.983" r="0.983" transform="translate(13.009 13.017)"
                                                fill="#bebebe" />
                                            <circle id="Ellipse_222" data-name="Ellipse 222" cx="0.983"
                                                cy="0.983" r="0.983" transform="translate(18.077 13.017)"
                                                fill="#bebebe" />
                                            <circle id="Ellipse_223" data-name="Ellipse 223" cx="0.983"
                                                cy="0.983" r="0.983" transform="translate(7.942 13.017)"
                                                fill="#bebebe" />
                                        </svg>
                                        فريق الدعم
                                    </a>
                                </li>
                            </ul>
                            <div class="copyright">
                                <p>جميع الحقوق محفوظة لـ</p>
                                <img src="{{ url('img/logo.png') }}" class="img-fluid" alt="جمعية الوفاق" />
                            </div>
                        </div>
                    </aside>
                </div>
                {{-- <div class="sidebar col-xl-2 col-lg-2 col-md-12 " style="background: white">
                    <aside>
                        <div class="">
                            <ul class=" list-unstyled">
                                <li>
                                    <a href="{{ route('home') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 35.186 31">
                                            <g id="store" transform="translate(0 -20.416)">
                                                <g id="Group_578" data-name="Group 578"
                                                    transform="translate(0 20.416)">
                                                    <g id="Group_577" data-name="Group 577"
                                                        transform="translate(0 0)">
                                                        <path id="Path_11765" data-name="Path 11765"
                                                            d="M35.143,33.538l-2.46-9.021a5.9,5.9,0,0,0-5.372-4.1H8.613a6.223,6.223,0,0,0-5.536,4.019L.945,31l-.9,2.542a.576.576,0,0,0,.082.574.7.7,0,0,0,.533.287,3.076,3.076,0,0,1,1.886.656,7,7,0,0,0,1.107.574V51.416H31.74V35.588a4.8,4.8,0,0,0,1.025-.574,2.618,2.618,0,0,1,1.763-.615.661.661,0,0,0,.533-.246A.669.669,0,0,0,35.143,33.538ZM23.621,21.728l1.8,11.4a3.526,3.526,0,0,0-1.8.82,2.434,2.434,0,0,1-1.722.615,2.721,2.721,0,0,1-1.722-.615,3.888,3.888,0,0,0-1.8-.82v-11.4ZM3.241,33.866a5.322,5.322,0,0,0-1.681-.7l.615-1.763,2.173-6.561a4.864,4.864,0,0,1,4.306-3.116h1.927l-1.8,11.358a4.207,4.207,0,0,0-1.927.82,2.434,2.434,0,0,1-1.722.615A3.076,3.076,0,0,1,3.241,33.866ZM12.877,50.1H4.963V35.875h.164a3.837,3.837,0,0,0,2.46-.861A2.434,2.434,0,0,1,9.31,34.4a2.633,2.633,0,0,1,1.722.615,3.864,3.864,0,0,0,1.845.82ZM11.77,33.948a4.494,4.494,0,0,0-1.722-.82l1.8-11.4h5.167v11.4a3.526,3.526,0,0,0-1.8.82,2.633,2.633,0,0,1-1.722.615A2.721,2.721,0,0,1,11.77,33.948ZM14.189,50.1V35.793a3.539,3.539,0,0,0,1.763-.82,2.434,2.434,0,0,1,1.722-.615,2.721,2.721,0,0,1,1.722.615,3.935,3.935,0,0,0,2.46.861,3.837,3.837,0,0,0,2.46-.861,2.434,2.434,0,0,1,1.722-.615,2.721,2.721,0,0,1,1.722.615,3.935,3.935,0,0,0,2.46.861h.164V50.1ZM32.027,33.948a2.618,2.618,0,0,1-1.763.615,2.721,2.721,0,0,1-1.722-.615,3.7,3.7,0,0,0-1.8-.82l-1.8-11.4h2.378a4.546,4.546,0,0,1,4.1,3.116l1.763,6.438.492,1.845A4.1,4.1,0,0,0,32.027,33.948Z"
                                                            transform="translate(0 -20.416)" fill="#fff" />
                                                    </g>
                                                </g>
                                                <g id="Group_580" data-name="Group 580"
                                                    transform="translate(9.761 41.452)">
                                                    <g id="Group_579" data-name="Group 579"
                                                        transform="translate(0 0)">
                                                        <circle id="Ellipse_220" data-name="Ellipse 220"
                                                            cx="1.107" cy="1.107" r="1.107"
                                                            fill="#fff" />
                                                    </g>
                                                </g>
                                                <g id="Group_582" data-name="Group 582"
                                                    transform="translate(17.039 37.413)">
                                                    <g id="Group_581" data-name="Group 581"
                                                        transform="translate(0 0)">
                                                        <path id="Path_11766" data-name="Path 11766"
                                                            d="M174.807,186.4a.694.694,0,0,0-.943,0l-7.463,7.34a.694.694,0,0,0,0,.943.6.6,0,0,0,.9,0l7.463-7.381A.61.61,0,0,0,174.807,186.4Z"
                                                            transform="translate(-166.216 -186.216)" fill="#fff" />
                                                    </g>
                                                </g>
                                                <g id="Group_584" data-name="Group 584"
                                                    transform="translate(20.689 40.636)">
                                                    <g id="Group_583" data-name="Group 583">
                                                        <path id="Path_11767" data-name="Path 11767"
                                                            d="M208.643,217.863a.656.656,0,0,0-.943,0l-5.7,5.618a.694.694,0,0,0,0,.943.6.6,0,0,0,.9,0l5.741-5.618A.694.694,0,0,0,208.643,217.863Z"
                                                            transform="translate(-201.816 -217.663)" fill="#fff" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg> الرئيسية </a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 35.186 31">
                                            <g id="store" transform="translate(0 -20.416)">
                                                <g id="Group_578" data-name="Group 578"
                                                    transform="translate(0 20.416)">
                                                    <g id="Group_577" data-name="Group 577"
                                                        transform="translate(0 0)">
                                                        <path id="Path_11765" data-name="Path 11765"
                                                            d="M35.143,33.538l-2.46-9.021a5.9,5.9,0,0,0-5.372-4.1H8.613a6.223,6.223,0,0,0-5.536,4.019L.945,31l-.9,2.542a.576.576,0,0,0,.082.574.7.7,0,0,0,.533.287,3.076,3.076,0,0,1,1.886.656,7,7,0,0,0,1.107.574V51.416H31.74V35.588a4.8,4.8,0,0,0,1.025-.574,2.618,2.618,0,0,1,1.763-.615.661.661,0,0,0,.533-.246A.669.669,0,0,0,35.143,33.538ZM23.621,21.728l1.8,11.4a3.526,3.526,0,0,0-1.8.82,2.434,2.434,0,0,1-1.722.615,2.721,2.721,0,0,1-1.722-.615,3.888,3.888,0,0,0-1.8-.82v-11.4ZM3.241,33.866a5.322,5.322,0,0,0-1.681-.7l.615-1.763,2.173-6.561a4.864,4.864,0,0,1,4.306-3.116h1.927l-1.8,11.358a4.207,4.207,0,0,0-1.927.82,2.434,2.434,0,0,1-1.722.615A3.076,3.076,0,0,1,3.241,33.866ZM12.877,50.1H4.963V35.875h.164a3.837,3.837,0,0,0,2.46-.861A2.434,2.434,0,0,1,9.31,34.4a2.633,2.633,0,0,1,1.722.615,3.864,3.864,0,0,0,1.845.82ZM11.77,33.948a4.494,4.494,0,0,0-1.722-.82l1.8-11.4h5.167v11.4a3.526,3.526,0,0,0-1.8.82,2.633,2.633,0,0,1-1.722.615A2.721,2.721,0,0,1,11.77,33.948ZM14.189,50.1V35.793a3.539,3.539,0,0,0,1.763-.82,2.434,2.434,0,0,1,1.722-.615,2.721,2.721,0,0,1,1.722.615,3.935,3.935,0,0,0,2.46.861,3.837,3.837,0,0,0,2.46-.861,2.434,2.434,0,0,1,1.722-.615,2.721,2.721,0,0,1,1.722.615,3.935,3.935,0,0,0,2.46.861h.164V50.1ZM32.027,33.948a2.618,2.618,0,0,1-1.763.615,2.721,2.721,0,0,1-1.722-.615,3.7,3.7,0,0,0-1.8-.82l-1.8-11.4h2.378a4.546,4.546,0,0,1,4.1,3.116l1.763,6.438.492,1.845A4.1,4.1,0,0,0,32.027,33.948Z"
                                                            transform="translate(0 -20.416)" fill="#fff" />
                                                    </g>
                                                </g>
                                                <g id="Group_580" data-name="Group 580"
                                                    transform="translate(9.761 41.452)">
                                                    <g id="Group_579" data-name="Group 579"
                                                        transform="translate(0 0)">
                                                        <circle id="Ellipse_220" data-name="Ellipse 220"
                                                            cx="1.107" cy="1.107" r="1.107"
                                                            fill="#fff" />
                                                    </g>
                                                </g>
                                                <g id="Group_582" data-name="Group 582"
                                                    transform="translate(17.039 37.413)">
                                                    <g id="Group_581" data-name="Group 581"
                                                        transform="translate(0 0)">
                                                        <path id="Path_11766" data-name="Path 11766"
                                                            d="M174.807,186.4a.694.694,0,0,0-.943,0l-7.463,7.34a.694.694,0,0,0,0,.943.6.6,0,0,0,.9,0l7.463-7.381A.61.61,0,0,0,174.807,186.4Z"
                                                            transform="translate(-166.216 -186.216)" fill="#fff" />
                                                    </g>
                                                </g>
                                                <g id="Group_584" data-name="Group 584"
                                                    transform="translate(20.689 40.636)">
                                                    <g id="Group_583" data-name="Group 583">
                                                        <path id="Path_11767" data-name="Path 11767"
                                                            d="M208.643,217.863a.656.656,0,0,0-.943,0l-5.7,5.618a.694.694,0,0,0,0,.943.6.6,0,0,0,.9,0l5.741-5.618A.694.694,0,0,0,208.643,217.863Z"
                                                            transform="translate(-201.816 -217.663)" fill="#fff" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg> متجر الوفاق </a>
                                </li>
                                <li>
                                    <a href="{{ route('help') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 41.18 41.656">
                                            <g id="Group_574" data-name="Group 574" transform="translate(0.3 0.355)">
                                                <g id="Group_573" data-name="Group 573" transform="translate(0 0)">
                                                    <g id="Group_572" data-name="Group 572">
                                                        <path id="Path_11758" data-name="Path 11758"
                                                            d="M464.832,387.417l-2.661-2.66a.6.6,0,1,0-.849.849l2.661,2.66a.6.6,0,0,0,.849-.849Z"
                                                            transform="translate(-424.428 -353.783)" fill="#fff"
                                                            stroke="#fff" stroke-width="0.6" />
                                                        <path id="Path_11759" data-name="Path 11759"
                                                            d="M17.711,106.861a.6.6,0,1,0,1.2,0v-3.83a2.349,2.349,0,0,0-.219-4.464,2.348,2.348,0,0,0-1.992-3.58,2.348,2.348,0,0,0-2.049-3.5H13.5a2.348,2.348,0,0,0-2.049-3.5h-.029a.6.6,0,1,0,0,1.2h.029a1.148,1.148,0,0,1,0,2.3H8.7a1.148,1.148,0,0,1-.1-2.292A.6.6,0,1,0,8.487,88a2.361,2.361,0,0,0-.877.254L3.658,84.3a.6.6,0,0,0-.849.849l3.913,3.913A2.355,2.355,0,0,0,8.7,92.691h.3a2.348,2.348,0,0,0,2.049,3.5h.033a2.348,2.348,0,0,0,2.049,3.5h.769a2.348,2.348,0,0,0,2.049,3.5H17.71v3.676ZM9.895,93.84a1.15,1.15,0,0,1,1.148-1.148h3.607a1.148,1.148,0,1,1,0,2.3H11.043A1.15,1.15,0,0,1,9.895,93.84Zm2.082,3.5a1.15,1.15,0,0,1,1.148-1.148h3.566a1.148,1.148,0,1,1,0,2.3H13.125a1.15,1.15,0,0,1-1.148-1.148Zm2.817,3.5a1.15,1.15,0,0,1,1.148-1.148h2.135a1.148,1.148,0,1,1,0,2.3H15.942A1.15,1.15,0,0,1,14.794,100.835Z"
                                                            transform="translate(-2.632 -77.39)" fill="#fff"
                                                            stroke="#fff" stroke-width="0.6" />
                                                        <path id="Path_11760" data-name="Path 11760"
                                                            d="M116.754,25.209a2.663,2.663,0,0,0-.786-1.917l-3.483-3.483a6.156,6.156,0,0,0-2.227-1.42l-4.691-1.712-1.712-4.691a6.155,6.155,0,0,0-1.42-2.227L99.54,6.864A2.681,2.681,0,0,0,95.1,7.9L87.794.187a.6.6,0,1,0-.872.826L101.5,16.4a.6.6,0,0,0,.23.151l8.12,2.963a4.945,4.945,0,0,1,1.79,1.141l3.483,3.483a1.482,1.482,0,0,1-.016,2.111,1.488,1.488,0,0,1-2.082-.017l-2.905-2.911a.6.6,0,0,0-1.026.424v10.3a1.148,1.148,0,0,1-2.3,0V30.426a.6.6,0,0,0-1.2,0v2.689a1.148,1.148,0,0,1-1.191,1.148,1.18,1.18,0,0,1-1.106-1.19V29.226a.6.6,0,0,0-1.2,0v2.951a1.148,1.148,0,0,1-2.3,0V28.357a.6.6,0,0,0-1.2,0V30.3a1.148,1.148,0,0,1-1.191,1.148,1.18,1.18,0,0,1-1.106-1.19v-.81a.6.6,0,1,0-1.2,0v.81a2.391,2.391,0,0,0,2.265,2.39,2.332,2.332,0,0,0,1.239-.3,2.348,2.348,0,0,0,3.716,1.738,2.366,2.366,0,0,0,2.04,1.381,2.329,2.329,0,0,0,1.447-.433,2.347,2.347,0,0,0,2.9,1.242l4.553,4.553a.6.6,0,1,0,.849-.849l-4.39-4.39a2.339,2.339,0,0,0,.573-1.535V25.2l6.981,6.975a.6.6,0,0,0,.849,0c.235-.235,0-.849,0-.849l-3.516-3.513a2.673,2.673,0,0,0,2.148-2.605ZM96.183,9.022a1.483,1.483,0,0,1,2.508-1.309l2.895,2.895a4.945,4.945,0,0,1,1.141,1.79l1.365,3.741-1.82-.664s-6.087-6.444-6.089-6.453Z"
                                                            transform="translate(-80.021 0)" fill="#fff"
                                                            stroke="#fff" stroke-width="0.6" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg> طلب مساعدة </a>
                                </li>
                                <li>
                                    <a href="{{ route('create-marriage-request') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 30.5 30.473">
                                            <g id="wedding-rings" transform="translate(0 -0.232)">
                                                <path id="Path_11761" data-name="Path 11761"
                                                    d="M318.571,10.16a.952.952,0,0,0,.719,0c.227-.092,5.56-2.31,5.56-6.217A3.742,3.742,0,0,0,321.086.232,3.792,3.792,0,0,0,318.93.9a3.792,3.792,0,0,0-2.155-.669,3.742,3.742,0,0,0-3.764,3.712C313.011,7.85,318.344,10.068,318.571,10.16Zm-1.8-8.024a1.877,1.877,0,0,1,1.431.654.952.952,0,0,0,1.448,0,1.877,1.877,0,0,1,1.431-.654,1.836,1.836,0,0,1,1.859,1.807c0,1.987-2.623,3.636-4.008,4.291-1.04-.5-4.021-2.135-4.021-4.291a1.836,1.836,0,0,1,1.859-1.807Z"
                                                    transform="translate(-294.382)" fill="#fff" />
                                                <path id="Path_11762" data-name="Path 11762"
                                                    d="M20.733,100.861A11.445,11.445,0,0,0,8.127,96.578,11.624,11.624,0,0,0,.27,105.061a11.187,11.187,0,0,0,.416,6.292,11.47,11.47,0,0,0,8.579,7.388l.009,0a11.009,11.009,0,0,0,1.7.2.952.952,0,1,0,0-1.9,9.514,9.514,0,0,1-8.492-6.323l0-.007a9.292,9.292,0,0,1,1.984-9.632,9.492,9.492,0,0,1,13.987,0,10,10,0,1,0,2.285-.21Zm-.232,18.09A8.044,8.044,0,0,1,16.4,117.83a11.451,11.451,0,0,0,6.445-11.275,11.306,11.306,0,0,0-.352-2.007l0-.016a.952.952,0,0,0-1.859.412c0,.012.01.047.025.1a9.365,9.365,0,0,1,.291,1.666v.007a9.538,9.538,0,0,1-6.256,9.763,8.09,8.09,0,1,1,5.813,2.468Zm1.985-14.413c0,.015.006.027.007.033C22.492,104.56,22.489,104.549,22.487,104.538Z"
                                                    transform="translate(0 -90.151)" fill="#fff" />
                                            </g>
                                        </svg> طلب الزواج </a>
                                </li>
                                <li>
                                    <a href="{{ route('order.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 32.917 33.434">
                                            <g id="Group_576" data-name="Group 576"
                                                transform="translate(-952.18 -85.734)">
                                                <path id="Path_11763" data-name="Path 11763"
                                                    d="M975.793,118.718a8.849,8.849,0,0,0,7.944-12.728l-.014-.029v-2.924c-.039-.937-2.183-3.5-5.734-6.855-.04-.048-2.49-3.224-2.918-3.7-.628-.694-3.765-2.375-9.324-5a13.474,13.474,0,0,0-5.79-1.3H952.63v.934h7.327a12.548,12.548,0,0,1,5.391,1.213c7.411,3.5,8.784,4.507,9.03,4.779.336.373,2.2,2.771,2.886,3.664l.057.062c2.206,2.079,5.368,5.388,5.468,6.209v1.4l-.249-.3a8.832,8.832,0,0,0-6.763-3.135c-.239,0-.489.012-.788.039l-.05,0-.042-.029a13.791,13.791,0,0,0-6.088-1.663c-1.523,0-2.443.449-2.734,1.335a7.158,7.158,0,0,0,2.538,5.887,5.211,5.211,0,0,1,.838.917,3.171,3.171,0,0,1,.426,2.6,2.421,2.421,0,0,1-1.177,1.515,1.028,1.028,0,0,1-.831.09c-.4-.157-.8-.82-1.157-1.4a7.922,7.922,0,0,0-.695-1.027,53.113,53.113,0,0,0-5.01-5.139,15.591,15.591,0,0,1-3.208-3.606,12.891,12.891,0,0,1-.764-1.5c-.056-.125-.11-.244-.164-.361a2.756,2.756,0,0,0-1.523-1.639L955.266,97H952.63v.934h2.46l.028.013a1.31,1.31,0,0,1,.3.195,3.524,3.524,0,0,1,.763,1.269,13.8,13.8,0,0,0,.82,1.608,16.292,16.292,0,0,0,3.373,3.808,52.234,52.234,0,0,1,4.933,5.059,7.3,7.3,0,0,1,.6.9,4.783,4.783,0,0,0,1.374,1.672l.046.028.016.051a8.859,8.859,0,0,0,8.445,6.176v0Zm-7.306-13.862-.109.158-.118-.151a6.452,6.452,0,0,1-1.243-3.974l0-.06.042-.043c.774-.8,2.616-.649,5.973.406l.419.132-.418.137a8.842,8.842,0,0,0-4.543,3.4Zm.69,9.368a8.024,8.024,0,0,1-.728-1.378l-.064-.156.165-.035a2.492,2.492,0,0,0,.55-.188,3.328,3.328,0,0,0,1.673-2.1,4.093,4.093,0,0,0-.534-3.359,5.95,5.95,0,0,0-.982-1.093l-.21-.2.059-.1a7.919,7.919,0,1,1,.07,8.61Z"
                                                    transform="translate(0 0)" fill="#fff" stroke="#fff"
                                                    stroke-width="0.9" />
                                                <path id="Path_11764" data-name="Path 11764"
                                                    d="M1046.417,167.994h-2.932v-2.708h3.233v-.934h-1.534v-1.735h-.933v1.735h-1.233a.467.467,0,0,0-.467.467v3.641a.467.467,0,0,0,.467.467h2.932v2.707h-3.233v.934h1.534V174.3h.933v-1.735h1.233a.467.467,0,0,0,.467-.467v-3.641A.467.467,0,0,0,1046.417,167.994Z"
                                                    transform="translate(-68.933 -58.592)" fill="#fff"
                                                    stroke="#fff" stroke-width="0.9" />
                                            </g>
                                        </svg> مشاركاتك </a>
                                </li>
                                <li>
                                    <a href="{{ route('help-requests') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 25.701 30">
                                            <g id="list" transform="translate(0 0.25)">
                                                <path id="Path_11751" data-name="Path 11751"
                                                    d="M22.109,2.1H20.937V.67A.67.67,0,1,0,19.6.67V2.1H6.076V.67a.67.67,0,1,0-1.339,0V2.1H3.6A3.35,3.35,0,0,0,.25,5.451v20.7A3.35,3.35,0,0,0,3.6,29.5H22.1a3.35,3.35,0,0,0,3.349-3.349V5.445A3.349,3.349,0,0,0,22.109,2.1Zm2.009,24.049a2.015,2.015,0,0,1-2.009,2.009H3.6a2.015,2.015,0,0,1-2.009-2.009V5.445A2.015,2.015,0,0,1,3.6,3.436H4.737V4.474a.67.67,0,0,0,1.339,0V3.436H19.6V4.474a.67.67,0,1,0,1.339,0V3.436h1.172a2.015,2.015,0,0,1,2.009,2.009Zm0,0"
                                                    fill="#fff" stroke="#fff" stroke-width="0.5" />
                                                <path id="Path_11752" data-name="Path 11752"
                                                    d="M61.278,209.33l-2.471,2.357-1.138-1.138a.668.668,0,1,0-.944.944l1.6,1.6a.657.657,0,0,0,.475.194.649.649,0,0,0,.462-.188l2.94-2.813a.666.666,0,1,0-.924-.958Zm0,0"
                                                    transform="translate(-52.509 -195.132)" fill="#fff"
                                                    stroke="#fff" stroke-width="0.5" />
                                                <path id="Path_11753" data-name="Path 11753"
                                                    d="M193.82,230.2h-7.7a.67.67,0,1,0,0,1.339h7.7a.67.67,0,0,0,0-1.339Zm0,0"
                                                    transform="translate(-172.796 -214.783)" fill="#fff"
                                                    stroke="#fff" stroke-width="0.5" />
                                                <path id="Path_11754" data-name="Path 11754"
                                                    d="M61.278,109.33l-2.471,2.357-1.138-1.138a.668.668,0,0,0-.944.944l1.6,1.6a.657.657,0,0,0,.475.194.649.649,0,0,0,.462-.188l2.94-2.813a.666.666,0,1,0-.924-.958Zm0,0"
                                                    transform="translate(-52.509 -101.829)" fill="#fff"
                                                    stroke="#fff" stroke-width="0.5" />
                                                <path id="Path_11755" data-name="Path 11755"
                                                    d="M193.82,130.2h-7.7a.67.67,0,1,0,0,1.339h7.7a.67.67,0,0,0,0-1.339Zm0,0"
                                                    transform="translate(-172.796 -121.48)" fill="#fff"
                                                    stroke="#fff" stroke-width="0.5" />
                                                <path id="Path_11756" data-name="Path 11756"
                                                    d="M61.278,309.33l-2.471,2.357-1.138-1.138a.668.668,0,0,0-.944.944l1.6,1.6a.657.657,0,0,0,.475.194.649.649,0,0,0,.462-.188l2.94-2.813a.666.666,0,1,0-.924-.958Zm0,0"
                                                    transform="translate(-52.509 -288.435)" fill="#fff"
                                                    stroke="#fff" stroke-width="0.5" />
                                                <path id="Path_11757" data-name="Path 11757"
                                                    d="M193.82,330.2h-7.7a.67.67,0,1,0,0,1.339h7.7a.67.67,0,1,0,0-1.339Zm0,0"
                                                    transform="translate(-172.796 -308.086)" fill="#fff"
                                                    stroke="#fff" stroke-width="0.5" />
                                            </g> 
                                        </svg> طلباتي </a>
                                </li>
                                <li>
                                    <a href="{{ route('contactUs') }}">
                                        <svg id="Group_802" data-name="Group 802" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="25" viewBox="0 0 27.998 28">
                                            <path id="Path_11768" data-name="Path 11768"
                                                d="M23.908,4.1A14,14,0,0,0,3.231,22.927,5.356,5.356,0,0,1,.987,25.413a1.313,1.313,0,0,0,.379,2.474,7.235,7.235,0,0,0,1.107.083A8.358,8.358,0,0,0,7.4,26.337,14,14,0,0,0,23.908,4.1ZM22.778,22.767A12.4,12.4,0,0,1,7.73,24.7a.8.8,0,0,0-.971.124.263.263,0,0,0-.065.047,6.835,6.835,0,0,1-4.221,1.5H2.467a7.838,7.838,0,0,0,2.4-3.191.818.818,0,0,0,.041-.515.831.831,0,0,0-.2-.45,12.4,12.4,0,1,1,18.061.551Z"
                                                transform="translate(-0.019)" fill="#fff" />
                                            <circle id="Ellipse_221" data-name="Ellipse 221" cx="0.983"
                                                cy="0.983" r="0.983" transform="translate(13.009 13.017)"
                                                fill="#fff" />
                                            <circle id="Ellipse_222" data-name="Ellipse 222" cx="0.983"
                                                cy="0.983" r="0.983" transform="translate(18.077 13.017)"
                                                fill="#fff" />
                                            <circle id="Ellipse_223" data-name="Ellipse 223" cx="0.983"
                                                cy="0.983" r="0.983" transform="translate(7.942 13.017)"
                                                fill="#fff" />
                                        </svg> فريق الدعم </a>
                                </li>
                            </ul>
                            <div class="copyright">
                                <p>جميع الحقوق محفوظة لـ</p> <img src="{{ asset('images/logo.png') }}"
                                    class="img-fluid" alt="جمعية الوفاق" />
                            </div>
                        </div>
                    </aside>
                </div> --}}
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <div class="content-pages @yield('body_class')"> @yield('content') </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <!--model  cart-->
    <script src="{{ asset('js/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/dropdown-date.js') }}"></script>

    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('js/swiper/swiper.jquery.js') }}"></script>
    <script src="{{ asset('js/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('js/animation/aos.js') }}"></script>
    <script src="{{ asset('js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/table/jquery.basictable.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
    <script src="https://s.cdpn.io/42883/sequence.jquery-min.js"></script>
    <script src="https://s.cdpn.io/42883/jquery.ba-hashchange.min.js"></script>
    <script src="https://s.cdpn.io/42883/sequencejs-options.modern-slide-in.js"></script>
    <script src="https://s.cdpn.io/42883/jquery.sharrre-1.3.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="{{ asset('js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-hijri-datetimepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    @yield('scripts')

    {{--    <script> --}}
    {{--        var linkli =$('.actions li:last-of-type '); var link=$('.actions li:last-of-type a'); var linkhref = link.attr('href'); if( linkhref == '#finish') { link.css('display','none'); linkli.css('padding','0') } --}}
    {{--    </script> --}}


    <script>
        $(document.body).on('click', '.deleteItem', function(event) {
            event.preventDefault();

            let iid = $(this).data("item");
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('cart.destroy') }}",
                type: "POST",
                data: {
                    id: iid,
                    _token: _token
                },
                success: function(response) {
                    console.log(response);
                    if (response.message == 'success') {
                        $("#item" + iid).remove();
                        let numItems = $('.order-item').length;
                        let sum = 0;
                        $("#num").html(numItems);
                        if (numItems == 0) {
                            $("#book-details").html(
                                '<div class="p-5 text-center"><h1>السلة فارغة</h1> </div>');
                        } else {

                            $(".item-total").each(function() {
                                sum += +$(this).val();
                            });
                            $("#total").val(sum);
                            $("#total2").val(sum + " ريال");
                            $("#total3").val(sum);

                        }

                    }
                },
            });


        });

        $(document.body).on('change', '.updateQty', function(event) {
            event.preventDefault();
            let self = $(this);
            let iid = $(this).data("item");
            let type = $(this).data("type");
            let _token = $('meta[name="csrf-token"]').attr('content');
            let quantity = $(this).val();

            $.ajax({
                url: "{{ url('') }}/cart/" + iid,
                type: "PUT",
                data: {
                    id: iid,
                    quantity: quantity,
                    type: type,
                    _method: 'PUT',
                    _token: _token
                },
                success: function(response) {
                    if (response.message == 'success') {
                        let numItems = $('.order-item').length;
                        let sum = 0;
                        let sum2 = 0;
                        $("#num").html(numItems);
                        if (numItems == 0) {
                            $("#book-details").html(
                                '<div class="p-5 text-center"><h1>السلة فارغة</h1> </div>');
                        } else {

                            let priceTotal = $(self).parents('.order-item').find('.item-price').val() *
                                quantity;
                            $(self).parents('.order-item').find('.item-total').val(priceTotal);
                            $(self).parents('.order-item').find('.priceItemPrice').val(priceTotal +
                                ' ريال');



                            $(".item-total").each(function() {
                                sum += +$(this).val();
                            });
                            $(".updateQty").each(function() {
                                sum2 += +$(this).val();
                            });
                            $("#num").html(sum2);

                            $("#total").val(sum);
                            $("#total2").val(sum + " ريال");
                            $("#total3").val(sum);

                        }

                    }
                },
            });


        });
    </script>
    <!-- GetButton.io widget -->
    <script type="text/javascript">
        (function() {
            var options = {
                whatsapp: "966 564292025", // WhatsApp number
                call_to_action: "", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol,
                host = "getbutton.io",
                url = proto + "//static." + host;
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url + '/widget-send-button/js/init.js';
            s.onload = function() {
                WhWidgetSendButton.init(host, proto, options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
        $('#media-slider').swiper({
            autoplay: true,
            speed: 4000,
            mode: 'horizontal',
            slidesPerView: 4,
            spaceBetween: 15,
            loop: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            paginationClickable: true,
            pagination: '.swiper-pagination',
            breakpoints: {
                580: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
            }
        });
    </script>
    <!-- /GetButton.io widget -->
</body>

</html>
