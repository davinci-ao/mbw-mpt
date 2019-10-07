@extends('templates.layout')

@section('content')

<h4>Data:</h4><br>

<!-- only show create button when logged in -->

@if (Auth::check())
  <a class="btn btn-primary" href="{{ URL::to('chalets/create') }}">voeg Chalet toe</a>
  <hr>
@endif

@foreach ($chaletData as $chalet)
  <td>{{ $chalet->name }}</td>
  <td>{{ $chalet->description}}</td>
  <td>{{ $chalet->price}}</td>

  <!-- only show edit button when logged in -->

  @if (Auth::check())
    <a href="{{ route('chalets.edit',$chalet->id)}}" class="btn btn-primary">Edit</a>
  @endif  


  <!-- only show delete button when logged in -->

  @if (Auth::check())
    <form action="{{ route('chalets.destroy',$chalet->id)}}" method="post">
      @csrf
      @method('DELETE') 
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>
    <hr>
  @endif

@endforeach

@endsection



