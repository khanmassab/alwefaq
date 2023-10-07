@extends('layouts.app')
@section('content')

    <div class="single__  ">
        <div class="container-fluid">
            <div class="main-image text-center">
                <video width="350" height="300" controls>
                    <source src="{{ $video->video }}">
                </video>
            </div>
            <div class="content">
                <div class="title_page">
                    <h2> {{$video->name}}</h2>
                    <div class="flex_">
                        <p class="date"><i class="fa fa-calendar"></i>{{ date('Y-m-d', strtotime($video->created_at)) }}</p>
                        <p><i class="fa fa-eye"></i>0 </p>
                    </div>
{{--                    <div>--}}
{{--                        {!! $new->content !!}--}}
{{--                    </div>--}}
                </div>
            </div>
            <!-- #comments -->
        </div>
    </div>
@endsection
