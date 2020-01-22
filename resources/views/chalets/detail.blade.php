@extends('templates.layout')

@section('title', 'Chalets')
@section('content')

<div class="row">
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

    <div class="col-sm-6 noPadding">
        <div class="detail-text">
            <h1>{{ $chalet->name }}</h1>
            <p>{{ $chalet->description }}</p>
            <p><b>Waar is chalet {{ $chalet->name }} te vinden?</b></p>
            <p>{{ $chalet->street }} {{ $chalet->housenr }}, {{ $chalet->place }}</p>
            <p>{{ $chalet->country }}</p>
            <a href="{{ url('bookings/create?chalet=' . $chalet->id) }}" class="btn btn-success booking-btn">Boeken</a>
        </div>
    </div>
</div>

@endsection