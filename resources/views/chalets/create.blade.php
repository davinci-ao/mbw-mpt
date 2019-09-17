      
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Voeg een Chalet toe
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
      <form method="post" action="{{ route('chalets.store') }}">
          <div class="form-group">
              @csrf
               <label for="name">Chaletnaam</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="description">Beschrijving</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="prijs">prijs</label>
              <input type="text" class="form-control" name="price"/>
          </div>          
          <button type="submit" class="btn btn-primary">Voeg toe</button>
      </form>
  </div>
</div>


