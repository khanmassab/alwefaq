@extends('layouts.app')
@section('content')
<div class="container-fluid">
   <div class="row" >
      @foreach($administratives as $administrative)
      <div class="col-xl-3 col-lg-3 col-md-3 col-6" style="border-style: solid; border-color:#90599F; border-radius:20px;padding:15px; margin:1rem;  text-align:center;">
        <div class="item  item_administratives">
         <div class="main-image text-center">
            <img src="{{$administrative->image}}" alt="" class="img-fluid" />
         </div>
         <div class="caption">
               <p>
         {{$administrative->name}}
         </p>
         <span>
    {{$administrative->positions}}
    </span>
         </div>
       </div>
      </div>
      @endforeach
   </div>
</div>
@endsection