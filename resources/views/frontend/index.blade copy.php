@extends('layouts.app')
@section('content')

         <div id="sequence-theme">
     
            <div id="sequence">
               <img class="prev" src="{{asset('images/btn-prev.png')}}" alt="Previous Frame" />
               <img class="next" src="{{asset('images/btn-next.png')}}" alt="Next Frame" />
               <ul>


                   @foreach($sliders as $slider)
                       <li>
                           <img class="model" src="{{$slider->image}}" alt="Model 3" />
                           <h2 class="title"> {{$slider->title}}</h2>
                           <p class="subtitle">{{$slider->content}}</p>
                           <a class="subtitle title2" href="{{$slider->url}}">شارك الأن</a>
                       </li>
                   @endforeach
               </ul>
            </div>
            <ul class="nav">
{{--               <li><img src="images/tn-model2.png"  /></li>--}}
{{--               <li><img src="images/tn-model3.png" /></li>--}}
            </ul>

         </div>
           <!-- MediaSection -->
           <section class="media ">
            <div class="container-fluid">
               <div class="title">
                  <h2>المركز الاعلامي </h2>
               </div>
               <div id="media-slider" class="swiper-container">
                  <div class="swiper-wrapper">
                      @foreach($news as $new)
                         <div class="swiper-slide" style="font-size:">
                            <div class="item">
                                  <div class="image">
                                     <img src="{{ $new->image }}" alt="" style="width:100%;min-height:100%" />
                                  </div>
                                  <div class="caption">
                                      <h4><a href="{{route('news-center.show', $new->id)}}">{{$new->title}}</a></h4>
                                      <p>{{ mb_strimwidth(strip_tags($new->content),0,74,'','utf-8') }} </p>
                                     </div>
                            </div>
                         </div>
                      @endforeach

                  </div>
                  <div class="swiper-pager">
                     <div class="swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47.758" height="47.758" viewBox="0 0 47.758 47.758">
                           <path id="arrow-circle-left_1_" data-name="arrow-circle-left (1)" d="M34.738,24.184a2.469,2.469,0,0,1,0,3.391l-7.164,7.164a2.4,2.4,0,1,1-3.391-3.391l3.1-3.08H18.715a2.388,2.388,0,1,1,0-4.776h8.573l-3.1-3.08a2.4,2.4,0,1,1,3.391-3.391Zm15.02,1.7A23.879,23.879,0,1,1,25.879,2,23.879,23.879,0,0,1,49.758,25.879Zm-42.982,0a19.1,19.1,0,1,0,19.1-19.1A19.1,19.1,0,0,0,6.776,25.879Z" transform="translate(-2 -2)" fill="#90599f"/>
                        </svg>
                     </div>
                     <div class="swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="47.758" height="47.758" viewBox="0 0 47.758 47.758">
                           <path id="arrow-circle-left_1_" data-name="arrow-circle-left (1)" d="M17.02,24.184a2.469,2.469,0,0,0,0,3.391l7.164,7.164a2.4,2.4,0,0,0,3.391-3.391l-3.1-3.08h8.573a2.388,2.388,0,1,0,0-4.776H24.47l3.1-3.08a2.4,2.4,0,1,0-3.391-3.391ZM2,25.879A23.879,23.879,0,1,0,25.879,2,23.879,23.879,0,0,0,2,25.879Zm42.982,0a19.1,19.1,0,1,1-19.1-19.1A19.1,19.1,0,0,1,44.982,25.879Z" transform="translate(-2 -2)" fill="#90599f"/>
                        </svg>
                     </div>
                  </div>
                  <div class="swiper-pagination"></div>
               </div>
            </div>
         </section>
         <!-- AboutSection -->
         <div class="about ">
            <div class="container-fluid">
               <!-- / tab -->
               <div class="tab">
                  <ul class="tabs">
                      @foreach($information as $info)

                      <li><a href="#"> {{$info->title}}</a></li>
                      @endforeach
                  </ul>
                  <!-- / tabs -->
                  <div class="tab_content">
                      @foreach($information as $info)
                     <div class="tabs_item">
                        <h4>{{$info->title}}</h4>
                        <p>{{$info->content}}</p>
                     </div>
                      @endforeach
                  </div>
                  <!-- / tab_content -->
               </div>
            </div>
         </div>
         <!-- ServiceSection -->
         <div class="services">
            <div class="container-fluid">
               <div class="title text-center">
                  <h2>أهداف </h2>
                  <span>جمعية الوفاق </span>
               </div>
               <div class="row">
                  <div class="col-xl-8 col-md-8">
                     <div id="service-slider" class="swiper-container">
                        <div class="swiper-wrapper">
                           <div class="swiper-slide">
                              <div class="item_services">
                                    <div class="image">
                                       <img src="{{ asset('images/13-pin.svg') }}" alt="" class="img-fluid" />
                                    </div>
                                    <div class="caption">
                                       <p>التوفيق بين الراغبين بالزواج من الجنسين بطرق موثقة .</p>
                                    </div>
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="item_services">
                                    <div class="image">
                                       <img src="{{ asset('images/27-sign.svg') }}" alt="" class="img-fluid" />
                                    </div>
                                    <div class="caption">
                                       <p>الحد من ظاهرة التأخر في الزواج.</p>
                                    </div>
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="item_services">
                                    <div class="image">
                                       <img src="{{ asset('images/12-pin.svg') }}" alt="" class="img-fluid" />
                                    </div>
                                    <div class="caption">
                                       <p> تقديم الخدمات التثقيفية والإرشاد الأسري للمقبلين على الزواج .</p>
                                    </div>
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="item_services">
                                    <div class="image">
                                       <img src="{{ asset('images/number.svg') }}" alt="" class="img-fluid" />
                                    </div>
                                    <div class="caption">
                                       <p>تأهيل القبلين على الزواج والمتزوجين بالقضايا الأسرية.</p>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-md-4">
                     <ul class="parent">
                        <li class="mozilla">
                           <img src="{{ asset('images/gift.svg') }}" class="img-fluid" alt=" " />
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- PartnersSection -->
         <section class="partners ">
            <div class="container-fluid">
               <div class="title">
                  <h2>  شركاؤنا</h2>
               </div>
               <div id="partners-slider" class="swiper-container">
                  <div class="swiper-wrapper">
                  @foreach($partners as $partner)
                     <div class="swiper-slide">
                        <div class="item">
                           <!-- <a href="#"> -->
                              <div class="image">
                                 <img src="{{ $partner->image }}" alt="" class="img-fluid" style="width:100%">
                              </div>
                           <!-- </a> -->
                        </div>
                     </div>
                  @endforeach
                  <div class="swiper-pagination"></div>
               </div>
            </div>
            </div>
         </section>
         <!-- ourPartners Section -->
         <!-- <div class="ourPartner"> 
         <div class="container-fluid">
         @foreach($partners as $partner)

          <div class="col-md-4">
            <img src="{{ $partner->image }}" alt="" style="width:100% " />
                                  </div>
                                  <div class="caption">
                                      <p>{{ mb_strimwidth(strip_tags($partner->name),0,74,'','utf-8') }} </p>
                                     </div>
                            </div>
                         </div>
                      @endforeach
