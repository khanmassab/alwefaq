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
      <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" >
      <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-rtl.min.css') }}" >
      <link rel="icon" href="{{asset('frontend/images/logo.png')}}" alt="icon" type="image/x-icon" sizes="40*40"/>

      <!-- swiper slider css files -->
      <link rel="stylesheet" href="{{ asset('css/swiper/swiper.min.css') }}" >
      <link rel="stylesheet" href="{{ asset('css/swiper/swiper2.min.css') }}" >
      <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}" >
      <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">



    <!-- fonts -->
      <!-- <link rel="stylesheet" href="{{ asset('fonts/Bukra/stylesheet.css') }}" >
      <link rel="stylesheet" href="{{ asset('fonts/DIN-Arabic/stylesheet.css') }}" >
      <link rel="stylesheet" href="{{ asset('fonts/loew/loew.css') }}" >
      <link rel="stylesheet" href="{{ asset('fonts/Helvetica/helvetica.css') }}"> -->
      <link rel="stylesheet" href="{{ asset('fonts/FrutigerLTArabic-67BoldCn.css') }}">

      <link rel="stylesheet" href="{{ asset('css/fontawesome/all.min.css') }}" >
      <link rel="stylesheet" href="{{ asset('css/flaticon/flaticon.css') }}">
      <!-- animation -->
      <link rel="stylesheet" href="{{ asset('css/animation/aos.css') }}">
      <!-- main stylesheet -->
      <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}" >
    <!-- <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" > -->

    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/pages-responsive.css') }}" >

</head>
<body class="page  @yield('body_class')">
      <main>
            @yield('content')
      </main>
      <div class="container-fluid">
         <div class=" have_account">
            <h2>إذا كان ليس لديك حساب معنا</h2>
            <a href="{{route('register')}}">الدخول هنا</a>
         </div>
         <div class="copyright">
            <h2>جميع الحقوق محفوظة © {{date('Y')}}</h2>
         </div>
      </div>
      <script src="{{ asset('js/jquery/jquery-3.4.1.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/swiper/swiper.min.js') }}"></script>
      <script src="{{ asset('js/swiper/swiper.jquery.js') }}"></script>
      <script src="{{ asset('js/fontawesome/all.min.js') }}"></script>
      <script src="{{ asset('js/animation/aos.js') }}"></script>
      <script src="{{ asset('js/select2/select2.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
      <script src="https://s.cdpn.io/42883/sequence.jquery-min.js"></script>
      <script src="https://s.cdpn.io/42883/jquery.ba-hashchange.min.js"></script>
      <script src="https://s.cdpn.io/42883/sequencejs-options.modern-slide-in.js"></script>
      <script src="https://s.cdpn.io/42883/jquery.sharrre-1.3.4.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
      <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
      <script src="{{ asset('js/plugins.js') }}"></script>
      <!-- <script src="{{ asset('js/dropdown-date.js') }}"></script> -->
      <script src="https://unpkg.com/jquery-dropdown-datepicker"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-dropdown-datepicker@1.3.0/dist/jquery-dropdown-datepicker.min.js"></script>

<script>
       $(document).ready( function() {

   // $( "#date" ).append( $('select.year'),$('select.month'),$('select.day') );
       })
// $(function(){
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
// });
//     $(function() {
//     $( "#date" ).datepicker({
//       changeMonth: true,
//       changeYear: true,
//       changeDay: true,
//       yearRange: "1900:2100"

//     });
//   });
//   jQuery(document).ready(function($) {
//    $( "#date" ).datepicker({
//      changeMonth: true,
//      changeYear: true
//    });});
   </script>

</body>
</html>
