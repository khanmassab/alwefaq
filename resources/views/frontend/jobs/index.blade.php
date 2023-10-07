<!-- @section('styles') -->
<!--  -->
<!-- @endsection -->
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/jobs.css') }}" >

<div class="page_job">
    <div class="container">
         @if(Session::get('success', false))
        <h3>
            {{  Session::get('success') }}
        </h3>
        @endif
    <div class="row">
     @foreach($jobs as $job)
     <div class="col-xl-3 col-lg-3 col-md-3 col-6">
        <div class="card">
                        <h2 class="mb-0">
                        <a href="{{url('jobs-center/job/' . $job->id)}}">{{$job->name}}</a>

                        </h2>
            <br>
            <h3 class="text-muted">تم الرفع في : {{ date('Y-m-d', strtotime($job->created_at)) }}</h3>

                    </div>


     </div>
      @endforeach
      </div>
</div>

</div>

@endsection
