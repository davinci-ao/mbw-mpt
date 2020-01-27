@extends('templates.ce_layout')

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


  <div class="card-body">
      <form method="post" action="{{ route('holidayparks.update', $holidaypark->id) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">
               <label for="name">Naam vakantiepark <span class="starSpan">*</span></label>
              <input type="text" class="form-control" name="holidaypark_name" value="{{ $holidaypark->holidaypark_name }}" />
              @if ($errors->first('holidaypark_name'))
                <small class="smallError">{{$errors->first('holidaypark_name')}}</small>
              @endif
          </div>
          <div class="form-group">
              <label for="description">Beschrijving vakantiepark <span class="starSpan">*</span></label>
              <textarea class="form-control" name="description">{{ $holidaypark->description }}</textarea>
              @if ($errors->first('description'))
                <small class="smallError">{{$errors->first('description')}}</small>
              @endif
          </div>        
          <button onclick="checkSubmit(this)" type="button" class="btn btn-primary">Werk bij</button>
      </form>
  </div>
</div>  

@endsection