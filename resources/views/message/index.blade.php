@extends('templates.layout')

@section('content')

<div class="container" style="padding-top: 25px; padding-bottom: 30px;">

	@if ($alert = Session::get('alert'))
        <div class="alert alert-success">
            <p>{{ $alert }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin-bottom: 0;">
                @foreach ($errors->all() as $error)
                <li style="list-style-type: none;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
    @endif

	<h1>Neem contact met ons op</h1>

<div id="form">
	@csrf
    <v-form
      class="contact_form"
    >

      <v-text-field
        v-model="firstname"
        :counter="50"
        label="Voornaam"
        name="firstname"
      ></v-text-field>

      <v-text-field
        v-model="lastname"
        :counter="50"
        label="Achternaam"
        name="lastname"
      ></v-text-field>

      <v-text-field
        v-model="email"
        label="E-mail"
        name="email"
      ></v-text-field>

      <v-text-field
        v-model="phone"
        label="Telefoonnummer"
        name="phonenumber"
      ></v-text-field>

      <v-textarea
        v-model="subject"
        :counter="300"
        label="Onderwerp"
        name="message"
      ></v-textarea>
	
      <v-btn class="default-button" name="submitForm" type="submit">Versturen</v-btn>
    </v-form>
</div>

</div>

@endsection