<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">

   <div class="carousel-inner">
     
    @foreach ($slider as $item)    
        <div class="carousel-item"  data-interval="2000">
          <img src="{{ $item->img }}" class="d-block w-100" alt="image">
          <div class="carousel-caption d-none d-md-block slider__content">
            <h2 class="slider__title">{{ $item->name }}</h2>
            <div class="slider__text">{{ strip_tags($item->description) }}</div>
            <button class="slider__button btn">
              <a class="slider__link" href="{{ $item->button_url }}">{{ $item->button_text }}</a>
            </button>
          </div>
        </div>
     @endforeach

   </div>

   <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
 </div>