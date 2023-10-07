<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Rowaad">
      <meta name="description" content="جمعية الوفاق  ">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link rel="icon" href="{{asset('frontend/images/logo.png')}}" alt="icon" type="image/x-icon" sizes="40*40"/>
      <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-rtl.min.css') }}">
      <link rel="stylesheet" href="https://s.cdpn.io/42883/mixins.scss">
      <!--  css files -->
      <link rel="stylesheet" href="{{ asset('css/swiper/swiper.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/swiper/swiper2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/jquery.steps.css') }}">
      <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
      <!-- fonts -->
      <!-- <link rel="stylesheet" href="{{ asset('fonts/Bukra/stylesheet.css') }}">
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
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   </head>
   <body class="home">
      <header class="d-none d-sm-block">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                  {{--
                  <ul class="menu_right list-inline  ">
                     --}}
                     {{--
                     <li class="list-inline-item">--}}
                        {{--                        <a  href="{{route('contactUs')}}">اتصل بنا</a>--}}
                        {{--
                     </li>
                     --}}
                     {{--                    @guest--}}
                     {{--
                     <li class="list-inline-item">--}}
                        {{--                        <a  href="{{route('register')}}">انضم إلينا  </a>--}}
                        {{--
                     </li>
                     --}}
                     {{--                      @endguest--}}
                     {{--
                     <li class="list-inline-item">--}}
                        {{--                        <a  href="{{route('page','trk-altbraa')}}">  طرق التبرع </a>--}}
                        {{--
                     </li>
                     --}}
                     {{--
                     <li class="list-inline-item">--}}
                        {{--                        <a href="{{route('shop')}}">المتجر   </a>--}}
                        {{--
                     </li>
                     --}}
                     {{--
                  </ul>
                  --}}
                  <ul class=" orders list-inline">
                     <li class="list-inline-item ">
                        <a href="{{route('shop')}}" class="button">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28.72" height="30.126" viewBox="0 0 28.72 30.126">
                              <defs>
                                 <clipPath id="clip-path">
                                    <rect width="28.72" height="30.126" fill="none"/>
                                 </clipPath>
                              </defs>
                              <g id="Repeat_Grid_1" data-name="Repeat Grid 1" clip-path="url(#clip-path)">
                                 <g transform="translate(-1762 -165)">
                                    <path id="Path_10204" data-name="Path 10204" d="M1285.028,637.444a.4.4,0,0,0-.512-.247l-4.119,1.431a.4.4,0,0,0-.177.121l-6.393,7.646a6.5,6.5,0,0,1-2.471,1.82l-.739.308-2.72,1.133a.729.729,0,0,1-1-.568l-.057-.4a2.871,2.871,0,0,1,.925-2.553l2.087-1.878a4.347,4.347,0,0,0,1.182-1.764l.953-2.671a2.8,2.8,0,0,0-1.15-3.325c-1.691-1.064-2.838-1.455-4.583-.713l-.013,0a.406.406,0,0,0-.1.044,9.906,9.906,0,0,0-1.105.589l-3.2,2.626a2.868,2.868,0,0,0-1,2.712l.5,2.846a3.779,3.779,0,0,0-2.849,1.542l-1.3-6.318a2.671,2.671,0,0,1,.463-2.117l5.8-7.905a3.413,3.413,0,0,1,2.5-1.39l14.127-.642,2.861-.847a.4.4,0,1,0-.228-.77l-2.764.831-14.042.627a4.224,4.224,0,0,0-3.1,1.717l-5.8,7.905a3.479,3.479,0,0,0-.6,2.754l1.492,7.257a4.779,4.779,0,0,0-.186,2.5c.614,3.31,6.19,6.339,6.427,6.466a.4.4,0,0,0,.381,0c.236-.127,5.813-3.156,6.427-6.466a4.974,4.974,0,0,0,.068-.518l.655-.273a7.312,7.312,0,0,0,2.779-2.046l6.321-7.56,4.014-1.4A.4.4,0,0,0,1285.028,637.444Zm-19.526-.373c.206-.125.4-.236.587-.333a10.264,10.264,0,0,1,.219,4.214,2.789,2.789,0,0,1-1.6,2.011c-.077-2.023-.353-4.187-.446-4.875Zm-.782,6.75a3.568,3.568,0,0,0,2.371-2.69,11.143,11.143,0,0,0-.254-4.725c1.335-.479,2.205-.092,3.569.768a2,2,0,0,1,.822,2.375l-.953,2.671a3.523,3.523,0,0,1-.962,1.437l-1.185,1.065a3.861,3.861,0,0,0-3.8,1.18c-.067-.068-.136-.133-.205-.2A3.732,3.732,0,0,0,1264.72,643.821Zm-2.372-4.157,1.184-.973c.131,1.042.356,3.057.39,4.83a3.016,3.016,0,0,1-.438,1.695,3.882,3.882,0,0,0-1.32-.547l-.54-3.055A2.061,2.061,0,0,1,1262.348,639.664Zm7.8,9.938c-.485,2.617-4.855,5.243-5.826,5.8-.971-.555-5.34-3.181-5.826-5.8a3.953,3.953,0,0,1,.185-2.178,3.071,3.071,0,0,1,2.78-2.023,2.761,2.761,0,0,1,.307.018,3.531,3.531,0,0,1,2.246,1.34.4.4,0,0,0,.615,0,3.339,3.339,0,0,1,2.738-1.353l-.144.13a3.675,3.675,0,0,0-1.183,3.265l.058.4a1.529,1.529,0,0,0,2.106,1.2l1.946-.811Z" transform="translate(505.671 -461.136)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                                 </g>
                              </g>
                           </svg>
                           <span>تبرع الآن</span>
                        </a>
                     </li>
                     <li class="list-inline-item">
                        <a href="{{route('help')}}" class="button">
                           <svg xmlns="http://www.w3.org/2000/svg" width="30.89" height="32.866" viewBox="0 0 30.89 32.866">
                              <path id="Path_10205" data-name="Path 10205" d="M1296.015,2335.818a.481.481,0,0,0-.633,0l-2.623,2.377a.384.384,0,0,0-.132.287v.769a4.085,4.085,0,0,1-1.393,3.045l-4.27,3.871a.466.466,0,0,1-.62,0,1.246,1.246,0,0,1,0-1.887l1.121-1.017.008-.008,1.984-1.8a.381.381,0,0,0,0-.574.483.483,0,0,0-.633,0l-8.067,7.316a.97.97,0,0,1-1.276-.032.813.813,0,0,1-.282-.593.729.729,0,0,1,.247-.563l3.966-3.6a.382.382,0,0,0,0-.575.482.482,0,0,0-.634,0l-1.078.978-2.887,2.617-1.435,1.3a.9.9,0,0,1-.605.225h0a1,1,0,0,1-.67-.256.819.819,0,0,1-.282-.606.735.735,0,0,1,.247-.55l1.2-1.087.017-.014,4.323-3.92a.382.382,0,0,0,0-.574.482.482,0,0,0-.633,0l-4.323,3.92a.971.971,0,0,1-1.275-.031.826.826,0,0,1-.282-.594.733.733,0,0,1,.248-.564l.96-.871.005,0,3.356-3.044a.382.382,0,0,0,.13-.286.388.388,0,0,0-.132-.287.464.464,0,0,0-.316-.118.47.47,0,0,0-.317.119l-3.358,3.045a.969.969,0,0,1-1.274-.034.765.765,0,0,1-.035-1.156l7.693-6.975a5.171,5.171,0,0,1,3.493-1.312h.026a.475.475,0,0,0,.218,0h.237a.472.472,0,0,0,.316-.118l2.767-2.508a.379.379,0,0,0,0-.573.48.48,0,0,0-.632,0l-2.35,2.13v-9.13a2.309,2.309,0,0,0-2.438-2.146,2.634,2.634,0,0,0-1.542.486v-.133a2.308,2.308,0,0,0-2.437-2.145,2.634,2.634,0,0,0-1.542.486v-.6a2.458,2.458,0,0,0-4.875,0v1.006a2.633,2.633,0,0,0-1.542-.486,2.308,2.308,0,0,0-2.437,2.146v7.181a3.381,3.381,0,0,0-2.332-.906,1.658,1.658,0,0,0-1.731,1.569v7.927a6.866,6.866,0,0,0,2.336,5.114l.736.666v4.7a.449.449,0,0,0,.894,0v-4.869a.388.388,0,0,0-.131-.287l-.866-.785a6.1,6.1,0,0,1-2.074-4.54v-7.927a.8.8,0,0,1,.836-.759,2.234,2.234,0,0,1,2.332,2.115v3.428a.409.409,0,0,0,.3.383c.054.018,5.405,1.718,5.582,4.951l-1.473,1.336a1.526,1.526,0,0,0,.035,2.3,1.892,1.892,0,0,0,.839.439,1.489,1.489,0,0,0-.4,1.048,1.6,1.6,0,0,0,.543,1.152,1.909,1.909,0,0,0,.83.436l-.135.122a1.51,1.51,0,0,0-.509,1.124,1.584,1.584,0,0,0,.544,1.18,1.925,1.925,0,0,0,1.3.494h0a1.832,1.832,0,0,0,1.239-.462l.356-.323a1.647,1.647,0,0,0,.48.753,1.938,1.938,0,0,0,1.3.493,1.843,1.843,0,0,0,1.24-.461l3.645-3.3a2.058,2.058,0,0,0,.677,1.273,1.434,1.434,0,0,0,1.887,0l4.27-3.871a4.86,4.86,0,0,0,1.654-3.621v-.6l2.491-2.258A.379.379,0,0,0,1296.015,2335.818Zm-25.8-2.3v-12.346a1.559,1.559,0,0,1,3.085,0v7.362a.449.449,0,0,0,.894,0v-10.027a1.56,1.56,0,0,1,3.086,0v10.282a.449.449,0,0,0,.895,0v-8.026a1.559,1.559,0,0,1,3.085,0v8.026a.449.449,0,0,0,.895,0v-6.233a1.559,1.559,0,0,1,3.085,0v9.4a6.09,6.09,0,0,0-3.814,1.542l-5.426,4.92C1275.3,2335.524,1271.355,2333.929,1270.212,2333.523Z" transform="translate(-1265.255 -2316.367)" fill="#90599f"/>
                           </svg>
                           <span> طلب مساعدة</span>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                  <div class="logo text-center">
                     <a href="{{url('/')}}">
                     <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="{{ config('app.name', 'Laravel') }}" />
                     </a>
                     <div>
                        <span style="dispaly:inline-block;" class="text-muted">
                        تحت إشراف وزارة الموارد البشرية والتنمية الاجتماعية برقم 1217
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                  <div class="d-flex menu_left">
                     <ul class="list-inline ">
                        @guest
                        <li class="list-inline-item">
                           <a class="nav-link" href="{{ route('login') }}">دخول</a>
                        </li>
                        <li class="list-inline-item">
                           <a class="nav-link" href="{{ route('register') }}">تسجيل</a>
                        </li>
                        @else
                        <li class="list-inline-item">
                           <a class="nav-link" href="{{ route('profile') }}">
                           الملف الشخصى
                           </a>
                        </li>
                        <li class="list-inline-item">
                           <a class="nav-link" href="{{ route('logout') }}">
                           تسجيل خروج
                           </a>
                        </li>
                        @endguest
                     </ul>
                     <ul class=" list-inline left-links ">
                        <li class="list-inline-item">
                           <a href="https://www.snapchat.com/add/alwefaq2019" target="_blank">
                           <i class="flaticon-snapchat"></i>
                           </a>
                        </li>
                        {{--
                        <li class="list-inline-item">
                           --}}
                           {{--
                           <a href="#">
                              --}}
                              {{--
                              <svg xmlns="http://www.w3.org/2000/svg" width="35.955" height="36.128" viewBox="0 0 35.955 36.128">
                                 --}}
                                 {{--
                                 <path id="whatsapp_4_" data-name="whatsapp (4)" d="M30.966,5.25A17.906,17.906,0,0,0,2.79,26.851L.25,36.128l9.49-2.49A17.883,17.883,0,0,0,18.3,35.817H18.3A17.91,17.91,0,0,0,30.966,5.25ZM18.3,32.794H18.3a14.861,14.861,0,0,1-7.573-2.074L10.18,30.4,4.548,31.875l1.5-5.491L5.7,25.821a14.88,14.88,0,1,1,12.6,6.973ZM26.464,21.65c-.447-.224-2.647-1.306-3.057-1.455s-.708-.224-1.006.224-1.155,1.455-1.417,1.754-.522.336-.969.112a12.218,12.218,0,0,1-3.6-2.22,13.493,13.493,0,0,1-2.488-3.1c-.261-.448,0-.667.2-.913a12.653,12.653,0,0,0,1.118-1.53.823.823,0,0,0-.037-.784c-.112-.224-1.006-2.426-1.379-3.321-.363-.872-.732-.754-1.007-.768s-.559-.016-.857-.016a1.643,1.643,0,0,0-1.193.56,5.017,5.017,0,0,0-1.565,3.732,8.7,8.7,0,0,0,1.826,4.627c.224.3,3.154,4.817,7.641,6.754a25.6,25.6,0,0,0,2.55.942,6.132,6.132,0,0,0,2.817.177c.86-.129,2.646-1.082,3.019-2.127a3.738,3.738,0,0,0,.261-2.127C27.21,21.986,26.912,21.874,26.464,21.65Zm0,0" transform="translate(-0.25)" fill="#8c6f30" fill-rule="evenodd"/>
                                 --}}
                                 {{--
                              </svg>
                              --}}
                              {{--
                           </a>
                           --}}
                           {{--
                        </li>
                        --}}
                        <li class="list-inline-item">
                           <a href="https://twitter.com/alwefaq016" target="_blank">
                           <i class="flaticon-twitter"></i>
                           </a>
                        </li>
                        <li class="list-inline-item">
                           <a href="https://www.instagram.com/p/B_X0qkDj7IP/?igshid=16tfh8ye7m68e" target="_blank">
                           <i class="flaticon-instagram"></i>
                           </a>
                        </li>
                        <li class="list-inline-item">
                           <a href="https://www.youtube.com/channel/UCJFyh8gs656-yhY8UKLYxFA" target="_blank">
                           <i class="flaticon-youtube"></i>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-12">
                  <nav class="navbar navbar-expand-lg  navbar-expand-xl  navbar-expand-md navbar-light">
                     <ul class="navbar-nav ">
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/')}}"> الرئيسية</a>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               من نحن  <i class="arrow downarrow"></i> </a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\About::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\About::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               الأنظمة  <i class="arrow downarrow"></i> </a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\System::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\System::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </li>
      
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               خدمتنا  <i class="arrow downarrow"></i></a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\Service::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\Service::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/marriage-request') }}"> بوابة الوفاق    </a>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               المبادرات التنموية <i class="arrow downarrow"></i></a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\Initiative::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\Initiative::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                              
                           </div>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               البرامج والتدريب <i class="arrow downarrow"></i></a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\Program::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\Program::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                              
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('contactUs')}}">  الاتصال بنا               </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('report')}}">  الشكاوى               </a>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <i class="arrow downarrow"></i>
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              الوظائف</a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item " href="{{url('jobs-center')}}">
                                    التوظيف</a>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item " href="{{url('volunteers-center')}}">التطوع</a>
                                 </li>
                              </ul>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('administrative')}}">الهيكل الادارى   </a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <header class="d-block d-sm-none">
         <div class="container">
            <ul class=" orders list-inline">
               <li class="list-inline-item ">
                  <a href="{{route('shop')}}" class="button">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28.72" height="30.126" viewBox="0 0 28.72 30.126">
                        <defs>
                           <clipPath id="clip-path">
                              <rect width="28.72" height="30.126" fill="none"/>
                           </clipPath>
                        </defs>
                        <g id="Repeat_Grid_1" data-name="Repeat Grid 1" clip-path="url(#clip-path)">
                           <g transform="translate(-1762 -165)">
                              <path id="Path_10204" data-name="Path 10204" d="M1285.028,637.444a.4.4,0,0,0-.512-.247l-4.119,1.431a.4.4,0,0,0-.177.121l-6.393,7.646a6.5,6.5,0,0,1-2.471,1.82l-.739.308-2.72,1.133a.729.729,0,0,1-1-.568l-.057-.4a2.871,2.871,0,0,1,.925-2.553l2.087-1.878a4.347,4.347,0,0,0,1.182-1.764l.953-2.671a2.8,2.8,0,0,0-1.15-3.325c-1.691-1.064-2.838-1.455-4.583-.713l-.013,0a.406.406,0,0,0-.1.044,9.906,9.906,0,0,0-1.105.589l-3.2,2.626a2.868,2.868,0,0,0-1,2.712l.5,2.846a3.779,3.779,0,0,0-2.849,1.542l-1.3-6.318a2.671,2.671,0,0,1,.463-2.117l5.8-7.905a3.413,3.413,0,0,1,2.5-1.39l14.127-.642,2.861-.847a.4.4,0,1,0-.228-.77l-2.764.831-14.042.627a4.224,4.224,0,0,0-3.1,1.717l-5.8,7.905a3.479,3.479,0,0,0-.6,2.754l1.492,7.257a4.779,4.779,0,0,0-.186,2.5c.614,3.31,6.19,6.339,6.427,6.466a.4.4,0,0,0,.381,0c.236-.127,5.813-3.156,6.427-6.466a4.974,4.974,0,0,0,.068-.518l.655-.273a7.312,7.312,0,0,0,2.779-2.046l6.321-7.56,4.014-1.4A.4.4,0,0,0,1285.028,637.444Zm-19.526-.373c.206-.125.4-.236.587-.333a10.264,10.264,0,0,1,.219,4.214,2.789,2.789,0,0,1-1.6,2.011c-.077-2.023-.353-4.187-.446-4.875Zm-.782,6.75a3.568,3.568,0,0,0,2.371-2.69,11.143,11.143,0,0,0-.254-4.725c1.335-.479,2.205-.092,3.569.768a2,2,0,0,1,.822,2.375l-.953,2.671a3.523,3.523,0,0,1-.962,1.437l-1.185,1.065a3.861,3.861,0,0,0-3.8,1.18c-.067-.068-.136-.133-.205-.2A3.732,3.732,0,0,0,1264.72,643.821Zm-2.372-4.157,1.184-.973c.131,1.042.356,3.057.39,4.83a3.016,3.016,0,0,1-.438,1.695,3.882,3.882,0,0,0-1.32-.547l-.54-3.055A2.061,2.061,0,0,1,1262.348,639.664Zm7.8,9.938c-.485,2.617-4.855,5.243-5.826,5.8-.971-.555-5.34-3.181-5.826-5.8a3.953,3.953,0,0,1,.185-2.178,3.071,3.071,0,0,1,2.78-2.023,2.761,2.761,0,0,1,.307.018,3.531,3.531,0,0,1,2.246,1.34.4.4,0,0,0,.615,0,3.339,3.339,0,0,1,2.738-1.353l-.144.13a3.675,3.675,0,0,0-1.183,3.265l.058.4a1.529,1.529,0,0,0,2.106,1.2l1.946-.811Z" transform="translate(505.671 -461.136)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                           </g>
                        </g>
                     </svg>
                     <span>تبرع الآن</span>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a href="{{route('help')}}" class="button">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30.89" height="32.866" viewBox="0 0 30.89 32.866">
                        <path id="Path_10205" data-name="Path 10205" d="M1296.015,2335.818a.481.481,0,0,0-.633,0l-2.623,2.377a.384.384,0,0,0-.132.287v.769a4.085,4.085,0,0,1-1.393,3.045l-4.27,3.871a.466.466,0,0,1-.62,0,1.246,1.246,0,0,1,0-1.887l1.121-1.017.008-.008,1.984-1.8a.381.381,0,0,0,0-.574.483.483,0,0,0-.633,0l-8.067,7.316a.97.97,0,0,1-1.276-.032.813.813,0,0,1-.282-.593.729.729,0,0,1,.247-.563l3.966-3.6a.382.382,0,0,0,0-.575.482.482,0,0,0-.634,0l-1.078.978-2.887,2.617-1.435,1.3a.9.9,0,0,1-.605.225h0a1,1,0,0,1-.67-.256.819.819,0,0,1-.282-.606.735.735,0,0,1,.247-.55l1.2-1.087.017-.014,4.323-3.92a.382.382,0,0,0,0-.574.482.482,0,0,0-.633,0l-4.323,3.92a.971.971,0,0,1-1.275-.031.826.826,0,0,1-.282-.594.733.733,0,0,1,.248-.564l.96-.871.005,0,3.356-3.044a.382.382,0,0,0,.13-.286.388.388,0,0,0-.132-.287.464.464,0,0,0-.316-.118.47.47,0,0,0-.317.119l-3.358,3.045a.969.969,0,0,1-1.274-.034.765.765,0,0,1-.035-1.156l7.693-6.975a5.171,5.171,0,0,1,3.493-1.312h.026a.475.475,0,0,0,.218,0h.237a.472.472,0,0,0,.316-.118l2.767-2.508a.379.379,0,0,0,0-.573.48.48,0,0,0-.632,0l-2.35,2.13v-9.13a2.309,2.309,0,0,0-2.438-2.146,2.634,2.634,0,0,0-1.542.486v-.133a2.308,2.308,0,0,0-2.437-2.145,2.634,2.634,0,0,0-1.542.486v-.6a2.458,2.458,0,0,0-4.875,0v1.006a2.633,2.633,0,0,0-1.542-.486,2.308,2.308,0,0,0-2.437,2.146v7.181a3.381,3.381,0,0,0-2.332-.906,1.658,1.658,0,0,0-1.731,1.569v7.927a6.866,6.866,0,0,0,2.336,5.114l.736.666v4.7a.449.449,0,0,0,.894,0v-4.869a.388.388,0,0,0-.131-.287l-.866-.785a6.1,6.1,0,0,1-2.074-4.54v-7.927a.8.8,0,0,1,.836-.759,2.234,2.234,0,0,1,2.332,2.115v3.428a.409.409,0,0,0,.3.383c.054.018,5.405,1.718,5.582,4.951l-1.473,1.336a1.526,1.526,0,0,0,.035,2.3,1.892,1.892,0,0,0,.839.439,1.489,1.489,0,0,0-.4,1.048,1.6,1.6,0,0,0,.543,1.152,1.909,1.909,0,0,0,.83.436l-.135.122a1.51,1.51,0,0,0-.509,1.124,1.584,1.584,0,0,0,.544,1.18,1.925,1.925,0,0,0,1.3.494h0a1.832,1.832,0,0,0,1.239-.462l.356-.323a1.647,1.647,0,0,0,.48.753,1.938,1.938,0,0,0,1.3.493,1.843,1.843,0,0,0,1.24-.461l3.645-3.3a2.058,2.058,0,0,0,.677,1.273,1.434,1.434,0,0,0,1.887,0l4.27-3.871a4.86,4.86,0,0,0,1.654-3.621v-.6l2.491-2.258A.379.379,0,0,0,1296.015,2335.818Zm-25.8-2.3v-12.346a1.559,1.559,0,0,1,3.085,0v7.362a.449.449,0,0,0,.894,0v-10.027a1.56,1.56,0,0,1,3.086,0v10.282a.449.449,0,0,0,.895,0v-8.026a1.559,1.559,0,0,1,3.085,0v8.026a.449.449,0,0,0,.895,0v-6.233a1.559,1.559,0,0,1,3.085,0v9.4a6.09,6.09,0,0,0-3.814,1.542l-5.426,4.92C1275.3,2335.524,1271.355,2333.929,1270.212,2333.523Z" transform="translate(-1265.255 -2316.367)" fill="#90599f"/>
                     </svg>
                     <span> طلب مساعدة</span>
                  </a>
               </li>
            </ul>
            <div class="d-flex menu_left">
               <ul class="list-inline ">
                  @guest
                  <li class="list-inline-item">
                     <a class="nav-link" href="{{ route('login') }}">دخول</a>
                  </li>
                  <li class="list-inline-item">
                     <a class="nav-link" href="{{ route('register') }}">تسجيل</a>
                  </li>
                  @else
                  <li class="list-inline-item">
                     <a class="nav-link" href="{{ route('profile') }}">
                     الملف الشخصى
                     </a>
                  </li>
                  <li class="list-inline-item">
                     <a class="nav-link" href="{{ route('logout') }}">
                     تسجيل خروج
                     </a>
                  </li>
                  @endguest
               </ul>
               <ul class=" list-inline left-links ">
                  <li class="list-inline-item">
                     <a href="https://www.snapchat.com/add/alwefaq2019" target="_blank">
                     <i class="flaticon-snapchat"></i>
                     </a>
                  </li>
                  {{--
                  <li class="list-inline-item">
                     --}}
                     {{--
                     <a href="#">
                        --}}
                        {{--
                        <svg xmlns="http://www.w3.org/2000/svg" width="35.955" height="36.128" viewBox="0 0 35.955 36.128">
                           --}}
                           {{--
                           <path id="whatsapp_4_" data-name="whatsapp (4)" d="M30.966,5.25A17.906,17.906,0,0,0,2.79,26.851L.25,36.128l9.49-2.49A17.883,17.883,0,0,0,18.3,35.817H18.3A17.91,17.91,0,0,0,30.966,5.25ZM18.3,32.794H18.3a14.861,14.861,0,0,1-7.573-2.074L10.18,30.4,4.548,31.875l1.5-5.491L5.7,25.821a14.88,14.88,0,1,1,12.6,6.973ZM26.464,21.65c-.447-.224-2.647-1.306-3.057-1.455s-.708-.224-1.006.224-1.155,1.455-1.417,1.754-.522.336-.969.112a12.218,12.218,0,0,1-3.6-2.22,13.493,13.493,0,0,1-2.488-3.1c-.261-.448,0-.667.2-.913a12.653,12.653,0,0,0,1.118-1.53.823.823,0,0,0-.037-.784c-.112-.224-1.006-2.426-1.379-3.321-.363-.872-.732-.754-1.007-.768s-.559-.016-.857-.016a1.643,1.643,0,0,0-1.193.56,5.017,5.017,0,0,0-1.565,3.732,8.7,8.7,0,0,0,1.826,4.627c.224.3,3.154,4.817,7.641,6.754a25.6,25.6,0,0,0,2.55.942,6.132,6.132,0,0,0,2.817.177c.86-.129,2.646-1.082,3.019-2.127a3.738,3.738,0,0,0,.261-2.127C27.21,21.986,26.912,21.874,26.464,21.65Zm0,0" transform="translate(-0.25)" fill="#8c6f30" fill-rule="evenodd"/>
                           --}}
                           {{--
                        </svg>
                        --}}
                        {{--
                     </a>
                     --}}
                     {{--
                  </li>
                  --}}
                  <li class="list-inline-item">
                     <a href="https://twitter.com/alwefaq016" target="_blank">
                     <i class="flaticon-twitter"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">
                     <a href="https://www.instagram.com/p/B_X0qkDj7IP/?igshid=16tfh8ye7m68e" target="_blank">
                     <i class="flaticon-instagram"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">
                     <a href="https://www.youtube.com/channel/UCJFyh8gs656-yhY8UKLYxFA" target="_blank">
                     <i class="flaticon-youtube"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <nav class="nav_mob">
            <div class="menubar">
               <a href="index.html">
               <img src="images/logo.png" class="img-fluid" alt="جمعية الوفاق" />
               </a>
               <div class="icons">
                  <i class="icon-menu"><span></span></i>
               </div>
            </div>
              <ul class="menu ">
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/')}}"> الرئيسية</a>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               من نحن  <i class="arrow downarrow"></i> </a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\About::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\About::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               الأنظمة  <i class="arrow downarrow"></i> </a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\System::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\System::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </li>
      
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               خدمتنا  <i class="arrow downarrow"></i></a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\Service::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\Service::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('/marriage-request') }}"> بوابة الوفاق    </a>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               المبادرات التنموية <i class="arrow downarrow"></i></a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\Initiative::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\Initiative::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                              
                           </div>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               البرامج والتدريب <i class="arrow downarrow"></i></a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 @foreach(App\Models\Program::where("parent","0")->get() as  $system)
                                 <li class="dropdown"> 
                                                                         @php $childs = App\Models\Program::where("parent",$system->id)->get() @endphp

                                  <a class="dropdown-item dropdown-toggle"  href="{{$system->url}}"  >{{$system->title}} @if(count($childs) > 0) <i class="fas fa-angle-left float-left"></i> @endif</a>
                                  
                                        @if(count($childs) > 0)
                                        
                                           <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLinkk">
                                               @foreach($childs as $child)
                                             <li class="dropdown-submenu">
                                                <a class="dropdown-item " href="{{$child->url}}">{{$child->title}}</a>
                                             </li>
                                             @endforeach
                                      </ul>
                                      @endif
                                 </li>
                                 @endforeach
                              </ul>
                              
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('contactUs')}}">  الاتصال بنا               </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('report')}}">  الشكاوى               </a>
                        </li>
                        <li class="nav-item">
                           <div class="dropdown">
                              <i class="arrow downarrow"></i>
                              <a class="nav-link  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              الوظائف</a>
                              <ul class="dropdown-menu test" aria-labelledby="dropdownMenuLink">
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item " href="{{url('jobs-center')}}">
                                    التوظيف</a>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item " href="{{url('volunteers-center')}}">التطوع</a>
                                 </li>
                              </ul>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{route('administrative')}}">الهيكل الادارى   </a>
                        </li>
                     </ul>
         </nav>
      </header>
      <main class="py-4">
         @yield('content')
      </main>
      <!-- <div class="tweets"> <a class="twitter-timeline" href="https://twitter.com/https://twitter.com/alwefaq016">Tweets by TwitterDev</a>
         <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
         <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
         </div> -->
      <!-- Footer -->
      <footer>
         <div class="container-fluid">
            <h2>روابط</h2>
            <div class="row ">
               <!-- <div class="col-md-12 "> -->
               <div class="col-md-6 links" style="display:inline-block;">
                  <ul >
                     @foreach(App\Models\Footer::get() as $footer)
                     <li>
                        <a href="{{$footer->url}}">{{$footer->title}}</a>
                     </li>
                     @endforeach
                  </ul>
                  {{--                  
                  <ul >
                     --}}
                     {{--                     
                     <li >--}}
                        {{--                        <a href="{{ url('/marriage-request') }}"> بوابة الوفاق    </a>--}}
                        {{--                     
                     </li>
                     --}}
                     {{--                     
                     <li><a href="{{ url('media-albums')}}">معرض الصور</a></li>
                     --}}
                     {{--                  
                  </ul>
                  --}}
                  {{--                  
                  <ul >
                     --}}
                     {{--                     
                     <li >--}}
                        {{--                        <a  href="{{route('page','programs-and-training')}}"> البرامج والتدريب      </a>--}}
                        {{--                     
                     </li>
                     --}}
                     {{--                     
                     <li>--}}
                        {{--                        <a href="{{route('contactUs')}}">  الاتصال بنا               </a>--}}
                        {{--                     
                     </li>
                     --}}
                     {{--                  
                  </ul>
                  --}}
                  {{--                  
                  <ul >
                     --}}
                     {{--                     
                     <li>--}}
                        {{--                        <a href="{{route('page','systems')}}"> الأنظمة          </a>--}}
                        {{--                     
                     </li>
                     --}}
                     {{--                     
                     <li >--}}
                        {{--                        <a  href="{{route('shop')}}"> المتجر              </a>--}}
                        {{--                     
                     </li>
                     --}}
                     {{--                  
                  </ul>
                  --}}
                  {{--                  
                  <ul >
                     --}}
                     {{--                     
                     <li><a href="{{ url('media-videos')}}">معرض الفيديوهات</a></li>
                     --}}
                     {{--                     
                     <li >--}}
                        {{--                        <a  href="{{url('jobs-center')}}">الوظائف   </a>--}}
                        {{--                     
                     </li>
                     --}}
                     {{--                  
                  </ul>
                  --}}
                  {{--                  
                  <ul >
                     --}}
                     {{--                     
                     <li>--}}
                        {{--                        <a  href="{{route('page','development-initiatives')}}"> المبادرات التنموية              </a>--}}
                        {{--                     
                     </li>
                     --}}
                     {{--                     
                     <li>--}}
                        {{--                        <a href="{{url('services-center')}}"> خدماتنا الإلكترونية </a>--}}
                        {{--                     
                     </li>
                     --}}
                     {{--                  
                  </ul>
                  --}}
               </div>
               <!-- <ul class="tweets" style="width:180px;"> -->
               <div class="col-md-6 tweets" >
                  <a class="twitter-timeline" href="https://twitter.com/https://twitter.com/alwefaq016">Tweets by TwitterDev</a>
                  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                  <!-- </li> -->
               </div>
               <!-- </ul> -->
               <!-- </div> -->
               {{--
               <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12 newsletter">
                  --}}
                  {{--
                  <div class="text">
                     --}}
                     {{--
                     <h2>النشرة البريدية</h2>
                     --}}
                     {{--
                     <p data-aos="fade-left" data-aos-duration="2000">    أشترك لمتابعة النصائح والأخبار الدورية </p>
                     --}}
                     {{--
                     <form action="" method="" class="justify-content-between d-flex">
                        --}}
                        {{--
                        <div class="form-group">--}}
                           {{--                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكتروني">--}}
                           {{--
                        </div>
                        --}}
                        {{--                        <button type="submit" class="btn btn-primary">اشترك</button>--}}
                        {{--
                     </form>
                     --}}
                     {{--
                  </div>
                  --}}
                  {{--
               </div>
               --}}
               <div class=" col-12 down ">
                  <div class="d-flex">
                     <ul class="list-inline social">
                        <li class="list-inline-item">
                           <a href="https://www.snapchat.com/add/alwefaq2019" target="_blank">
                           <i class="flaticon-snapchat"></i>
                           </a>
                        </li>
                        <li class="list-inline-item">
                           <a href="https://twitter.com/alwefaq016">
                           <i class="flaticon-twitter"></i>
                           </a>
                        </li>
                        <li class="list-inline-item">
                           <a href="https://www.instagram.com/p/B_X0qkDj7IP/?igshid=16tfh8ye7m68e">
                           <i class="flaticon-instagram"></i>
                           </a>
                        </li>
                        <li class="list-inline-item">
                           <a href="https://www.youtube.com/channel/UCJFyh8gs656-yhY8UKLYxFA" target="_blank">
                           <i class="flaticon-youtube"></i>
                           </a>
                        </li>
                     </ul>
                     <h4 class="text-muted">تحت إشراف وزارة الموارد البشرية والتنمية الاجتماعية برقم 1217</h4>
                     <div class="logo ">
                        <a href="{{url('/')}}">
                        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="جمعية الوفاق" />
                        </a>
                     </div>
                     <div class="logo  rowaad">
                        <a href="https://www.rh.net.sa/" data-toggle="tooltip" data-original-title="تصميم وتنفيذ">
                           <svg xmlns="http://www.w3.org/2000/svg" width="85.379" height="59.78" viewBox="0 0 85.379 59.78">
                              <g id="Group_552" data-name="Group 552" transform="translate(-469.94 -693.78)">
                                 <path id="Path_34" data-name="Path 34" d="M644.36,743.077l9.062-5.8v-43.5l-9.062,9.062Z" transform="translate(-143.413)" fill="#c3a9c9"/>
                                 <path id="Path_35" data-name="Path 35" d="M469.94,837.785,479,846.847h12.943l-5.263,5.263-.053-.053H475.106l-1.646-1.646-.435.366,10.342,10.341h12.324V849.738l-11.614-11.953Z" transform="translate(0 -118.405)" fill="#c3a9c9"/>
                                 <path id="Path_36" data-name="Path 36" d="M877.764,784.4v30.172l-4.642,4.642,1.4,1.4.517-.517,0,0,11.78-11.781V775.34Z" transform="translate(-331.507 -67.061)" fill="#c3a9c9"/>
                                 <path id="Path_37" data-name="Path 37" d="M725.574,777.542v34.225h.968l14-10.762-.221.221V816.9l-4.123,4.123,1.006,1.006.4.4,11.781-11.781V784.582l-22.836-6.8Zm.968,25.163V787.6l13.774,6.042Z" transform="translate(-210.189 -68.871)" fill="#c3a9c9"/>
                              </g>
                           </svg>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <script src="{{ asset('js/jquery/jquery-3.4.1.min.js') }}"></script>
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
      <script src="https://s.cdpn.io/42883/jquery.sharrre-1.3.4.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
      <script src="{{ asset('js/jquery.steps.min.js') }}"></script>
      <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
      <script src="{{ asset('js/jquery.basictable.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
      <script src="{{ asset('js/dropdown-date.js') }}"></script>
      <script src="{{ asset('js/plugins.js') }}?v=4"></script>
      <!-- GetButton.io widget -->
      <script type="text/javascript">
         $(document).ready(function () {

             var options = {
                 nextButton: true,
                 prevButton: true,
                 animateStartingFrameIn: true,
                 autoPlayDelay: 3000,
                 preloader: true,
                 pauseOnHover: false,
                 preloadTheseFrames: [1],
                 // preloadTheseImages: ["images/tn-model1.png", "images/tn-model2.png", "images/tn-model3.png"],
             };
             var sequence = $("#sequence").sequence(options).data("sequence");
             sequence.afterLoaded = function () {
                 $("#sequence-theme .nav").fadeIn(100);
                 $("#sequence-theme .nav li:nth-child(" + sequence.settings.startingFrameID + ") img").addClass("active");
             };
             sequence.beforeNextFrameAnimatesIn = function () {
                 $("#sequence-theme .nav li:not(:nth-child(" + sequence.nextFrameID + ")) img").removeClass("active");
                 $("#sequence-theme .nav li:nth-child(" + sequence.nextFrameID + ") img").addClass("active");
             };
             $("#sequence-theme").on("click", ".nav li", function () {
                 $(this).children("img").removeClass("active").children("img").addClass("active");
                 sequence.nextFrameID = $(this).index() + 1;
                 sequence.goTo(sequence.nextFrameID);
             });
         });
      
     
           jQuery(function () {
                   jQuery('[data-toggle="tooltip"]').tooltip()
                 });
             (function () {
                 var options = {
                     whatsapp: "966 564292025", // WhatsApp number
                     call_to_action: "", // Call to action
                     position: "right", // Position may be 'right' or 'left'
                 };
                 var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                 var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                 s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                 var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
             })();
      </script>
      <!-- /GetButton.io widget -->
      @yield('customScripts')
   </body>
</html>