@extends('templates.ce_layout')

@section('title', 'Create vakantiepark')
@section('content')

<div class="card uper">
  <div class="card-header">
    <h1>Voeg hier een vakantiepark toe</h1>
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
              <input type="text" value="{{ old('holidaypark_name') }}" class="form-control" name="holidaypark_name"/>
          </div>
          <div class="form-group">
              <label for="price">Beschrijving vakantiepark:</label>
              <textarea class="form-control" name="description">{{ old('description') }}</textarea>
          </div>
          <button onclick="checkSubmit(this)" type="button" class="btn btn-primary">Voeg toe</button>
      </form>
  </div>
</div>

@endsection