@extends('templates.layout')

@section('content')


<div class="container" style="margin-top: 25px;">

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

    <h1 style="margin-bottom: 20px;">Contact</h1>

	<form method="post" action="{{ url('/contact/store') }}">
	    @csrf  
	     <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Voornaam</strong>
	                <input type="text" name="firstname" class="form-control" placeholder="Voornaam">
	            </div>
	        </div>

	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Achternaam</strong>
	                <input type="text" name="lastname" class="form-control" placeholder="Achternaam">
	            </div>
	        </div>

	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Email</strong>
	                <input type="text" name="email" class="form-control" placeholder="Email">
	            </div>
	        </div>

	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Telefoon</strong>
	                <input type="text" name="phonenumber" class="form-control" placeholder="Telefoon">
	            </div>
	        </div>

	        <div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="form-group">
	                <strong>Bericht</strong>
	                <textarea class="form-control" style="height:150px" name="message" placeholder="Bericht"></textarea>
	            </div>
	        </div>



	        <div class="col-xs-12 col-sm-12 col-md-12">
	                <button type="submit" name="submitForm" class="btn btn-primary">Verzenden</button>
	        </div>
	    </div>
	   
	</form>

</div>

@endsection