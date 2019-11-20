@extends('templates.layout')

@section('title', 'Edit vakantiepark')
@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Werk Vakantiepark: {{$holidaypark->name}} bij:
  </div>
    <!-- success message -->

    @if ($alert = Session::get('alert'))
          <div class="alert alert-success">
              <p>{{ $alert }}</p>
          </div>
      @endif

 <!-- validation errors -->

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          <br /> 
      @endif


  <div class="card-body">
      <form method="post" action="{{ route('holidayparks.update', $holidaypark->id) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">
               <label for="name">Naam vakantiepark: </label>
              <input type="text" class="form-control" name="name" value="{{ $holidaypark->name }}" />
          </div>
          <div class="form-group">
              <label for="description">Beschrijving vakantiepark:</label>
              <input type="text" class="form-control" name="description" value="{{ $holidaypark->description }}" />
          </div>
          <div class="form-group">
              <label for="chalet">Chalets vakantiepark:</label>
              <input type="text" class="form-control" name="chalet" value="{{ $holidaypark->chalet }}" />
          </div>          
          <button onclick="checkSubmit(this)" type="button" class="btn btn-primary">Werk bij</button>
      </form>
  </div>
</div>  

@endsection