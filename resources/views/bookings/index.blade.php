@extends('templates.dev_layout')

@section('content')

<div class="container" style="margin-top: 75px; font-size: 12px">

    <h1 style="margin-bottom: 20px;">Boekingen</h1>

<!--         <div class="form-group">
        <input style="margin-top: 25px;" class="form-control" type="text" name="searchMessages" placeholder="Zoeken...">
    </div>
-->
    <table class="table table-bordered">
        <tr>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>email</th>
            <th>telefoonnummer</th>
            <th>Check-in tijd</th>
            <th>Check-uit tijd</th>
            <th>aankomst</th>
            <th>Vertrek</th>
            <th>Aantal personen</th>
            <th>Huisdieren</th>
            <th>Prijs</th>
            <th>Chalet</th>
        </tr>
        @foreach ($bookingData as $data)
        <tr>
            <td>{{ $data->firstname}}</td>
            <td>{{ $data->lastname }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->telephone_number}}</td>
            <td>{{ Carbon\Carbon::createFromFormat('H:i:s',$data->check_in)->format('H:i') }}</td>
            <td>{{ Carbon\Carbon::createFromFormat('H:i:s',$data->check_out)->format('H:i') }}</td>
            <td>{{ Carbon\Carbon::parse($data->arrival)->format('d-m-Y') }}</td>
            <td>{{ Carbon\Carbon::parse($data->departure)->format('d-m-Y') }}</td>
            <td>{{ $data->people }}</td>
            <td>{{ $data->pets }}</td>
            <td>€{{ $data->price }}</td>
            <td>{{ $data->chalet }}</td>
            <td><a style="color: orange;" href="{{ route('bookings.edit',$data->id)}}">bewerk</a></td>
            <td><a style="color: red;" onclick="return confirm('Weet je het zeker dat je deze boeking wil verwijderen?');" href="{{ url('booking/delete?booking=' . $data->id) }}">Verwijderen</a></td>
        </tr>
        @endforeach
    </table>

      <!-- pagination links -->

      {{ $bookingData->links() }}

</div>





  
@endsection
