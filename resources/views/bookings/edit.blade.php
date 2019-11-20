@extends('templates.layout')

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
    <h1>boeken</h1>
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
      <form method="post" action="{{ route('bookings.update', $bookingData->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">           
               <label for="voornaam">Voornaam</label>
              <input type="text" class="form-control" name="firstname" value="{{ $bookingData->firstname }}"/>
          </div>
          <div class="form-group">
              <label for="achternaam">Achternaam</label>
              <input type="text" class="form-control" name="lastname" value="{{ $bookingData->lastname }}"/>
          </div> 
          <div class="form-group">
              <label for="mail">E-mail adres</label>
              <input type="text" class="form-control" name="email" value="{{ $bookingData->email }}"/>
          </div> 
          <div class="form-group">
              <label for="nummer">telefoonnummer</label>
              <input type="text" class="form-control" name="telephone_number" value="{{ $bookingData->telephone_number}}"/>
          </div> 
          <div class="form-group">
               <label for="Check-in">check-in tijd</label>
              <input type="time" class="form-control" name="check_in" value="{{ $bookingData->check_in }}" />
          </div>
          <div class="form-group">
              <label for="check-out">check-uit tijd</label>
              <input type="time" class="form-control" name="check_out" value="{{ $bookingData->check_out }}" />
          </div>
          <div class="form-group">
              <label for="aankomst">aankomst</label>
              <input type="date" min="0" step="any" class="form-control" name="arrival" value="{{ $bookingData->arrival }}" />
          </div>
          <div class="form-group">
              <label for="vertrek">vertrek</label>
              <input type="date" class="form-control" name="departure" value="{{ $bookingData->departure }}" />
          </div> 
          <div class="form-group">
              <label for="personen">aantal personen</label>
              <input type="text" class="form-control" name="people" value="{{ $bookingData->people }}" />
          </div> 
          <div class="form-group">
              <label for="huisdieren">huisdieren</label>
              <input type="text" class="form-control" name="pets" value="{{ $bookingData->pets}}" />
          </div> 
          <div class="form-group">
              <label for="prijs">Prijs</label>
              <input type="number" class="form-control" name="price" value="{{ $bookingData->price }}" />
          </div> 
          <div class="form-group">
              <label for="chalet">chalet</label>
              <input type="text" class="form-control" name="chalet" value="{{ $bookingData->chalet }}" />
          </div>           
          <button  onclick="checkSubmit(this)" type="button" class="btn btn-primary" >opslaan</button>
      </form>
  </div>
</div>  

@endsection
