@extends('templates.ce_layout')

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

  <div class="card-body">
      <form method="post" action="{{ route('bookings.update', $bookingData->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">           
               <label for="voornaam">Voornaam <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="firstname" value="{{ $bookingData->firstname }}"/>
              @if ($errors->first('firstname'))
                <small class="smallError">{{$errors->first('firstname')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="achternaam">Achternaam <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="lastname" value="{{ $bookingData->lastname }}"/>
              @if ($errors->first('lastname'))
                <small class="smallError">{{$errors->first('lastname')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="mail">E-mail adres <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="email" value="{{ $bookingData->email }}"/>
              @if ($errors->first('email'))
                <small class="smallError">{{$errors->first('email')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="nummer">Telefoonnummer <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="telephone_number" value="{{ $bookingData->telephone_number}}"/>
              @if ($errors->first('telephone_number'))
                <small class="smallError">{{$errors->first('telephone_number')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="aankomst">Aankomst <span class="starSpan">*</span></label>
              <input type="date" min="0" step="any" class="form-control" name="arrival" value="{{ $bookingData->arrival }}" />
              @if ($errors->first('arrival'))
                <small class="smallError">{{$errors->first('arrival')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="vertrek">Vertrek <span class="starSpan">*</span></label>
              <input type="date" class="form-control" name="departure" value="{{ $bookingData->departure }}" />
              @if ($errors->first('departure'))
                <small class="smallError">{{$errors->first('departure')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="personen">Aantal personen <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="people" value="{{ $bookingData->people }}" />
              @if ($errors->first('people'))
                <small class="smallError">{{$errors->first('people')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="huisdieren">Huisdieren <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="pets" value="{{ $bookingData->pets}}" />
              @if ($errors->first('pets'))
                <small class="smallError">{{$errors->first('pets')}}</small>
              @endif
          </div> 
          <button  onclick="checkSubmit(this)" type="button" class="btn btn-primary" >Opslaan</button>
      </form>
  </div>
</div>  

@endsection
