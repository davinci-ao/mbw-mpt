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
    <h1>Boeking wijzigen</h1>
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
              <label for="nummer">Telefoonnummer</label>
              <input type="text" class="form-control" name="telephone_number" value="{{ $bookingData->telephone_number}}"/>
          </div> 
          <div class="form-group">
              <label for="aankomst">Aankomst</label>
              <input type="date" min="0" step="any" class="form-control" name="arrival" value="{{ $bookingData->arrival }}" />
          </div>
          <div class="form-group">
              <label for="vertrek">Vertrek</label>
              <input type="date" class="form-control" name="departure" value="{{ $bookingData->departure }}" />
          </div> 
          <div class="form-group">
              <label for="personen">Aantal personen</label>
              <input type="text" class="form-control" name="people" value="{{ $bookingData->people }}" />
          </div> 
          <div class="form-group">
              <label for="huisdieren">Huisdieren</label>
              <input type="text" class="form-control" name="pets" value="{{ $bookingData->pets}}" />
          </div> 
          <button  onclick="checkSubmit(this)" type="button" class="btn btn-primary" >Opslaan</button>
      </form>
  </div>
</div>  

@endsection
