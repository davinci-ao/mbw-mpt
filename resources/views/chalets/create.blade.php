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
    <br/> 
  @endif

  <div class="card-body">
  
      <form method="post" action="{{ route('chalets.store') }}" enctype='multipart/form-data'>
      <div style="width: 60%; float: left;">
          <div class="form-group">
              @csrf
               <label for="name">Chaletnaam</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
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
              <label for="prijs">Prijs</label>
              <input type="number" min="0" step="any" class="form-control" name="price" value="{{ old('price') }}"/>
          </div>
          <div class="form-group">
              <label for="land">Land</label>
              <input type="text" class="form-control" name="country" value="{{ old('country') }}"/>
          </div>
          <div class="form-group">
              <label for="huisnummer">Huisnummer</label>
              <input type="text" class="form-control" name="housenr" value="{{ old('housenr') }}"/>
          </div>
          <div class="form-group">
              <label for="toevoeging">Toevoeging</label>
              <input type="text" class="form-control" name="addition" value="{{ old('addition') }}"/>
          </div> 
          <div class="form-group">
              <label for="straat">Straat</label>
              <input type="text" class="form-control" name="street" value="{{ old('street') }}"/>
          </div>
          <div class="form-group">
              <label for="plaats">Plaats</label>
              <input type="text" class="form-control" name="place" value="{{ old('place') }}"/>
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
          <button  onclick="checkSubmit(this)" type="button" class="btn btn-primary">Voeg toe</button>
          
          <div style="width: 40%; float: right; padding-left: 30px;">
        <h5 style="margin-bottom: 25px;"><b>Kenmerken</b></h5>

        <div style="width: 50%; float: left;">

          <h6 class="text-primary"><b>Ligging</b></h6>

          <input type="checkbox" name="characteristics[]" value="Zee"> Zee<br>
          <input type="checkbox" name="characteristics[]" value="Strand"> Strand<br>
          <input type="checkbox" name="characteristics[]" value="Natuur"> Natuur<br>
          <input type="checkbox" name="characteristics[]" value="Bos"> Bos<br>
          <input type="checkbox" name="characteristics[]" value="Water"> Water<br>
          <input type="checkbox" name="characteristics[]" value="Bergen"> Bergen<br>
          <input type="checkbox" name="characteristics[]" value="Boerderij"> Boerderij<br>

          <br>

          <h6 class="text-primary"><b>Accomodatie kenmerken</b></h6>

          <input type="checkbox" name="characteristics[]" value="Airconditioning"> Airconditioning<br>
          <input type="checkbox" name="characteristics[]" value="Vrijstaand"> Vrijstaand<br>
          <input type="checkbox" name="characteristics[]" value="Mindervalide"> Mindervalide<br>
          <input type="checkbox" name="characteristics[]" value="Verwarming"> Verwarming<br>
          <input type="checkbox" name="characteristics[]" value="Internet"> Internet<br>
          <input type="checkbox" name="characteristics[]" value="Roken"> Roken<br>
          <input type="checkbox" name="characteristics[]" value="Parkeerplaats"> Parkeerplaats<br>
          <input type="checkbox" name="characteristics[]" value="Tuin"> Tuin<br>
          <input type="checkbox" name="characteristics[]" value="Huisdieren"> Huisdieren<br>
          <input type="checkbox" name="characteristics[]" value="Zwembad"> Zwembad<br>
          
                    <br>
           
          <h6 class="text-primary"><b>Sanitair</b></h6>

          <input type="checkbox" name="characteristics[]" value="Toilet"> Toilet<br>
          <input type="checkbox" name="characteristics[]" value="Douche"> Douche<br>
          <input type="checkbox" name="characteristics[]" value="Bad"> Bad<br>
          <input type="checkbox" name="characteristics[]" value="Parterre"> Parterre<br>
          <input type="checkbox" name="characteristics[]" value="Stoomdouche"> Stoomdouche<br>

          <br>

        </div>

        <div style="width: 50%; float: right;">

          <h6 class="text-primary"><b>Welness</b></h6>

          <input type="checkbox" name="characteristics[]" value="Jacuzzi"> Jacuzzi<br>
          <input type="checkbox" name="characteristics[]" value="Sauna"> Sauna<br>
          <input type="checkbox" name="characteristics[]" value="Zonnebank"> Zonnebank<br>

          <br>

          <h6 class="text-primary"><b>Apparatuur</b></h6>

          <input type="checkbox" name="characteristics[]" value="Koelkast"> Koelkast<br>
          <input type="checkbox" name="characteristics[]" value="Vriezer"> Vriezer<br>
          <input type="checkbox" name="characteristics[]" value="Magnetron"> Magnetron<br>
          <input type="checkbox" name="characteristics[]" value="Oven"> Oven<br>
          <input type="checkbox" name="characteristics[]" value="DVD_speler"> DVD speler<br>
          <input type="checkbox" name="characteristics[]" value="TV"> TV<br>
          <input type="checkbox" name="characteristics[]" value="Wasmachine"> Wasmachine<br>
          <input type="checkbox" name="characteristics[]" value="Droger"> Droger<br>
          <input type="checkbox" name="characteristics[]" value="Vaatwasser"> Vaatwasser<br>

          <br>

        </div>
      </div>
                  
      </form>
  </div>
</div>

@endsection