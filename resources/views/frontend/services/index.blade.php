@extends('layouts.app')

@section('content')

<div class="container">
             <section class="media media_news">
               <div id="news-slider2">
                  <div class="swiper-wrapper">
                      @foreach($services as $service)
                     <div class="swiper-slide">
                        <div class="item">
                            <div class="date">
                                <span>{{ date('Y-m-d', strtotime($service->created_at)) }}</span>
                            </div>
                              <div class="image">
                                 <img src="{{$service->icon}}" alt="" class="img-fluid" />
                              </div>
                              <div class="caption">
                                  <h4> <a  href="{{url('services-center/service/'. $service->id)}}"> {{$service->title}}</a> </h4>
                                 <p> {!! $service->content !!} </p>
                              </div>
                        </div>
                     </div>
                      @endforeach
                     </div>
                  </div>
         </section>
</div>
@endsection
