@extends('layouts.app')
@section('content')

    <div class="global-page">
    <div class="container">
        <div class="title">
           <h2>{{$data->title}}</h2>
        </div>
            <p>{!! $data->content !!}</p>

    </div>
    </div>

  
@endsection
