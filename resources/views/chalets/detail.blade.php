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
            <p class="noMargin"><b>Waar is chalet {{ $chalet->name }} te vinden?</b></p>
            <p class="noMargin">{{ $chalet->street }} {{ $chalet->housenr }}, {{ $chalet->place }}</p>
            <p>{{ $chalet->country }}</p>
            <a href="{{ url('bookings/create?chalet=' . $chalet->id) }}" class="btn btn-success booking-btn">Boeken</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
    <?php
        $name = $chalet->name;
        $country = $chalet->country;
        $housenr = $chalet->housenr;
        $street  = $chalet->street;
        $place = $chalet->place;
    ?>
            
    <iframe width="100%" height="350" src="https://maps.google.com/maps?width=720&height=600&hl=nl&q=<?=$street ?? ''?>%20<?=$housenr ?? ''?>%2C%20<?=$place ?? ''?>%2C%20<?=$country ?? ''?>s+(<?=$name ?? ''?>)&ie=UTF8&t=&z=18&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
</div>

@endsection