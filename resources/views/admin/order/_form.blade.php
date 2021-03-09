<div class="form-group">
   {!! Form::label('name', 'Name:') !!}
   {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
   @error('name') 
      <div class="invalid-feedback">{{$message}}</div>
   @enderror
</div>

<div class="form-group">
   {!! Form::label('phone', 'Phone:') !!}
   {!! Form::text('phone', null, ['class'=>'form-control' . ($errors->has('phone') ? ' is-invalid' : '')]) !!}
   @error('phone') 
      <div class="invalid-feedback">{{$message}}</div>
   @enderror
</div>

<div class="form-group">
   {!! Form::label('address', 'Address:') !!}
   {!! Form::text('address', null, ['class'=>'form-control' . ($errors->has('address') ? ' is-invalid' : '')]) !!}
   @error('address') 
      <div class="invalid-feedback">{{$message}}</div>
   @enderror
</div>

<div class="form-group">
   {!! Form::label('status', 'Status:') !!}
   {!! Form::select('status', $statuses) !!}
</div>


<button class="btn btn-primary">Save</button>