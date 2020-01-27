@extends('templates.layout')

@section('title', 'Chalets')
@section('content')

@if ($alert = Session::get('alert'))
        <div class="alert alert-success">
            <p>{{ $alert }}</p>
        </div>
    @endif

<h1>Chalets</h1>

<div>

  <button onclick="submitFilter()" style="display: inline-block;" class="btn btn-dark" style="margin-bottom: 25px;"><b>Verfijn resultaten <i class="fas fa-filter"></i></b></button>

  <div class="filter" style="display: inline-block;">
    <p>Sorteer op:</p>

      <form style="display: inline-block;">
    <select onchange="this.form.submit()" id="sortSelect" name="sortSelect" class="form-control" style="margin-bottom: 15px; width: 200px;">

      <option <?php if ($currentSort == 'nameAsc'){ ?>selected="selected" 
      <?php } ?>value="nameAsc">Naam a-z</option>

      <option <?php if ($currentSort == 'nameDesc'){ ?>selected="selected" 
      <?php } ?>value="nameDesc">Naam z-a</option>

      <option <?php if ($currentSort == 'priceAsc'){ ?>selected="selected" 
      <?php } ?> value="priceAsc">Prijs laag-hoog</option>

      <option <?php if ($currentSort == 'priceDesc'){ ?>selected="selected" 
      <?php } ?> value="priceDesc">Prijs hoog-laag</option>

      <option <?php if ($currentSort == 'createdAt'){ ?>selected="selected" 
      <?php } ?> value="createdAt">Verschijningsdatum</option>

    </select>

    <input type="hidden" name="holidaypark" value="{{ $holidayparkid }}">
    <input type="hidden" name="submitFilters" value="{{ $encodedFilters }}">

  </form>
    
  </div>

<div>

<div style="width: 25%; padding-top: 20px; float: left;">

<form id="filterForm">  



  <h6 class="text-primary"><b>Ligging</b></h6>

  <input <?php if(in_array("Zee", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Zee"> Zee<br>
  <input <?php if(in_array("Strand", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Strand"> Strand<br>
  <input <?php if(in_array("Natuur", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Natuur"> Natuur<br>
  <input <?php if(in_array("Bos", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Bos"> Bos<br>
  <input <?php if(in_array("Water", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Water"> Water<br>
  <input <?php if(in_array("Bergen", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Bergen"> Bergen<br>
  <input <?php if(in_array("Boerderij", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Boerderij"> Boerderij<br>

  <br>

  <h6 class="text-primary"><b>Accomodatie kenmerken</b></h6>

  <input <?php if(in_array("Airconditioning", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Airconditioning"> Airconditioning<br>
  <input <?php if(in_array("Vrijstaand", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Vrijstaand"> Vrijstaand<br>
  <input <?php if(in_array("Mindervalide", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Mindervalide"> Mindervalide<br>
  <input <?php if(in_array("Verwarming", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Verwarming"> Verwarming<br>
  <input <?php if(in_array("Internet", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Internet"> Internet<br>
  <input <?php if(in_array("Roken", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Roken"> Roken<br>
  <input <?php if(in_array("Parkeerplaats", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Parkeerplaats"> Parkeerplaats<br>
  <input <?php if(in_array("Tuin", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Tuin"> Tuin<br>
  <input <?php if(in_array("Huisdieren", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Huisdieren"> Huisdieren<br>
  <input <?php if(in_array("Zwembad", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Zwembad"> Zwembad<br>

  <br>
   
  <h6 class="text-primary"><b>Sanitair</b></h6>

  <input <?php if(in_array("Toilet", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Toilet"> Toilet<br>
  <input <?php if(in_array("Douche", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Douche"> Douche<br>
  <input <?php if(in_array("Bad", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Bad"> Bad<br>
  <input <?php if(in_array("Parterre", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Parterre"> Parterre<br>
  <input <?php if(in_array("Stoomdouche", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Stoomdouche"> Stoomdouche<br>

  <br>

  <h6 class="text-primary"><b>Welness</b></h6>

  <input <?php if(in_array("Jacuzzi", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Jacuzzi"> Jacuzzi<br>
  <input <?php if(in_array("Sauna", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Sauna"> Sauna<br>
  <input <?php if(in_array("Zonnebank", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Zonnebank"> Zonnebank<br>

  <br>

  <h6 class="text-primary"><b>Apparatuur</b></h6>

  <input <?php if(in_array("Koelkast", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Koelkast"> Koelkast<br>
  <input <?php if(in_array("Vriezer", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Vriezer"> Vriezer<br>
  <input <?php if(in_array("Magnetron", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Magnetron"> Magnetron<br>
  <input <?php if(in_array("Oven", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Oven"> Oven<br>
  <input <?php if(in_array("DVD_speler", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="DVD_speler"> DVD speler<br>
  <input <?php if(in_array("TV", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="TV"> TV<br>
  <input <?php if(in_array("Wasmachine", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Wasmachine"> Wasmachine<br>
  <input <?php if(in_array("Droger", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Droger"> Droger<br>
  <input <?php if(in_array("Vaatwasser", $selectedFilters)){?> checked <?php } ?> type="checkbox" name="filter[]" value="Vaatwasser"> Vaatwasser<br>

  <br>

  <input type="hidden" name="holidaypark" value="{{ $holidayparkid }}">
  <input type="hidden" name="sortSelect" value="{{ $currentSort }}">

</form>

</div>

<div style="float: right; width: 75%;">

<div class="card-deck">
@foreach ($chaletData as $chalet)
  <div class="card custom-chalet-width no-flex">
    <img src="{{ asset('chaletsafbeeldingen/'.$chalet->photo1) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $chalet->name }}</h5>
      <p class="card-text chalet-description">Beschrijving: {{ $chalet->description}}</p>
      <a href="{{ route('detail.show', $chalet->id) }}" class="btn btn-primary chalet-info-btn">Meer info</a>

          <div class="holidaypark-btns">

          @if (Auth::check()) <a class="edit-holidaypark-btn" href="{{ route('chalets.edit',$chalet->id)}}" ><small><i class="fas fa-edit"></i></small></a> @endif

      @if (Auth::check())
        <form class="inline-form" action="{{ route('chalets.destroy',$chalet->id)}}" method="post">
          @csrf
          @method('DELETE') 
          <button onclick="return confirm('Weet je het zeker dat je deze chalet wil verwijderen?');"  type="submit"><i class="fas fa-trash-alt"></i></button>
        </form>
      @endif
      </div>
    </div>
  </div>

@endforeach
</div>

</div>
      </div>
</div>

<script>

  function submitFilter(){
    document.getElementById("filterForm").submit();
  }

</script>


@endsection

<!-- test -->



