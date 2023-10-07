
    @extends('layouts.app')
    @section('content')

    <section class="media media_news">
    <div class="container">
      <div id="albms-slider" class="swiper-container">
         <div class="swiper-wrapper">
         @foreach($albums as $album)
            <div class="swiper-slide">
               <div class="item">
                  <div class="date">
                     <span>{{ date('Y-m-d', strtotime($album->created_at)) }}</span>
                  </div>
                  <div class="image">
                     <img src="{{$album->imageAlbum}}" alt="" class="img-fluid" />
                  </div>
                  <div class="caption">
                     <h4> <a href="{{ url('media-albums/images/' . $album->id)}}"> {{$album->name}}</a> </h4>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
</div>
   </section>

@endsection
