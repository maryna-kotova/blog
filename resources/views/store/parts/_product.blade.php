<div class="cards">          
    <a href="/product/{{$product->slug}}" class="image">
        {{-- <div><i class="far fa-comment"></i> {{ count($product->reviews) }}</div> --}}
        <div><i class="far fa-comment"></i> {{ $product->reviews_count }}</div>
        <img src="{{ $product->img }}" 
            class="card-img" 
            alt="{{ $product->name }}">   
    </a>         
   <div class="card-body">
       <h5 class="card-title text-center"><a href="/product/{{$product->slug}}">{{$product->name}}</a></h5>
       <p class="card-text">{{ strip_tags($product->description) }}</p> 
       {{-- сделать затухание текста после 2х строк для длинного описания --}}
       <p>Категория: <span class="font-italic">{{ $product->category_id }}</span></p>
       <p class="card-price">{{ $product->price }} грн.</p>
       
       <a href="/product/{{ $product->slug }}" class="card-btn-full" >Купить</a>
   </div>
</div>
