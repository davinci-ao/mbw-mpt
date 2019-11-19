@extends('templates.dev_layout')

@section('title', 'Berichtenlijst')
@section('content')

<div class="container" style="margin-top: 75px; font-size: 12px">

    <h1 style="margin-bottom: 20px;">Berichten</h1>

<!--         <div class="form-group">
        <input style="margin-top: 25px;" class="form-control" type="text" name="searchMessages" placeholder="Zoeken...">
    </div>
-->
    <table class="table table-bordered">
        <tr>
            <th>Nr.</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>Telefoon</th>
            <th>Bericht</th>
            <th>Gemaakt op</th>
            <th></th>
        </tr>
        @foreach ($messages as $message)
        <tr>
            <td>{{ $message->id }}</td>
            <td>{{ $message->firstname }}</td>
            <td>{{ $message->lastname }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->phonenumber }}</td>
            <td>{{ $message->message }}</td>
            <td>{{ $message->created_at }}</td>
            <td><a style="color: red;" href="{{ url('contact/delete?message=' . $message->id) }}">Verwijderen</a></td>
        </tr>
        @endforeach
    </table>

    <!-- pagination links -->

    {{ $messages->links() }}

</div>

@endsection