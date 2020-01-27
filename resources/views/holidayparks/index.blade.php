@extends('templates.layout')

@section('title', 'Vakantieparken')
@section('content')

<h1>Vakantieparken</h1>

<div class="card-deck">

@foreach ($holidayparks as $holidaypark)

  <div class="card holidaypark-cards no-flex">
      <div class="card-body">
        <h5 class="card-title">{{ $holidaypark->holidaypark_name }}</h5>
        <p class="card-text holidaypark-description">{{ $holidaypark->description }}</p>
        <a href="{{ url('chalets?holidaypark=' . $holidaypark->id)}}" class="btn btn-primary holidaypark-btn">Bekijken</a>

        <div class="holidaypark-btns">
            @if (Auth::check())<a class="edit-holidaypark-btn" href="{{ route('holidayparks.edit',$holidaypark->id)}}" ><small><i class="fas fa-edit"></i></small></a>  @endif
          
            @if (Auth::check())
              <form class="inline-form" action="{{ route('holidayparks.destroy',$holidaypark->id)}}" method="post">
                @csrf
                @method('DELETE') 
                <button onclick="return confirm('Weet je het zeker dat je dit vakantiepark wil verwijderen?');" type="submit"><i class="fas fa-trash-alt"></i></button>
              </form>
            @endif 
          </div> 
      </div>
  </div>

@endforeach 

</div>

@endsection 