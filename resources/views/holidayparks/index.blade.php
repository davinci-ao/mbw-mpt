@extends('templates.layout')

@section('content')

<h1>Vakantieparken</h1>

@if (Auth::check())
    <a href="{{ URL::to('holidayparks/create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Voeg een vakantiepark toe</a>
@endif

@foreach ($holidayparks as $holidaypark)
<!-- <p>{{ $holidaypark->name }}</p>
<p>{{ $holidaypark->description }}</p>
<p>{{ $holidaypark->chalet }}</p> -->

<div class="card holidaypark-card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title holidaypark-title">{{ $holidaypark->name }}</h5>
    <p class="card-text">{{ $holidaypark->description }}</p>
    <a href="#" class="btn btn-primary">Bekijk chalets</a>
  </div>
</div>

@if (Auth::check())
    <a href="{{ route('holidayparks.edit',$holidaypark->id)}}" class="btn btn-primary">Edit</a>
  @endif  

@if (Auth::check())
    <form action="{{ route('holidayparks.destroy',$holidaypark->id)}}" method="post">
      @csrf
      @method('DELETE') 
      <button class="btn btn-danger" type="submit">Verwijder vakantiepark</button>
    </form>
    <hr>
  @endif
@endforeach

@endsection