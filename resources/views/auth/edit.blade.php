@extends('templates.dev_layout')

@section('content')

<div class="container" style="margin-top: 75px;">

	 @if ($errors->any())
		<div class="alert alert-danger">
		    <ul>
		        @foreach ($errors->all() as $error)
		            <li>{{ $error }}</li>
		        @endforeach
		    </ul>
		</div>
    @endif

    @if ($alert = Session::get('alertSuccess'))
        <div class="alert alert-success">
            <p>{{ $alert }}</p>
        </div>
    @endif

    @if ($alert = Session::get('alertDanger'))
        <div class="alert alert-danger">
            <p>{{ $alert }}</p>
        </div>
    @endif

	<h5>Account Wijzigen</h5>

	<div id="formAccountEdit">
	    <v-form class="contact_form" method="post" action="{{url('account/store?account=' . $account->id)}}">
	    @csrf
	      	<v-text-field 
	      		value="{{$account->name}}" 
	      		label="Naam" 
	      		name="name">		
	      	</v-text-field>

	      	<v-text-field 
	      		value="{{$account->email}}" 
	      		label="Email" 
	      		name="email">		
	      	</v-text-field>

      		<v-btn onclick="checkSubmit(this)" class="default-button" type="button">Wijzig</v-btn>
    	</v-form>
	</div>

	<h5 style="margin-top: 25px;">Wachtwoord wijzigen</h5>

	<div id="formAccountDelete">
		<v-form method="post" action="{{url('account/changepass?account=' . $account->id)}}">
			@csrf
			<v-text-field 
				type="password" 
				name="oldPass" 
				label="Oud wachtwoord">
			</v-text-field>

			<v-text-field 
				type="password" 
				name="newPass1" 
				label="Nieuw wachtwoord">
			</v-text-field>

			<v-text-field 
				type="password"
				name="newPass2" 
				label="Herhaal nieuw wachtwoord">
			</v-text-field>

			<v-btn onclick="checkSubmit(this)" class="default-button" type="button">Wijzig</v-btn>
		</v-form>
	</div>
</div>

@endsection