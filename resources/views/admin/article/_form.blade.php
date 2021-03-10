<div class="form-group">  
   {!! Form::label('name', 'Article name: ') !!}
   {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}  
   @error('name') 
      <div class="invalid-feedback">{{$message}}</div>
   @enderror 
</div>

<div class="form-group">
   {!! Form::label('category_id', 'Article category: ') !!}
   {!! Form::select('category_id', $categories) !!}
</div>

<div class="form-group">
   {!! Form::label('slug', 'Article slug: ') !!}
   {!! Form::text('slug', null, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : '')]) !!} 
   @error('slug') 
      <div class="invalid-feedback">{{$message}}</div>
   @enderror 
</div>  

<div class="form-group">
   {!! Form::label('recommended', 'Recommended: ') !!}  
   {!! Form::checkbox('recommended', '1') !!}
</div>  

<div class="form-group">
   {!! Form::label('description', 'Description: ') !!}
   {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
   {!! Form::label('articleRecommended[]', 'Recommended: ') !!}
   {!! Form::select('articleRecommended[]', $allArticles, null, ['multiple' => true, 'class' => 'form-control recommended_articles']) !!}
</div>

<div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
  
   <input id="thumbnail" 
          class="form-control" 
          type="text" 
          name="img"  
          value="@isset($article) {{$article->img}} @endisset">
 </div>
 <div id="holder" style="margin-top:15px;max-height:100px;">
   @isset($article)
      <img src="{{$article->img}}" alt="image" style="max-height:100px;">
   @endisset
</div>

 <button class="btn btn-primary">Save</button>
 