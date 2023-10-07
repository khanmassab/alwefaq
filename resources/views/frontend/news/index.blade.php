@extends('layouts.app')

@section('content')

<div class="container-fluid">
             <section class="media media_news">
               <div id="single-slider2">
                  <div class="swiper-wrapper">
                      @foreach($news as $new)
                     <div class="swiper-slide" >
                        <div class="item">
                            <div class="date">
                                <span>{{ date('Y-m-d', strtotime($new->created_at)) }}</span>
                            </div>
                              <div class="image">
                                  <a href="{{url('news-center/news/'. $new->id .'/'. $new->title)}}">
                                 <img src="{{$new->image}}" alt="" class="img-fluid" />
                                  </a>
                              </div>
                              <div class="caption">
                                  <h4> <a  href="{{url('news-center/news/'. $new->id .'/'. $new->title)}}"> {{$new->title}}</a> </h4>
                                 <p> <a  href="{{url('news-center/news/'. $new->id .'/'. $new->title)}}">{!! $new->content !!}</a> </p>
                              </div>
                        </div>
                     </div>
                      @endforeach
                     </div>
                  </div>
         </section>
</div>
@endsection
