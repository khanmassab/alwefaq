@extends('layouts.app')
@section('content')

      <div class="single__  ">
         <div class="container">
            <div class="main-image text-center">
               <a href="{{$new->image}}" data-fancybox class="gallery">
               <img src="{{$new->image}}" alt="" class="img-fluid" />
               </a>
            </div>
            <div class="content">
               <div class="title_page">
                  <h2> {{$new->title}}</h2>
                  <div class="flex_">
                     <p class="text-muted" ><i class="fa fa-calendar">
                         </i>{{ date('Y-m-d', strtotime($new->created_at)) }}
                     </p>
{{--                     <p><i class="fa fa-eye"></i>0 </p>--}}
                  </div>
                  <div>
                    {!! $new->content !!}
                   </div>
               </div>
            </div>
            <!-- #comments -->
         </div>
      </div>
@endsection
