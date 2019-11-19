@extends('templates.layout')

@section('content')

<div class="card uper">
  <div class="card-header">
    Voeg hier een vakantiepark toe
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('holidayparks.store') }}">
          <div class="form-group">
              @csrf
              <label for="holidaypark_name">Naam vakantiepark:</label>
              <input type="text" class="form-control" name="holidaypark_name"/>
          </div>
          <div class="form-group">
              <label for="price">Beschrijving vakantiepark:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="quantity">Chalets in dit vakantiepark:</label>
              <input type="text" class="form-control" name="chalet"/>
          </div>
          <button type="submit" class="btn btn-primary">Voeg toe</button>
      </form>
  </div>
</div>

@endsection