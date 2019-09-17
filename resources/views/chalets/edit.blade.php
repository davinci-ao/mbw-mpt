
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    werk Chalet: {{$chaletData->name}} bij
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
   
      <form method="post" action="{{ route('chalets.update', $chaletData->id) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">
               <label for="name">Chaletnaam </label>
              <input type="text" class="form-control" name="name" value="{{ $chaletData->name }}" />
          </div>
          <div class="form-group">
              <label for="description">Beschrijving</label>
              <input type="text" class="form-control" name="description" value="{{ $chaletData->description }}" />
          </div>
          <div class="form-group">
              <label for="prijs">prijs</label>
              <input type="text" class="form-control" name="price" value="{{ $chaletData->price }}" />
          </div>          
          <button type="submit" class="btn btn-primary">opslaan</button>
      </form>
  </div>
</div>  



