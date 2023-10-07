@extends('layouts.app')
@section('content')
<div class="container">
   <section class="media media_news">
      <div id="video-slider" class="swiper-container">
         <div class="swiper-wrapper">
            @foreach($videos as $video)
            <div class="swiper-slide">
               <div class="item">
                  <div class="date">
                     <span>{{ date('Y-m-d', strtotime($video->created_at)) }}</span>
                  </div>
                  <div class="icon">
                     <a href="{{ $video->video }}" data-type="iframe" data-fancybox class="gallery">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.5" height="37.917" viewBox="0 0 32.5 37.917">
                           <path id="play-button" d="M35.353,0l32.5,18.958-32.5,18.958Z" transform="translate(-35.353)" fill="#fff"/>
                        </svg>
                     </a>
                  </div>
                  <div class="image">
                     <img src="{{$video->image}}" alt="" class="img-fluid" />
                  </div>
                  <div class="caption">
                     <h4> {{$video->name}}</h4>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section>
</div>
@endsection
