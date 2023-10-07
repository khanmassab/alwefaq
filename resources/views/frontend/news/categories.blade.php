@extends('layouts.app')

@section('content')


    <div class="container">

                <section class="media media_news" >

                <div id="news-slider" class="swiper-container">
                  <div class="swiper-wrapper">
                          @foreach($categories as $category)
                                <div class="swiper-slide" >
                                    <div class="item">
                                        <div class="date">
                                            <span>{{ date('Y-m-d', strtotime($category->created_at)) }}</span>
                                        </div>
                                        <div class="image">
                                                <img src="{{$category->image}}" alt="" class="img-fluid" />
                                        </div>
                                        <div class="caption" >
                                            <h4> <a href="{{ url('news-center/news/' . $category->id)}}"> {{$category->name}}</a> </h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
</div>
                    </div>
                </section>

    </div>
@endsection
