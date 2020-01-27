@extends('templates.layout')

@section('title', 'Berichten')
@section('content')

<div class="container" style="padding-top: 25px; padding-bottom: 30px;">

	@if ($alert = Session::get('alert'))
        <div class="alert alert-success">
            <p>{{ $alert }}</p>
        </div>
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
          label="Voornaam *"
          name="firstname"
        ></v-text-field>
        @if ($errors->first('firstname'))
          <small style="color: darkred;">{{$errors->first('firstname')}}</small>
        @endif

        <v-text-field
          value="{{ old('lastname') }}"
          :counter="50"
          label="Achternaam *"
          name="lastname"
        ></v-text-field>
        @if ($errors->first('lastname'))
          <small style="color: darkred;">{{$errors->first('lastname')}}</small>
        @endif

        <v-text-field
          value="{{ old('email') }}"
          label="E-mail *"
          name="email"
        ></v-text-field>
        @if ($errors->first('email'))
          <small style="color: darkred;">{{$errors->first('email')}}</small>
        @endif

        <v-text-field
          value="{{ old('phonenumber') }}"
          label="Telefoonnummer *"
          name="phonenumber"
        ></v-text-field>
        @if ($errors->first('phonenumber'))
          <small style="color: darkred;">{{$errors->first('phonenumber')}}</small>
        @endif

        <v-textarea
          value="{{ old('message') }}"
          :counter="300"
          label="Bericht *"
          name="message"
        ></v-textarea>
        @if ($errors->first('message'))
          <small style="color: darkred;">{{$errors->first('message')}}</small><br><br><br>
        @endif
  	
        <v-btn onclick="checkSubmit(this)" class="default-button" type="button">Versturen</v-btn>
    </v-form>
  </div>
</div>

@endsection