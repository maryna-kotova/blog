<div class="form-group">  
   {!! Form::label('name', 'Product name: ') !!}
   {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}  
   @error('name') 
      <div class="invalid-feedback">{{$message}}</div>
   @enderror 
</div>

<div class="form-group">
   {!! Form::label('category_id', 'Product category: ') !!}
   {!! Form::select('category_id', $categories) !!}
</div>

<div class="form-group">
   {!! Form::label('price', 'Product price: ') !!}
   {!! Form::text('price', null, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : '')]) !!}
   @error('price') 
      <div class="invalid-feedback">{{$message}}</div>
   @enderror 
</div>

<div class="form-group">
   {!! Form::label('action_price', 'Product action price: ') !!}
   {!! Form::text('action_price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
   {!! Form::label('slug', 'Product slug: ') !!}
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
   {!! Form::label('description', 'Product description: ') !!}
   {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
   {!! Form::label('productRecommended[]', 'Recommended products: ') !!}
   {!! Form::select('productRecommended[]', $allProducts, null, ['multiple' => true, 'class' => 'form-control recommended_products']) !!}
</div>

{{-- <div class="form-group">
   {!! Form::label('imgUpload', 'Product Image: ') !!}
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
          value="@isset($product) {{$product->img}} @endisset">
 </div>
 <div id="holder" style="margin-top:15px;max-height:100px;">
   @isset($product)
      <img src="{{$product->img}}" alt="image" style="max-height:100px;">
   @endisset
</div>

 <button class="btn btn-primary">Save</button>
 