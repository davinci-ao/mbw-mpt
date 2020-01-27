@extends('templates.ce_layout')

@section('title', 'Create vakantiepark')
@section('content')

<div class="card uper">
  <div class="card-header">
    <h1>Voeg hier een vakantiepark toe</h1>
  </div>
  <div class="card-body">
      <form method="post" action="{{ route('holidayparks.store') }}">
          <div class="form-group">
              @csrf
              <label for="holidaypark_name">Naam vakantiepark <span class="starSpan">*</span></label>
              <input type="text" value="{{ old('holidaypark_name') }}" class="form-control" name="holidaypark_name"/>
              @if ($errors->first('holidaypark_name'))
                <small class="smallError">{{$errors->first('holidaypark_name')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="price">Beschrijving vakantiepark <span class="starSpan">*</span></label>
              <textarea class="form-control" name="description">{{ old('description') }}</textarea>
              @if ($errors->first('description'))
                <small class="smallError">{{$errors->first('description')}}</small>
              @endif
          </div>
          <button onclick="checkSubmit(this)" type="button" class="btn btn-primary">Voeg toe</button>
      </form>
  </div>
</div>

@endsection