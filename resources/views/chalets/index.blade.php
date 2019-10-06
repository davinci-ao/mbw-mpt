@extends('templates.layout')

@section('content')

<!-- <h4>Data:</h4><br>
<a class="btn btn-primary" href="{{ URL::to('chalets/create') }}">voeg Chalet toe</a>
<hr>

@foreach ($chaletData as $chalet)
  <td>{{ $chalet->name }}</td>
  <td>{{ $chalet->description}}</td>
  <td>{{ $chalet->price}}</td>
  <a href="{{ route('chalets.edit',$chalet->id)}}" class="btn btn-primary">Edit</a>
    

  <form action="{{ route('chalets.destroy',$chalet->id)}}" method="post">
    @csrf
    @method('DELETE') 
    <button class="btn btn-danger" type="submit">Delete</button>
  </form>

  <hr>
@endforeach -->

<main style="text-align: center;" >

  <div class="mapouter" style="padding: 10px; display: inline-block">
    <div class="gmap_canvas">
      <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=1795%20JP&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" 
       marginheight="0" marginwidth="0">      
      </iframe>
    </div>
  </div>

  <div class="mapouter" style="padding: 10px; display: inline-block">
    <div class="gmap_canvas">
      <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=1795%20JP&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" 
       marginheight="0" marginwidth="0">      
      </iframe>
    </div>
  </div>


</main>
@endsection



