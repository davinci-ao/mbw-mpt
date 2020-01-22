@extends('templates.layout')

@section('title', 'Chalets')
@section('content')

<div class="row">
    <div class="col-sm-6 noPadding">
        <div class="detail-text">
            <h1>{{ $chalet->name }}</h1>
            <p>Beschrijving: {{ $chalet->description }}</p>
            <p>Waar is chalet {{ $chalet->name }} te vinden?</p>
            <p>Straat: {{ $chalet->street }}</p>
            <p>Nummer: {{ $chalet->housenr }}</p>
            <p>Plaats: {{ $chalet->place }}</p>
            <p>Land: {{ $chalet->country }}</p>
        </div>
    </div>

    <div class="col-sm-6 noPadding">
        <div class="detail-images">
            <h1>Sfeerimpressie</h1>
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('chaletsafbeeldingen/'.$chalet->photo1) }}" fancybox alt="" class="detail-image">
                </div>
            <div class="col-sm-6">
                <img src="{{ asset('chaletsafbeeldingen/'.$chalet->photo2) }}" alt="" class="detail-image">
            </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('chaletsafbeeldingen/'.$chalet->photo3) }}" alt="" class="detail-image">
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('chaletsafbeeldingen/'.$chalet->photo4) }}" alt="" class="detail-image">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 noPadding">
        <h1>Chalet {{ $chalet->name }} boeken?</h1>
        <a href="{{ url('bookings/create?chalet=' . $chalet->id) }}" class="btn btn-primary">Boeken</a>
    </div>
</div>

@endsection