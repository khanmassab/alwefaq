@extends('layouts.user')
@section('body_class')
    asking_help fill_data height_shop
@endsection
@section('content')
                        <div class="title_page">
                            <h2>  برجاء ملئ البيانات</h2>
                            <a href="{{route('help')}}">
                                الرجوع
                                <svg xmlns="http://www.w3.org/2000/svg" width="25.706" height="24.329" viewBox="0 0 25.706 24.329">
                                    <g id="Group_714" data-name="Group 714" transform="translate(-198 -222.086)">
                                        <g id="Group_601" data-name="Group 601" transform="translate(-1363 -858)">
                                            <g id="Component_1_16" data-name="Component 1 – 16" transform="translate(1562 1081.5)">
                                                <path id="Path_11605" data-name="Path 11605" d="M1572.75,1103,1562,1092.25l10.75-10.75" transform="translate(-1562 -1081.5)" fill="none" stroke="#90599f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                            </g>
                                            <path id="Path_11606" data-name="Path 11606" d="M1579.75,1103,1569,1092.25l10.75-10.75" transform="translate(5.542)" fill="none" stroke="#bfc9ce" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        @if(isset ($errors) && count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>

                            @endforeach
                        @endif
                        <form action="{{ route('help-item.store') }}" method="POST">
                            @csrf
                            <p>
                                <label>الاسم كامل</label>
                                <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required />
                            </p>
                            <p>
                                <label> البريد الإلكتروني</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                            </p>
                            <p>
                                <label> رقم الجوال </label>
                                <input type="tel" class="form-control" name="phoneNumber" value="{{ old('phoneNumber') }}" required />
                            </p>

                            <p>
                                <label>  العنوان</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" required />
                            </p>

                            <!-- products -->
                            <div class="products_">
                                <div class="title_page ">
                                    <h2>قائمة المنتجات الموجودة</h2>
                                </div>
                                <div id="product-slider" class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($items as $key => $item)
                                            <div class="swiper-slide">
                                                <div class="item_pro">
                                                    <!-- <a href="#"> -->
                                                        <div class="image">
                                                            <img src="{{$item->image}}" alt="" class="img-fluid" />
                                                        </div>
                                                        <div class="caption">
                                                            <p>
                                                                <label>
                                                                    <input type="checkbox" name="items[]" value="{{$item->id}}.{{$item->name}}" @if($key==1) @endif >
                                                                    <span class="checkmark">احتاج هذا</span>
                                                                    <!-- <span class="para">أحتاج هذا -->

                                                                </label>
                                                            </p>
                                                        </div>
                                                    <!-- </a> -->
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="item">

                            <button class="submit" type="submit">   تقديم الطلب</button>
                        </form>
                        <div class="order ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="109.513" height="109.513" viewBox="0 0 109.513 109.513">
                                    <g id="Group_801" data-name="Group 801" transform="translate(-964.584 -281.33)">
                                        <path id="Path_11393" data-name="Path 11393" d="M1427.513,237.257a43.321,43.321,0,0,1-16.362,33.882,43.258,43.258,0,1,1,16.362-33.882Z" transform="translate(-364.916 98.83)" fill="none" stroke="#90599f" stroke-width="23" opacity="0.19"/>
                                        <g id="Group_464" data-name="Group 464" transform="translate(976.256 293.059)">
                                            <rect id="Rectangle_292" data-name="Rectangle 292" width="86" height="86" rx="43" transform="translate(-0.256 -0.059)" fill="#90599f"/>
                                        </g>
                                        <path id="done" d="M16.565,40.117H6.8a3.412,3.412,0,0,1-3.409-3.4V11.049A3.412,3.412,0,0,1,6.8,7.65h5.345V8.5a5.1,5.1,0,1,0,10.2,0V7.65H27.7a3.4,3.4,0,0,1,3.4,3.4V24.138a1.7,1.7,0,0,0,3.4,0V11.049a6.807,6.807,0,0,0-6.8-6.8H22.344V1.7a1.7,1.7,0,0,0-1.7-1.7h-6.8a1.7,1.7,0,0,0-1.7,1.7V4.25H6.8a6.807,6.807,0,0,0-6.8,6.8V36.718a6.807,6.807,0,0,0,6.8,6.8h9.765a1.7,1.7,0,0,0,0-3.4ZM15.545,3.4h3.4V8.5a1.7,1.7,0,0,1-3.4,0ZM11.72,20.314a1.7,1.7,0,0,1-1.7,1.7H9.17a1.7,1.7,0,0,1,0-3.4h.85A1.7,1.7,0,0,1,11.72,20.314Zm15.469,0a1.7,1.7,0,0,1-1.7,1.7H15.97a1.7,1.7,0,0,1,0-3.4h9.519A1.7,1.7,0,0,1,27.189,20.314Zm-15.469,6.8a1.7,1.7,0,0,1-1.7,1.7H9.17a1.7,1.7,0,1,1,0-3.4h.85A1.7,1.7,0,0,1,11.72,27.113Zm15.469,0a1.7,1.7,0,0,1-1.7,1.7H15.97a1.7,1.7,0,0,1,0-3.4h9.519A1.7,1.7,0,0,1,27.189,27.113Zm0,0" transform="translate(1000 314.484)" fill="#fff"/>
                                    </g>
                                </svg>
                                <p>طلب عيني</p>
                        </div>
@endsection
