@extends('templates.layout')

@section('title', 'Create chalet')
@section('content')      
<style>
  .uper {
    margin-top: 40px;
  }

  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] {
    -moz-appearance:textfield;
}
</style>
<div class="card uper">
  <div class="card-header">
    <h1>Voeg een Chalet toe</h1>
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
               <label for="name">naam</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="sel1">Vakantiepark</label>
              <select class="form-control" name="holidaypark_id" id="sel1">


                @foreach($holidayparks as $holidaypark)

                  <option value="{{ $holidaypark->id }}">{{ $holidaypark->holidaypark_name }}</option>

                @endforeach
              </select>
          </div> 

          <div class="form-group">
              <label for="description">Beschrijving</label>
              <input type="text" class="form-control" name="description" value="{{ old('description') }}"/>
          </div>
          <div class="form-group">
              <label for="prijs">prijs</label>
              <input type="number" min="0" step="any" class="form-control" name="price" value="{{ old('price') }}"/>
          </div>
          <div class="form-group">
              <label for="land">land</label>
              <input type="text" class="form-control" name="country" value="{{ old('country') }}"/>
          </div>
          <div class="form-group">
              <label for="huisnummer">huisnummer</label>
              <input type="text" class="form-control" name="housenr" value="{{ old('housenr') }}"/>
          </div>
          <div class="form-group">
              <label for="toevoeging">toevoeging</label>
              <input type="text" class="form-control" name="addition" value="{{ old('addition') }}"/>
          </div> 
          <div class="form-group">
              <label for="straat">straat</label>
              <input type="text" class="form-control" name="street" value="{{ old('street') }}"/>
          </div>
          <div class="form-group">
              <label for="plaats">plaats</label>
              <input type="text" class="form-control" name="place" value="{{ old('place') }}"/>
          </div>                                                                                                          
          <button  onclick="checkSubmit(this)" type="button" class="btn btn-primary" >Voeg toe</button>
      </form>
  </div>
</div>


@endsection