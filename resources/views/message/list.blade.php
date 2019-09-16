<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mooi Plekje Texel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container" style="margin-top: 25px; font-size: 12px">
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

    </div>

</body>
</html>
