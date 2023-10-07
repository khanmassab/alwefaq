@extends('layouts.app')
@section('content')

      <div class="single__  " align="center">
         <div class="container-fluid">
{{--            <div class="main-image text-center">--}}
{{--               <a href="{{$system->image}}" data-fancybox class="gallery">--}}
{{--               <img src="{{$system->image}}" alt="" class="img-fluid" />--}}
{{--               </a>--}}
{{--            </div>--}}
            <div class="content">
               <div class="title_page">
                  <h2> {{$system->title}}</h2>
                  <div class="flex_">
                      <p class="text-muted" ><i class="fa fa-calendar"></i>{{ date('Y-m-d', strtotime($system->created_at)) }}</p>
                  </div>
{{--                  <div>--}}
{{--                      <h3 class="text-muted">--}}
{{--                    {!! $system->content !!}--}}
{{--                      </h3>--}}
{{--                   </div>--}}
                    <a href="{{$system->url}}" target="_blank">اضغط هنا لعرض الملف</a>
               </div>
            </div>
            <!-- #comments -->
         </div>
      </div>
@endsection
