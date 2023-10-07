@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                @if(session()->has('success'))
                   <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
        
            <div class="card">
                @foreach($requests as $request)
                    {{AppHelper::getIdNumber($request->id,'20',$request->created_at)}}
                    <h1>{{$request->shape}} <a href="{{route('marriageRequest.edit', $request->id)}}">Edit</a> <form action="{{route('marriageRequest.destroy')}}" method="post">@csrf<input type="hidden" name="id" value="{{$request->id}}"><button type="submit">Delete</button></form></h1>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
