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
            <td>{{ $data->check_in }}</td>
            <td>{{ $data->check_out }}</td>
            <td>{{ $data->arrival }}</td>
            <td>{{ $data->departure }}</td>
            <td>{{ $data->people }}</td>
            <td>{{ $data->pets }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $data->chalet }}</td>
            <td><a style="color: red;" href="{{ url('bookings/delete?bookings=' . $data->id) }}">Verwijderen</a></td>
        </tr>
        @endforeach
    </table>

      <!-- pagination links -->

      {{ $bookingData->links() }}

</div>





  
@endsection
