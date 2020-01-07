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
    <h1>Boeken</h1>
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
  @endif   

  <div class="card-body">

    <form>
      <select onchange="this.form.submit()" id="periodSelect" name="periodSelect" class="form-control" style="margin-bottom: 15px; width: 120px;">

        @if ($currentPeriod === 'weekend')
          <option selected="selected" value="weekend_{{$chalet->id}}">Weekend</option>
          <option value="midweek_{{$chalet->id}}">Midweek</option>
          <option value="week_{{$chalet->id}}">Week</option>
        @endif
        @if ($currentPeriod === 'midweek')
          <option value="weekend_{{$chalet->id}}">Weekend</option>
          <option selected="selected" value="midweek_{{$chalet->id}}">Midweek</option>
          <option value="week_{{$chalet->id}}">Week</option>
        @endif
        @if ($currentPeriod === 'week')
          <option value="weekend_{{$chalet->id}}">Weekend</option>
          <option value="midweek_{{$chalet->id}}">Midweek</option>
          <option selected="selected" value="week_{{$chalet->id}}">Week</option>
        @endif
      </select>
    </form>

    <b>De prijs is: €{{$showPrice[$currentPeriod]}}</b>
    <br>
    <br>

    <form method="post" action="{{ route('bookings.store') }}">
    @csrf   

      <div class="form-group">           
           <label for="voornaam">Voornaam</label>
          <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}"/>
      </div>
      <div class="form-group">
          <label for="achternaam">Achternaam</label>
          <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}"/>
      </div> 
      <div class="form-group">
          <label for="mail">E-mail adres</label>
          <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
      </div> 
      <div class="form-group">
          <label for="nummer">Telefoonnummer</label>
          <input type="text" class="form-control" name="telephone_number" value="{{ old('telephone_number') }}"/>
      </div> 
      <div class="form-group">
          <label for="aankomst">Aankomst</label>
          <input type="date" class="form-control" name="arrival" value="{{ old('arrival') }}"/>
      </div>
      <div class="form-group">
          <label for="vertrek">Vertrek</label>
          <input type="date" class="form-control" name="departure" value="{{ old('departure') }}"/>
      </div>
      <div class="form-group">
          <label for="personen">Aantal personen</label>
          <input type="text" class="form-control" name="people" value="{{ old('people') }}"/>
      </div>
      <div class="form-group">
          <label for="huisdieren">Huisdieren</label>
          <input type="text" class="form-control" name="pets" value="{{ old('pets') }}"/>
      </div> 
      <input type="hidden" name="chaletId" value="{{ $chalet->id }}">
      <input type="hidden" name="calcPrice" value="{{$showPrice[$currentPeriod]}}">
                        
      <button  onclick="checkSubmit(this)" type="button" class="btn btn-primary" >boeken</button>
    </form>
  </div>
</div>

@endsection