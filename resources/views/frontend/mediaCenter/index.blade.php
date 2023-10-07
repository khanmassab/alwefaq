@extends('layouts.app')

@section('content')

    <div class="container">
                <section class="media  media_page">

                        <div class="row"> 
                            @foreach($images as $image)
                               <div class="col-sm">
                               <a href="{{$image->image}}"  data-fancybox class="gallery">

                                    <div class="item"> 
                                       <img src="{{$image->image}}" alt="" style="width:250px;"/>
                                        </div> 
                                        </a>               

                                     </div>
                            @endforeach 
                         </div>


                </section>

            </div> 
     
@endsection
