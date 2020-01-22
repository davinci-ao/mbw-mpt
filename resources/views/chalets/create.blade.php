@extends('templates.ce_layout')

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

  <div class="card-body">
  
      <form method="post" action="{{ route('chalets.store') }}" enctype='multipart/form-data'>
        <div style="width: 60%; float: left;">
          <div class="form-group">
              @csrf
              <label for="name">Chaletnaam <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
              @if ($errors->first('name'))
                <small class="smallError">{{$errors->first('name')}}</small>
              @endif

          </div>

          <div class="form-group">
              <label for="sel1">Vakantiepark <span class="starSpan">*</span></label>
              <select class="form-control" name="holidaypark_id" id="sel1">
                @foreach($holidayparks as $holidaypark)
                  <option value="{{ $holidaypark->id }}">{{ $holidaypark->holidaypark_name }}</option>
                @endforeach
              </select>
              @if ($errors->first('holidaypark_id'))
                <small class="smallError">{{$errors->first('holidaypark_id')}}</small>
              @endif
          </div> 

          <div class="form-group">
              <label for="description">Beschrijving <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="description" value="{{ old('description') }}"/>
              @if ($errors->first('description'))
                <small class="smallError">{{$errors->first('description')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="prijs">Dagprijs <span class="starSpan">*</span></label>
              <input type="number" min="0" step="any" class="form-control" name="price" value="{{ old('price') }}"/>
              @if ($errors->first('price'))
                <small class="smallError">{{$errors->first('price')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="land">Land <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="country" value="{{ old('country') }}"/>
              @if ($errors->first('country'))
                <small class="smallError">{{$errors->first('country')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="huisnummer">Huisnummer <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="housenr" value="{{ old('housenr') }}"/>
              @if ($errors->first('housenr'))
                <small class="smallError">{{$errors->first('housenr')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="toevoeging">Toevoeging</label>
              <input type="text" class="form-control" name="addition" value="{{ old('addition') }}"/>
              @if ($errors->first('addition'))
                <small class="smallError">{{$errors->first('addition')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="straat">Straat <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="street" value="{{ old('street') }}"/>
              @if ($errors->first('street'))
                <small class="smallError">{{$errors->first('street')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="plaats">Plaats <span style="color: red">*</span></label>
              <input type="text" class="form-control" name="place" value="{{ old('place') }}"/>
              @if ($errors->first('place'))
                <small class="smallError">{{$errors->first('place')}}</small>
              @endif
          </div> 
          <div class="form-group">
              <label for="photo1">Foto 1 <span style="color: red">*</span></label>
              <input type="file" class="form-control" name="photo1"/>
              @if ($errors->first('photo1'))
                <small class="smallError">{{$errors->first('photo1')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="photo2">Foto 2 <span style="color: red">*</span></label>
              <input type="file" class="form-control" name="photo2"/>
              @if ($errors->first('photo2'))
                <small class="smallError">{{$errors->first('photo2')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="photo3">Foto 3 <span style="color: red">*</span></label>
              <input type="file" class="form-control" name="photo3"/>
              @if ($errors->first('photo3'))
                <small class="smallError">{{$errors->first('photo3')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="photo4">Foto 4 <span style="color: red">*</span></label>
              <input type="file" class="form-control" name="photo4"/>
              @if ($errors->first('photo4'))
                <small class="smallError">{{$errors->first('photo4')}}</small>
              @endif
          </div>                                                                                                         
          <button  onclick="checkSubmit(this)" type="button" class="btn btn-primary">Voeg toe</button>
        </div>

        <div style="width: 40%; float: right; padding-left: 30px;">
        <h5 style="margin-bottom: 25px;"><b>Kenmerken</b><span style="color: red"> *</span></h5>

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
          @if ($errors->first('characteristics'))
            <small style="color: darkred;">{{$errors->first('characteristics')}}</small>
          @endif
      </div>
                  
      </form>
  </div>
</div>

@endsection