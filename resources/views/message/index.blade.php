<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mooi Plekje Texel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	@if ($alert = Session::get('alert'))
        <div class="alert alert-success">
            <p>{{ $alert }}</p>
        </div>
    @endif

	<div class="container" style="margin-top: 25px;">

		<form>
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

</body>
</html>
