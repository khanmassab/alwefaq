@extends('layouts.app')
@section('content')

      <div class="single__  " align="center">
         <div class="container-fluid">
            <div class="content">
               <div class="title_page">
                  <h2> {{$initiative->title}}</h2>
                  <div class="flex_">
                      <p class="text-muted" ><i class="fa fa-calendar"></i>{{ date('Y-m-d', strtotime($initiative->created_at)) }}</p>
                  </div>
                    <a href="{{$initiative->url}}" target="_blank">اضغط هنا لعرض الملف</a>
               </div>
            </div>
            <!-- #comments -->
         </div>
      </div>
@endsection
