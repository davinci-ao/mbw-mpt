@extends('templates.layout')

@section('title', 'Vakantieparken')
@section('content')

<h1>Vakantieparken</h1>

@if (Auth::check())
    <a href="{{ URL::to('holidayparks/create') }}" class="btn btn-primary chalet-add-btn" style="margin-bottom: 10px;">Voeg een vakantiepark toe</a>
@endif

@foreach ($holidayparks as $holidaypark)

<div class="card holidaypark-card">
  <div class="card-body">
    <h5 class="card-title holidaypark-title">{{ $holidaypark->holidaypark_name }}</h5>
    <p class="card-text">{{ $holidaypark->description }}</p>

    <a href="{{ url('chalets?holidaypark=' . $holidaypark->id)}}" class="btn btn-primary holidaypark-btn">Bekijk chalets</a>

    @if (Auth::check())
      <a href="{{ route('holidayparks.edit',$holidaypark->id)}}" class="btn btn-primary holidaypark-edit">Edit</a>
    @endif

    @if (Auth::check())
      <form action="{{ route('holidayparks.destroy',$holidaypark->id)}}" method="post">
        @csrf
        @method('DELETE') 
        <button class="btn btn-danger holidaypark-delete" type="submit">Verwijder vakantiepark</button>
      </form>
    @endif  
  </div>
</div>

@endforeach 

@endsection 