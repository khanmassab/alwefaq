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
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/font-awesome.min.css') }}">

   <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>





  <header>
    <div class="container">
      <div class="row">

        <div class="head col-xs-5 col-md-2"><a href="{{route('home')}}"><img src="{{ asset('/auth/img/logo.svg') }}" class="img-fluid" alt=" " /></a> </div>



        <div class="head head-left col-xs-7 col-md-3">
            <div class="list-inline-item">
                  <a href="#" data-toggle="modal" data-target="#bookModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="25.617" height="24.16" viewBox="0 0 25.617 24.16">
                          <g id="Group_492" data-name="Group 492" transform="translate(-658.214 -360.76)">
                              <path id="Path_11489" data-name="Path 11489" d="M671.813,395.306a3.242,3.242,0,1,0,3.242,3.242A3.246,3.246,0,0,0,671.813,395.306Zm1.632,3.242a1.632,1.632,0,1,1-1.632-1.632A1.634,1.634,0,0,1,673.445,398.548Z" transform="translate(-5.058 -16.87)" fill="#90599f"></path>
                              <path id="Path_11490" data-name="Path 11490" d="M683.673,366.225a.807.807,0,0,0-.642-.32H663.862l-.357-2a3.568,3.568,0,0,0-2.881-2.873l-1.417-.247a.8.8,0,1,0-.375,1.565.716.716,0,0,0,.079.015l1.437.251a1.946,1.946,0,0,1,1.571,1.573l1.944,10.96a2.989,2.989,0,0,0,2.95,2.479h11.538a3.011,3.011,0,0,0,2.866-2.13l2.581-8.556A.829.829,0,0,0,683.673,366.225Zm-1.722,1.284-2.273,7.514h0a1.39,1.39,0,0,1-1.326.986H666.82a1.365,1.365,0,0,1-1.367-1.15l-1.3-7.351Z" fill="#90599f"></path>
                              <path id="Path_11491" data-name="Path 11491" d="M694.342,395.306a3.242,3.242,0,1,0,3.241,3.242A3.245,3.245,0,0,0,694.342,395.306Zm1.632,3.242a1.632,1.632,0,1,1-1.632-1.632A1.634,1.634,0,0,1,695.974,398.548Z" transform="translate(-16.06 -16.87)" fill="#90599f"></path>
                          </g>
                      </svg> <span id="num">0</span> </a>
              </div><!--  -->

              <ul>
                <li><a href="#"><img src="{{ asset('/auth/img/user.png') }}"></a>
                  <ul>
                    <li><a href="#">الملف الشخصي</a></li>
                    <li><a href="#">اعدادت الحساب </a></li>
                    <li><a href="#"> تسجيل الخروج</a></li>
                  </ul>
                </li>
              </ul>
        </div><!-- head -->


        <div class="search">
          <form role="search" method="get" id="searchform" action="">
				<div class="input-group">
					<input type="text" required="required" value="" name="keyword" id="s" class="form-control" placeholder="ابحث هنا علي شئ"> <span class="input-group-btn">
						<button type="submit" class="btn btn-default" style="">
							<svg xmlns="http://www.w3.org/2000/svg" width="23.993" height="24" viewBox="0 0 23.993 24">
								<path id="Path_11402" data-name="Path 11402" d="M1307.79,70.776l-5.84-5.832a10.228,10.228,0,1,0-1.01,1.011l5.84,5.832a.7.7,0,0,0,.5.213.715.715,0,0,0,.51-.213A.732.732,0,0,0,1307.79,70.776Zm-22.36-12.543a8.795,8.795,0,1,1,8.8,8.8A8.808,8.808,0,0,1,1285.43,58.233Z" transform="translate(-1284 -48)" fill="#b6b6b6"></path>
							</svg>
						</button>
					</span>
				</div>
			</form>
		</div><!-- search -->



      </div><!-- row -->
    </div><!-- container -->
  </header>


      <main>
            @yield('content')
      </main>
      <p>            جميع الحقوق محفوظة © {{date('Y')}}</p>











    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('auth/js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('auth/js/owl.carousel.min.js') }}"></script>
    <script src="https://unpkg.com/jquery-dropdown-datepicker"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-dropdown-datepicker@1.3.0/dist/jquery-dropdown-datepicker.min.js"></script>

    <script src="{{ asset('auth/js/js.js') }}"></script>

   <script>
      
         $("#date").dropdownDatepicker({
         //  defaultDate: '2019-04-07',
         //  displayFormat: 'dmy',
         //  monthFormat: 'short',
            yearRange: '1950:<?= date('Y'); ?>',
            wrapperClass:'date-dropdowns',
            dropdownClass:null,
            dayLabel: 'يوم',
            minYear: 1930,
            maxYear:<?= date('Y'); ?>,
            monthLabel:	'شهر',
            yearLabel: 'سنه',
            monthLongValues: ['يناير', 'فبراير', 'مارس', 'إبريل', 'مايو', 'يونيو',  'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر	']       ,
            daySuffixValues     	: ["" ,"" ," ", ""],
            yearRange: "c-100:c+100", // last hundred years and future hundred years
         });
   </script>


  </body>
</html>
