<div class="form-group">
   {!! Form::label('name', 'Category name: ') !!}
   {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') ]) !!}
   @error('name') 
      <div class="invalid-feedback">{{$message}}</div>
   @enderror 
</div>

<div class="form-group">
   {!! Form::label('slug', 'Category slug: ') !!}
   {!! Form::text('slug', null, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : '')]) !!}
   @error('slug') 
      <div class="invalid-feedback">{{$message}}</div>
   @enderror 
</div>

<div class="form-group">
   {!! Form::label('description', 'Category description: ') !!}
   {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

{{-- <div class="form-group">
   {!! Form::label('imgUpload', 'Category Image: ') !!}
   {!! Form::file('imgUpload', ['class' => 'form-control']) !!}
</div> --}}

<div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
   {{-- name="img"   используем в контроллере категории  $request->img --}}
   <input id="thumbnail" 
          class="form-control" 
          type="text" 
          name="img" 
          value="@isset($category) {{$category->img}} @endisset">
 </div>
 <div id="holder" style="margin-top:15px;max-height:100px;">
   @isset($category)
       <img src="{{$category->img}}" alt="image" style="max-height:100px;">
   @endisset
</div>

 <button class="btn btn-primary">Save</button>