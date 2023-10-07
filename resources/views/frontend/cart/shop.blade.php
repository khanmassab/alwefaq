@extends('layouts.user')
@section('body_class')
 fill_data shop
@endsection

@section('content')

                @if(session()->has('success'))
                   <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if($sadakats->count())
                 <div class=" ">
                     <div class=" accordion" id="accordionExample">
                        <div class="card">
                           <div class="card-header" id="heading">
                              <h2 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab" aria-expanded="true" aria-controls="tab">
                                    <div class="title">
                                       <h2>  الصدقات</h2>
                                    </div>
                                 </button>
                              </h2>
                           </div>
                           <div id="tab" class="collapse show " aria-labelledby="heading" data-parent="#accordionExample">
                              <div class="card-body">
                                 <h4>
                                    تعريف عن نظام الصدقات ومصارفها الشرعية
                                 </h4>
                                 <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي</p>
                                 <h4 class="last">الباقات الخاصة بالصدقات</h4>
                                 <div >
                                     <form method="post" action="{{route('cart.store')}}" class="row" >
                                        @csrf
                                         <input type="hidden" name="quantity" value="1" >
                                         <input type="hidden" name="type" value="sadakat" >
                                         @php $i=1; @endphp

                                         @foreach($sadakats as $sadak)
                                            <input type="radio" class="hidden_radio" name="item_id" value="{{$sadak->id}}" id="sadak{{$sadak->id}}"  @if($i=1) required @endif >
                                            @php $i++; @endphp
                                            <label for="sadak{{$sadak->id}}"  class="col-sm-4 col-xs-6 cursor">
                                                   <div class="bouquet">
                                                        {{$sadak->price}} ريال
                                                   </div>
                                            </label>

                                         @endforeach

                                         <div class="col-md-12">
                                                 <button  class="btn add_cart" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="34.99" height="33.009" viewBox="0 0 34.99 33.009">
                              <g id="Group_510" data-name="Group 510" transform="translate(0.121 0.121)">
                                 <path id="Path_11489" data-name="Path 11489" d="M672.971,395.306a4.4,4.4,0,1,0,4.4,4.4A4.4,4.4,0,0,0,672.971,395.306Zm2.215,4.4a2.215,2.215,0,1,1-2.215-2.215A2.218,2.218,0,0,1,675.186,399.706Z" transform="translate(-661.379 -371.318)" fill="#90599f" stroke="#90599f" stroke-width="0.2"/>
                                 <path id="Path_11490" data-name="Path 11490" d="M692.766,368.177a1.1,1.1,0,0,0-.871-.435H665.879l-.485-2.719a4.842,4.842,0,0,0-3.91-3.9l-1.923-.335a1.092,1.092,0,1,0-.509,2.124.979.979,0,0,0,.108.02l1.951.34a2.641,2.641,0,0,1,2.133,2.135l2.638,14.875a4.056,4.056,0,0,0,4,3.364h15.658a4.087,4.087,0,0,0,3.889-2.891l3.5-11.611A1.125,1.125,0,0,0,692.766,368.177Zm-2.337,1.742-3.084,10.2h0a1.886,1.886,0,0,1-1.8,1.339h-15.65a1.853,1.853,0,0,1-1.855-1.561l-1.768-9.976Z" transform="translate(-658.214 -360.761)" fill="#90599f" stroke="#90599f" stroke-width="0.2"/>
                                 <path id="Path_11491" data-name="Path 11491" d="M695.5,395.306a4.4,4.4,0,1,0,4.4,4.4A4.4,4.4,0,0,0,695.5,395.306Zm2.214,4.4a2.215,2.215,0,1,1-2.214-2.215A2.218,2.218,0,0,1,697.714,399.706Z" transform="translate(-668.263 -371.318)" fill="#90599f" stroke="#90599f" stroke-width="0.2"/>
                              </g>
                           </svg>
                           <span>اضافة للسلة</span></button>

                                         </div>

                                     </form>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                @endif

                  <div class=" ">
                     <div class=" accordion" id="accordionExample2">
                        <div class="card">
                           <div class="card-header" id="heading2">
                              <h2 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab2" aria-expanded="true" aria-controls="tab2">
                                    <div class="title">
                                       <h2>  الزكاة</h2>
                                    </div>
                                 </button>
                              </h2>
                           </div>
                           <div id="tab2" class="collapse show " aria-labelledby="heading2" data-parent="#accordionExample2">
                              <div class="card-body">
                                 <h4>
                                    تعريف عن نظام الزكاة ومصارفها الشرعية
                                 </h4>
                                 <p>الزكاة في الفقه الإسلامي تتضمن دراسة زكاة المال، وزكاة الفطر، والأموال الزكوية ومقاديرها وأحكامها، وتجب في النعم والذهب والفضة وفي أجناس من الزروع والثمار، وفي عروض التجارة والركاز والمعدن. والزكاة فريضة شرعية ذات نظام متكامل، يهدف لتحقيق مصالح العباد والبلاد والتكافل الاجتماعي، وسد حاجة المحتاجين، وإغناء الفقير. والزكاة هي الصدقة المفروضة، بقدر معلوم في المال</p>
                                 <h4 class="last">  ادفع زكاتك</h4>
                                     <form method="post" action="{{route('cart.store')}}" class="row" >
                                        @csrf
                                         <input type="hidden" name="quantity" value="1" >
                                         <input type="hidden" name="type" value="zakah" >
                                         <input type="hidden" name="item_id" value="" >
                                        <input type="number" name="price" min="1" step="any"  placeholder="ادخل قمية زكاتك" required="required" />


                                         <div class="col-md-12 mt-5">
                                                 <button  class="btn add_cart" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="34.99" height="33.009" viewBox="0 0 34.99 33.009">
                              <g id="Group_510" data-name="Group 510" transform="translate(0.121 0.121)">
                                 <path id="Path_11489" data-name="Path 11489" d="M672.971,395.306a4.4,4.4,0,1,0,4.4,4.4A4.4,4.4,0,0,0,672.971,395.306Zm2.215,4.4a2.215,2.215,0,1,1-2.215-2.215A2.218,2.218,0,0,1,675.186,399.706Z" transform="translate(-661.379 -371.318)" fill="#90599f" stroke="#90599f" stroke-width="0.2"/>
                                 <path id="Path_11490" data-name="Path 11490" d="M692.766,368.177a1.1,1.1,0,0,0-.871-.435H665.879l-.485-2.719a4.842,4.842,0,0,0-3.91-3.9l-1.923-.335a1.092,1.092,0,1,0-.509,2.124.979.979,0,0,0,.108.02l1.951.34a2.641,2.641,0,0,1,2.133,2.135l2.638,14.875a4.056,4.056,0,0,0,4,3.364h15.658a4.087,4.087,0,0,0,3.889-2.891l3.5-11.611A1.125,1.125,0,0,0,692.766,368.177Zm-2.337,1.742-3.084,10.2h0a1.886,1.886,0,0,1-1.8,1.339h-15.65a1.853,1.853,0,0,1-1.855-1.561l-1.768-9.976Z" transform="translate(-658.214 -360.761)" fill="#90599f" stroke="#90599f" stroke-width="0.2"/>
                                 <path id="Path_11491" data-name="Path 11491" d="M695.5,395.306a4.4,4.4,0,1,0,4.4,4.4A4.4,4.4,0,0,0,695.5,395.306Zm2.214,4.4a2.215,2.215,0,1,1-2.214-2.215A2.218,2.218,0,0,1,697.714,399.706Z" transform="translate(-668.263 -371.318)" fill="#90599f" stroke="#90599f" stroke-width="0.2"/>
                              </g>
                           </svg>
                           <span>اضافة للسلة</span></button>

                                         </div>

                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                @if($ashoms->count())
                  <div class=" shop3 ">
                     <div class=" accordion" id="accordionExample3">
                        <div class="card">
                           <div class="card-header" id="heading3">
                              <h2 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tab3" aria-expanded="true" aria-controls="tab3">
                                    <div class="title">
                                       <h2>  اسهم الوقف الخيري</h2>
                                    </div>
                                 </button>
                              </h2>
                           </div>
                           <div id="tab3" class="collapse show " aria-labelledby="heading3" data-parent="#accordionExample3">
                              <div class="card-body">
                                 <div id="shares-slider" class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($ashoms as $sahm)
                                            @php $remain =  AppHelper::getRemain($sahm->id,$sahm->total_stocks); @endphp
                                        @if($remain > 0)

                                       <div class="swiper-slide">
                                          <div class="item">
                                             <div class="image">
                                                <div class="d-flex">
                                                   <img src="./images/sharee1.png" alt="" class="img-fluid" />
                                                   <div class="text">
                                                      <span>{{$sahm->name}}</span>
                                                      <span class="num">{{$sahm->price}} ريال</span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="caption">
                                                <h4>  <span>عدد الأسهم الكلي</span> <strong>{{$sahm->total_stocks}} سهم</strong></h4>


                                                <h4>  <span>عدد الأسهم المتبقية</span> <strong>{{$remain}} سهم</strong></h4>

                                        <form method="post" action="{{route('cart.store')}}" class=" mt-3" >
                                        @csrf

                                         <input type="hidden" name="type" value="ashom" >
                                         <input type="hidden" name="item_id" value="{{$sahm->id}}" >
                                         <input type="number"  min="1" max="{{$remain}}"  value="1" required="required" step="1" name="quantity" >
                                            <button  class="btn add_cart " type="submit">
                           <span>شراء الاسهم</span></button>

                                                 </form>
                                             </div>
                                          </div>
                                       </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="swiper-pager">
                                       <div class="swiper-button-next">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                                             <g id="Group_570" data-name="Group 570" transform="translate(-224 -2829)">
                                                <circle id="Ellipse_216" data-name="Ellipse 216" cx="30" cy="30" r="30" transform="translate(224 2829)" fill="#ebebeb"/>
                                                <path id="Path_11605" data-name="Path 11605" d="M1562,1093.5l6-6-6-6" transform="translate(-1311 1771.5)" fill="none" stroke="#c5c4c4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                             </g>
                                          </svg>
                                       </div>
                                       <div class="swiper-button-prev">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                                             <g id="Group_571" data-name="Group 571" transform="translate(-151 -2829)">
                                                <circle id="Ellipse_215" data-name="Ellipse 215" cx="30" cy="30" r="30" transform="translate(151 2829)" fill="#ebebeb"/>
                                                <g id="Component_1_2" data-name="Component 1 – 2" transform="translate(175 2853)">
                                                   <path id="Path_11605" data-name="Path 11605" d="M1568,1093.5l-6-6,6-6" transform="translate(-1562 -1081.5)" fill="none" stroke="#c5c4c4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"/>
                                                </g>
                                             </g>
                                          </svg>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                @endif

@endsection
