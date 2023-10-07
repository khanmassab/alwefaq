@extends('layouts.app')

@section('content')

<div class="container">
             <section class="media media_news page_job">
               <div id="news-slider2">
                  <div class="swiper-wrapper">
                      @foreach($initiatives as $initiative)
                     <div class="swiper-slide card cardd">
                        <div class="item">
                            <div class="date">
                                <span>{{ date('Y-m-d', strtotime($initiative->created_at)) }}</span>
                            </div>
                              <div class="caption">
                                  <h4> <a target="_blank" href="{{ $initiative->url }}"> {{$initiative->title}}</a> </h4>
                              </div>
                        </div>
                     </div>
                      @endforeach
                     </div>
                  </div>
         </section>
</div>
@endsection
