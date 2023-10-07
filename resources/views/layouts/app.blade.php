<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="جمعية الوفاق الاسرية">
    <meta name="og:title" content="جمعية الوفاق الاسرية"/>
    <meta name="og:description" content="جمعية الوفاق الاسرية"/>
    <meta name="keywords" content="جمعية الوفاق الاسرية" />  
    <title>جمعية الوفاق الاسرية</title>

    <!-- css -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;700;900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

  </head>
  <body>


<!-- 

    <div class="top col-xs-12">
    <div class="container">
      <div class="row">

        <div class="box col-xs-12 col-md-7">

          <a href="#"><i class="fa fa-bell-o" aria-hidden="true"><span>0</span></i></a>
          <a href="#"><i class="fa fa-envelope-open-o" aria-hidden="true"><span>0</span></i></a>

          <select>
            <option>عربي</option>
            <option>English</option>
          </select>

          <select>
            <option>SAR</option>
            <option>USD</option>
          </select>
          <a href="https://wa.me/966501234567"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        </div>


        <div class="box col-xs-12 col-md-5">
          <a href="#"><i class="fa fa-gear"></i></a>
          <form>
            <input typt="text" class="text">
            <button><i class="fa fa-search"></i> </button>
          </form>

        </div>


      </div>
    </div>   
  </div>
  
  -->





  <header>
    <div class="container">
      <div class="row">
        <div class="fa fa-bars visible-xs"> </div>
      <a href="index.html"><img alt="" class="logo" src="img/logo.png"></a>

   <ul class="menu">
      <li class="nav-item">
         <a class="p-2 d-inline-block" href="{{url('/')}}"> الرئيسية</a>
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
         <a class="p-2 d-inline-block" href="{{ url('/marriage-request') }}"> بوابة الوفاق    </a>
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
         <a class="p-2 d-inline-block" href="{{route('contactUs')}}">  الاتصال بنا               </a>
      </li>
      <li class="nav-item">
         <a class="p-2 d-inline-block" href="{{ url('report')}}">  الشكاوى               </a>
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
         <a class="p-2 d-inline-block" href="{{route('administrative')}}">الهيكل الادارى   </a>
      </li>
      <li><a class="login" href="{{ route('login') }}">تسجيل الدخول</a></li>
   </ul>

  

      </div><!-- row -->
    </div><!-- container -->
  </header>

   @yield('content')

  












  












  










  























  



 <!--<section class="contact pdf">-->
 <!--   <div class="container">-->
 <!--     <div class="row">-->

  <!-- Nav tabs -->
 <!-- <ul class="nav nav-tabs" role="tablist">-->
 <!--   <li role="presentation" class="active"><a href="#home1" aria-controls="home" role="tab" data-toggle="tab"> الاستشارات </a></li>-->
 <!--   <li role="presentation"><a href="#profile1" aria-controls="profile" role="tab" data-toggle="tab"> الاستراتيجية</a></li>-->
 <!-- </ul>-->
  
  
 <!-- <div class="tab-content">-->
 <!--     <br>-->

 <!--   <div role="tabpanel" class="tab-pane active" id="home1">-->
 <!--       <object data="file2.pdf" type="application/pdf" width="100%" height="500px"></object>-->
        
 <!--   </div>-->
 <!--   <div role="tabpanel" class="tab-pane" id="profile1"> -->
 <!--   <object data="file1.pdf" type="application/pdf" width="100%" height="500px"></object>-->
 <!--   </div>-->
 <!-- </div>-->
  



 <!--    </div>-->
 <!--   </div>-->
 <!-- </section>-->












  <footer>
    <div class="container">
      <div class="row">

        <div class="foot col-xs-12 col-md-4">
          <p>ستشعر الجمعية للدور المأمول منها وتبذل الوسع في تحقيقه بالمبادرة لابتكار حلول نوعية تخدم حاجة المستفيد بشفافية ووضوح لكافة أعمال وإجراءات الجمعية للعامل والمستفيد الذي هو محور التركيز في أعمال الجمعية.</p>
        </div><!-- foot -->



        <div class="foot col-xs-12 col-md-4">
          <div class="footer-links">
            <!-- <span class="pb-1">القانونية</span> -->
            <a href="https://drive.google.com/file/d/1z18metAxjTzqhHMRF2aynsHKFN8HUGGG/view?usp=sharing">من نحن</a>
            <a href="{{route('contactUs')}}">اتصل بنا</a>
            <a href="{{ url('media-albums')}}">معرض الصور</a>
            <a href="https://drive.google.com/file/d/1z18metAxjTzqhHMRF2aynsHKFN8HUGGG/view?usp=sharing">الشروط والأحكام  </a>
            <a href="{{ url('media-videos')}}">الفيديوهات</a>
          </div>
        </div><!-- foot -->

        <div class="foot col-xs-12 col-md-3"><img alt="" class="logo" src="img/logo2.png"></div><!-- foot -->






<a class="whatsapp" href="https://wa.me/966501234567"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>


     </div><!-- row -->  
    </div><!-- container -->  
  </footer>


          <div class="copy col-xs-12">
            © 2023 - جميع الحقوق محفوظة لجمعية  الوفاق الاسرية
          </div><!--  -->





        <div class="call">
          <a href="https://twitter.com/alwefaq016" target="_blank"><i class="fa fa-twitter"></i></a>
          <a href="https://www.instagram.com/p/B_X0qkDj7IP/?igshid=16tfh8ye7m68e" target="_blank"><i class="fa fa-instagram"></i></a>
          <a href="https://www.snapchat.com/add/alwefaq2019" target="_blank"><i class="fa fa-snapchat"></i></a>
          <a href="https://www.youtube.com/channel/UCJFyh8gs656-yhY8UKLYxFA" target="_blank"><i class="fa fa-youtube"></i></a>
        </div><!-- call -->
        







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/js.js')}}"></script>
  </body>
</html>