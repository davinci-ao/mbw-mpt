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
      <v-form
        class="contact_form"
        method="post"
        action="{{ url('/contact/store') }}"
      >
      @csrf

        <v-text-field
          value="{{ old('firstname') }}"
          :counter="50"
          label="Voornaam"
          name="firstname"
        ></v-text-field>

        <v-text-field
          value="{{ old('lastname') }}"
          :counter="50"
          label="Achternaam"
          name="lastname"
        ></v-text-field>

        <v-text-field
          value="{{ old('email') }}"
          label="E-mail"
          name="email"
        ></v-text-field>

        <v-text-field
          value="{{ old('phonenumber') }}"
          label="Telefoonnummer"
          name="phonenumber"
        ></v-text-field>

        <v-textarea
          value="{{ old('message') }}"
          :counter="300"
          label="Onderwerp"
          name="message"
        ></v-textarea>
  	
        <v-btn onclick="test()" class="default-button" name="submitForm" type="submit">Versturen</v-btn>
    </v-form>
  </div>
</div>

<script>
  function test(){

  }
</script>

@endsection