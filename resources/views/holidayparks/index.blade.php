@extends('templates.layout')

@section('title', 'Vakantieparken')
@section('content')

<h1>Vakantieparken</h1>

@if (Auth::check())
    <a href="{{ URL::to('holidayparks/create') }}" class="btn btn-primary chalet-add-btn" style="margin-bottom: 10px;">Voeg een vakantiepark toe</a>
@endif

@foreach ($holidayparks as $holidaypark)

<div class="card w-25 holidaypark-card">
  <div class="card-body">
    <h5 class="card-title holidaypark-title">{{ $holidaypark->holidaypark_name }}</h5> @if (Auth::check())<a style="  padding: 5px;" href="{{ route('holidayparks.edit',$holidaypark->id)}}" ><small><i class="fas fa-edit"></i></small></a>  @endif
    
    <p class="card-text holidaypark-description">{{ $holidaypark->description }}</p>

    <a href="{{ url('chalets?holidaypark=' . $holidaypark->id)}}" class="btn btn-primary holidaypark-btn">Bekijken</a>

    @if (Auth::check())
      <form action="{{ route('holidayparks.destroy',$holidaypark->id)}}" method="post">
        @csrf
        @method('DELETE') 
        <button style=" margin: 5px; font-size: 20px; float: right;" onclick="return confirm('Weet je het zeker dat je dit vakantiepark wil verwijderen?');" type="submit"><i class="fas fa-trash-alt"></i></button>
      </form>
    @endif  
  </div>
</div>

@endforeach 

@endsection 