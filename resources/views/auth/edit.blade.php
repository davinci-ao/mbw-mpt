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

	<h5>Edit Account</h5>

	<div id="formAccountEdit">
	    <v-form class="contact_form" method="post" action="{{url('account/store?account=' . $account->id)}}">
	    @csrf
	      	<v-text-field v-model="name" label="Naam" name="name"></v-text-field>
	      	<v-text-field v-model="email" label="Email" name="email"></v-text-field>
      		<v-btn class="default-button" type="submit">Wijzig</v-btn>
    	</v-form>
	</div>

	<h5>Change Password</h5>

<!-- 	name

 -->
	<form method="post" action="{{url('account/changepass?account=' . $account->id)}}">
		@csrf
		<input required type="password" name="oldPass" class="form-control" placeholder="Old password">
		<input required type="password" name="newPass1" class="form-control" placeholder="New password">
		<input required type="password" name="newPass2" class="form-control" placeholder="Retype new password">
		<button class="btn btn-primary" type="submit">Wijzig</button>
	</form>

</div>

@endsection