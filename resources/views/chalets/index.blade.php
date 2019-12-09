@extends('templates.layout')

@section('title', 'Chalets')
@section('content')

@if ($alert = Session::get('alert'))
        <div class="alert alert-success">
            <p>{{ $alert }}</p>
        </div>
    @endif

<h1>Chalets</h1>

@if (Auth::check())
   <a class="btn btn-primary add-btn-chalets" href="{{ URL::to('chalets/create') }}">Voeg chalet toe</a>
@endif

<div class="filter">
  <p>Sorteer op:</p>
  <a href="{{ route('chalets.index', ['holidaypark'=>$holidayparkid, 'sort' => 'asc']) }}">Naam</a>&nbsp;|&nbsp;
  <a href="{{ route('chalets.index', ['holidaypark'=>$holidayparkid, 'sortprice' => 'asc']) }}">Prijs</a>
</div>

@foreach ($chaletData as $chalet)
<a href="{{ url('bookings/test-page?chalet=' . $chalet->id) }}" class="btn btn-primary" style="margin-top: 10px;">testpagina</a>
  <div class="card w-100 chalet-card">
    <div class="card-body">
      <div class="chalet-text">
        <h4 class="card-title chalet-title">{{ $chalet->name }}</h4>
        <p class="card-text">Beschrijving: {{ $chalet->description}}</p>

        <p class="card-text">Dagprijs: €{{$dayPrice[$chalet->id]}}</p>

        <p class="card-text">Straat: {{ $chalet->street}}</p>
        <p class="card-text">Nummer: {{ $chalet->housenr}}</p>
        <p class="card-text">Plaats: {{ $chalet->place}}</p>
        <p class="card-text">Land: {{ $chalet->country}}</p>
        <a href="{{ url('bookings/create?chalet=' . $chalet->id) }}" class="btn btn-primary" style="margin-top: 10px;">Boeken</a>
      </div>

      <?php
    $name = $chalet->name;
    $country = $chalet->country;
    $housenr = $chalet->housenr;
    $street  = $chalet->street;
    $place = $chalet->place;
  ?>



      <div class="maps">
        <iframe width="100%" height="350" src="https://maps.google.com/maps?width=720&height=600&hl=nl&q=<?=$street ?? ''?>%20<?=$housenr ?? ''?>%2C%20<?=$place ?? ''?>%2C%20<?=$country ?? ''?>s+(<?=$name ?? ''?>)&ie=UTF8&t=&z=18&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe>
      </div>

        <!-- Code voor het Google maps kaartje -->   


  <!-- only show edit button when logged in -->

    <div class="chalet-buttons">

      @if (Auth::check())
        <a href="{{ route('chalets.edit',$chalet->id)}}" class="btn btn-primary chalet-edit-btn">Edit</a>
      @endif  

  <!-- only show delete button when logged in -->

      @if (Auth::check())
        <form action="{{ route('chalets.destroy',$chalet->id)}}" method="post">
          @csrf
          @method('DELETE') 
          <button class="btn btn-danger chalet-delete-btn" type="submit">Delete</button>
        </form>
      @endif
      </div>

    </div>
  </div>

@endforeach

@endsection

<!-- test -->



