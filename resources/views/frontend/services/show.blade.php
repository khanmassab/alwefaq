@extends('layouts.app')
@section('content')

    <div class="single__  " align="center">
        <div class="container-fluid">
            {{--            <div class="main-image text-center">--}}
            {{--               <a href="{{$service->image}}" data-fancybox class="gallery">--}}
            {{--               <img src="{{$service->image}}" alt="" class="img-fluid" />--}}
            {{--               </a>--}}
            {{--            </div>--}}
            <div class="content">
                <div class="title_page">
                    <h2> {{$service->title}}</h2>
                    <div class="flex_">
                        <p class="text-muted" ><i class="fa fa-calendar"></i>{{ date('Y-m-d', strtotime($service->created_at)) }}</p>
                    </div>
                    <a href="{{$service->url}}" target="_blank">اضغط هنا لعرض الملف</a>
                </div>
            </div>
            <!-- #comments -->
        </div>
    </div>
@endsection
