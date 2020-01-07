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

 <!-- validation errors -->

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          <br /> 
      @endif


  <div class="card-body">
   
      <form method="post" action="{{ route('chalets.update', $chaletData->id) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">
               <label for="name">Chaletnaam </label>
              <input type="text" class="form-control" name="name" value="{{ $chaletData->name }}" />
          </div>
          <div class="form-group">
              <label for="description">Beschrijving</label>
              <textarea class="form-control" name="description">{{ $chaletData->description }}</textarea>
          </div>
          <div class="form-group">
              <label for="prijs">Prijs</label>
              <input type="number" min="0" step="any" class="form-control" name="price" value="{{ $chaletData->price }}" />
          </div>
          <div class="form-group">
              <label for="land">Land</label>
              <input type="text" class="form-control" name="country" value="{{ $chaletData->country }}" />
          </div> 
          <div class="form-group">
              <label for="huisnummer">Huisnummer</label>
              <input type="text" class="form-control" name="housenr" value="{{ $chaletData->housenr }}" />
          </div> 
          <div class="form-group">
              <label for="toevoeging">Toevoeging</label>
              <input type="text" class="form-control" name="addition" value="{{ $chaletData->addition }}" />
          </div> 
          <div class="form-group">
              <label for="straat">Straat</label>
              <input type="text" class="form-control" name="street" value="{{ $chaletData->street }}" />
          </div> 
          <div class="form-group">
              <label for="place">Plaats</label>
              <input type="text" class="form-control" name="place" value="{{ $chaletData->place }}" />
          </div>
          <div class="form-group">
              <label for="photo1">Foto 1</label>
              <input type="file" class="form-control" name="photo1" value="{{ old('photo1') }}"/>
          </div>
          <div class="form-group">
              <label for="photo2">Foto 2</label>
              <input type="file" class="form-control" name="photo2" value="{{ old('photo2') }}"/>
          </div>
          <div class="form-group">
              <label for="photo3">Foto 3</label>
              <input type="file" class="form-control" name="photo3" value="{{ old('photo3') }}"/>
          </div>
          <div class="form-group">
              <label for="photo4">Foto 4</label>
              <input type="file" class="form-control" name="photo4" value="{{ old('photo4') }}"/>
          </div>            
          <button  onclick="checkSubmit(this)" type="button" class="btn btn-primary">Opslaan</button>
      </form>
  </div>
</div>  

@endsection
