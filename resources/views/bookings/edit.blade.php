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
  <!--         'check_in',
        'check_out',
      	'arrival',
        'departure',
        'people',
        'pets',
        'price',
        'chalet' -->
   
      <form method="post" action="{{ route('bookings.update', $bookingData->id) }}">
        @method('PATCH')
        @csrf
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
          <button type="submit" class="btn btn-primary">opslaan</button>
      </form>
  </div>
</div>  

@endsection
