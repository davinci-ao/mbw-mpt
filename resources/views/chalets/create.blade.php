@extends('templates.layout')

@section('content')      
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Voeg een Chalet toe
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
      <form method="post" action="{{ route('chalets.store') }}">
          <div class="form-group">
              @csrf
               <label for="name">Chaletnaam</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="description">Beschrijving</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="prijs">prijs</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="land">land</label>
              <input type="text" class="form-control" name="country"/>
          </div>
          <div class="form-group">
              <label for="huisnummer">huisnummer</label>
              <input type="text" class="form-control" name="housenr"/>
          </div>
          <div class="form-group">
              <label for="toevoeging">toevoeging</label>
              <input type="text" class="form-control" name="addition"/>
          </div> 
          <div class="form-group">
              <label for="straat">straat</label>
              <input type="text" class="form-control" name="street"/>
          </div>
          <div class="form-group">
              <label for="plaats">plaats</label>
              <input type="text" class="form-control" name="place"/>
          </div>                                                      
          <button onclick="checkSubmit(this)" type="button" class="btn btn-primary">Voeg toe</button>
      </form>
  </div>
</div>

@endsection