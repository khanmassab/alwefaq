@extends('layouts.app')

@section('content')

<div class="container-fluid">
        <!-- <div class="col-md-12"> -->

             <section class="media  search_page">
             <div class="row">

               <!-- <div id="search-slider2" class="swiper-container">
                  <div class="swiper-wrapper"> -->
                      @if(!$news->count())
                          <h2>لا يوجد نتائج</h2>
                      @endif
                          @foreach($news as $new)
                        <div class="col-sm-4">

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
                        </div>
                          @endforeach

                     <!-- </div>
                  </div> -->
                  </div>

         </section>

        <!-- </div> -->
</div>
@endsection
