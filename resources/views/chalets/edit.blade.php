@extends('templates.ce_layout')

@section('title', 'Edit chalet')
@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Werk chalet: {{$chaletData->name}} bij
  </div>
    <!-- success message -->

    @if ($alert = Session::get('alert'))
          <div class="alert alert-success">
              <p>{{ $alert }}</p>
          </div>
      @endif


  <div class="card-body">
   
      <form method="post" action="{{ route('chalets.update', $chaletData->id) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">
              <label for="name">Chaletnaam <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="name" value="{{ $chaletData->name }}" />
              @if ($errors->first('name'))
                <small class="smallError">{{$errors->first('name')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="description">Beschrijving <span class="starSpan">*</span></label>
              <textarea class="form-control" name="description">{{ $chaletData->description }}</textarea>
              @if ($errors->first('description'))
                <small class="smallError">{{$errors->first('description')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="prijs">Dagprijs <span class="starSpan">*</span></label>
              <input type="number" min="0" step="any" class="form-control" name="price" value="{{ $chaletData->price }}" />
              @if ($errors->first('price'))
                <small class="smallError">{{$errors->first('price')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="land">Land <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="country" value="{{ $chaletData->country }}" />
              @if ($errors->first('country'))
                <small class="smallError">{{$errors->first('country')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="huisnummer">Huisnummer <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="housenr" value="{{ $chaletData->housenr }}" />
              @if ($errors->first('housenr'))
                <small class="smallError">{{$errors->first('housenr')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="toevoeging">Toevoeging</label>
              <input type="text" class="form-control" name="addition" value="{{ $chaletData->addition }}" />
              @if ($errors->first('addition'))
                <small class="smallError">{{$errors->first('addition')}}</small>
              @endif

          </div> 
          <div class="form-group">
              <label for="straat">Straat <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="street" value="{{ $chaletData->street }}" />
              @if ($errors->first('street'))
                <small class="smallError">{{$errors->first('street')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="place">Plaats <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="place" value="{{ $chaletData->place }}" />
              @if ($errors->first('place'))
                <small class="smallError">{{$errors->first('place')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="photo1">Foto 1 <span class="starSpan">*</span></label>
              <input type="file" class="form-control" name="photo1" value="{{ old('photo1') }}"/>
              @if ($errors->first('photo1'))
                <small class="smallError">{{$errors->first('photo1')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="photo2">Foto 2 <span class="starSpan">*</span></label>
              <input type="file" class="form-control" name="photo2" value="{{ old('photo2') }}"/>
              @if ($errors->first('photo2'))
                <small class="smallError">{{$errors->first('photo2')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="photo3">Foto 3 <span class="starSpan">*</span></label>
              <input type="file" class="form-control" name="photo3" value="{{ old('photo3') }}"/>
              @if ($errors->first('photo3'))
                <small class="smallError">{{$errors->first('photo3')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="photo4">Foto 4 <span class="starSpan">*</span></label>
              <input type="file" class="form-control" name="photo4" value="{{ old('photo4') }}"/>
              @if ($errors->first('photo4'))
                <small class="smallError">{{$errors->first('photo4')}}</small>
              @endif
          </div>            
          <button  onclick="checkSubmit(this)" type="button" class="btn btn-primary">Opslaan</button>
      </form>
  </div>
</div>  

@endsection
