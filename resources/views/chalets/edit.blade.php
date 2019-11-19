@extends('templates.layout')

@section('title', 'Edit chalet')
@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    werk Chalet: {{$chaletData->name}} bij
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
              <input type="text" class="form-control" name="description" value="{{ $chaletData->description }}" />
          </div>
          <div class="form-group">
              <label for="prijs">prijs</label>
              <input type="text" class="form-control" name="price" value="{{ $chaletData->price }}" />
          </div>
          <div class="form-group">
              <label for="land">land</label>
              <input type="text" class="form-control" name="country" value="{{ $chaletData->country }}" />
          </div> 
          <div class="form-group">
              <label for="huisnummer">huisnummer</label>
              <input type="text" class="form-control" name="housenr" value="{{ $chaletData->housenr }}" />
          </div> 
          <div class="form-group">
              <label for="toevoeging">toevoeging</label>
              <input type="text" class="form-control" name="addition" value="{{ $chaletData->addition }}" />
          </div> 
          <div class="form-group">
              <label for="straat">straat</label>
              <input type="text" class="form-control" name="street" value="{{ $chaletData->street }}" />
          </div> 
          <div class="form-group">
              <label for="place">place</label>
              <input type="text" class="form-control" name="place" value="{{ $chaletData->place }}" />
          </div>           
          <button type="submit" class="btn btn-primary">opslaan</button>
      </form>
  </div>
</div>  

@endsection
