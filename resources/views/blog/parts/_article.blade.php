<div class="cards">          
    <a href="/article/{{$article->slug}}" class="image">       
        <div><i class="far fa-comment"></i> {{ $article->reviews_count }}</div>
        <img src="{{ $article->img }}" 
            class="card-img" 
            alt="{{ $article->name }}">   
    </a>         
   <div class="card-body">
       <h5 class="card-title"><a href="/article/{{$article->slug}}">{{$article->name}}</a></h5>
       <p class="card-text">{{ strip_tags($article->description) }}</p> 
       {{-- сделать затухание текста после 2х строк для длинного описания --}}
       <p>Category: <span class="font-italic">{{ $article->category_id }}</span></p>      
       
       <a href="/article/{{ $article->slug }}" class="card-btn-full" >Read</a>
   </div>
</div>