</div>
         </div> -->

         <!-- Donate nowSection-->
         <div class="donate_now">
            <div class="container-fluid">
               <div class="d-flex">
                  <div class="donate_now_content">
                     <h2> شارك جميـة الوفـاق
                        فـي مشـوارها
                     </h2>
                     <p>لأحياء زواج مبارك شارك معنا في تقريب القلوب هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص </p>
                     <a href="{{route('shop')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28.72" height="30.126" viewBox="0 0 28.72 30.126">
                           <defs>
                              <clipPath id="clip-path">
                                 <rect width="28.72" height="30.126" fill="none"></rect>
                              </clipPath>
                           </defs>
                           <g id="Repeat_Grid_1" data-name="Repeat Grid 1" clip-path="url(#clip-path)">
                              <g transform="translate(-1762 -165)">
                                 <path id="Path_10204" data-name="Path 10204" d="M1285.028,637.444a.4.4,0,0,0-.512-.247l-4.119,1.431a.4.4,0,0,0-.177.121l-6.393,7.646a6.5,6.5,0,0,1-2.471,1.82l-.739.308-2.72,1.133a.729.729,0,0,1-1-.568l-.057-.4a2.871,2.871,0,0,1,.925-2.553l2.087-1.878a4.347,4.347,0,0,0,1.182-1.764l.953-2.671a2.8,2.8,0,0,0-1.15-3.325c-1.691-1.064-2.838-1.455-4.583-.713l-.013,0a.406.406,0,0,0-.1.044,9.906,9.906,0,0,0-1.105.589l-3.2,2.626a2.868,2.868,0,0,0-1,2.712l.5,2.846a3.779,3.779,0,0,0-2.849,1.542l-1.3-6.318a2.671,2.671,0,0,1,.463-2.117l5.8-7.905a3.413,3.413,0,0,1,2.5-1.39l14.127-.642,2.861-.847a.4.4,0,1,0-.228-.77l-2.764.831-14.042.627a4.224,4.224,0,0,0-3.1,1.717l-5.8,7.905a3.479,3.479,0,0,0-.6,2.754l1.492,7.257a4.779,4.779,0,0,0-.186,2.5c.614,3.31,6.19,6.339,6.427,6.466a.4.4,0,0,0,.381,0c.236-.127,5.813-3.156,6.427-6.466a4.974,4.974,0,0,0,.068-.518l.655-.273a7.312,7.312,0,0,0,2.779-2.046l6.321-7.56,4.014-1.4A.4.4,0,0,0,1285.028,637.444Zm-19.526-.373c.206-.125.4-.236.587-.333a10.264,10.264,0,0,1,.219,4.214,2.789,2.789,0,0,1-1.6,2.011c-.077-2.023-.353-4.187-.446-4.875Zm-.782,6.75a3.568,3.568,0,0,0,2.371-2.69,11.143,11.143,0,0,0-.254-4.725c1.335-.479,2.205-.092,3.569.768a2,2,0,0,1,.822,2.375l-.953,2.671a3.523,3.523,0,0,1-.962,1.437l-1.185,1.065a3.861,3.861,0,0,0-3.8,1.18c-.067-.068-.136-.133-.205-.2A3.732,3.732,0,0,0,1264.72,643.821Zm-2.372-4.157,1.184-.973c.131,1.042.356,3.057.39,4.83a3.016,3.016,0,0,1-.438,1.695,3.882,3.882,0,0,0-1.32-.547l-.54-3.055A2.061,2.061,0,0,1,1262.348,639.664Zm7.8,9.938c-.485,2.617-4.855,5.243-5.826,5.8-.971-.555-5.34-3.181-5.826-5.8a3.953,3.953,0,0,1,.185-2.178,3.071,3.071,0,0,1,2.78-2.023,2.761,2.761,0,0,1,.307.018,3.531,3.531,0,0,1,2.246,1.34.4.4,0,0,0,.615,0,3.339,3.339,0,0,1,2.738-1.353l-.144.13a3.675,3.675,0,0,0-1.183,3.265l.058.4a1.529,1.529,0,0,0,2.106,1.2l1.946-.811Z" transform="translate(505.671 -461.136)" fill="#fff" stroke="#fff" stroke-width="0.5"></path>
                              </g>
                           </g>
                        </svg>
                        شارك الآن
                     </a>
                  </div>
                  <div class="donate_now_img">
                     <img src="/public/uploads/setting/{{$settings[0]->image1}}" alt="" class="img-fluid" />
                  </div>
               </div>
            </div>
         </div>

         <!-- WantingmarriedSection-->
         <div class="Wanting_married">
            <div class="container-fluid">
               <div class="d-flex">
                  <div class="Wanting_married_content">
                     <h2>الـراغبيـن بالــزواج</h2>
                     <p>نساعـدك فـي إيجـاد الشـريك المناسـب مع بـاقة من البـرامج التأهيليـة والخـدمات الاجتمـاعية المساعـدة</p>
                     <a href="{{route('create-marriage-request')}}"> تقدم الأن</a>
                  </div>
                  <div class="Wanting_married_img">
                     <img src="/public/uploads/setting/{{$settings[0]->image2}}" alt="" class="img-fluid" />
                  </div>
               </div>
            </div>
         </div>


@endsection

