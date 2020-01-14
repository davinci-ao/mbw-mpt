@extends('templates.dev_layout')
@section('title', 'Beheerpagina | MPT')
@section('content')

<!-- Main CSS-->
<link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Vul uw wachtwoord in om te bevestigen.</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" action="{{ url('/account/delete') }}">
                            @csrf
                            <input id="hiddenvalue" type="hidden" name="userId">
                            <input required class="form-control" type="password" name="password" placeholder="Wachtwoord">
                            <br>
                            <button type="submit" class="btn btn-danger" name="delete">Verwijderen</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Vul uw wachtwoord in om te bevestigen.</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                
                    <button type="submit" class="btn btn-danger" name="delete">Verwijderen</button>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->

        <!-- END HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content" style="">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <h1>Accounts <a href="{{ url('/register') }}"><i class="fa fa-plus" aria-hidden="true"></i></a></h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                            
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>Naam</th>
                                            <th>E-mail</th>
                                            <th>Bewerk</th>
                                            <th>Verwijderen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userData as $user)
                                        <tr>
                                            <td>{{ $user->name}}</td>
                                            <td>{{ $user->email}}</td>
                                            <td><a href="{{ url('account/edit?account=' . $user->id) }}" style="color:orange; font-size: 20px; cursor: pointer;"><i class="fas fa-edit"></i></a></td>
                                            <td><a onclick="hiddenValue({{ $user->id }})" style="color: red; font-size:20px; cursor: pointer;" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $userData->links() }}
                        </div>
                        
                                <div class="container-fluid">
                                    <h1>Chalets <a  href="{{ URL::to('chalets/create') }}"><i class="fa fa-plus" aria-hidden="true"></i></a></h1>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive table--no-card m-b-30">

                                                <table class="table table-borderless table-striped table-earning">
                                                    <thead>
                                                        <tr>
                                                            <th>Chaletnaam</th>
                                                            <th>Beschrijving</th>
                                                            <th>Prijs</th>
                                                            <th>Land</th>
                                                            <th>Huisnummer</th>
                                                            <th>Straat</th>
                                                            <th>Plaats</th>
                                                            <th>Bewerk</th>
                                                            <th>Verwijderen</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($chaletData as $chalet)
                                                        <tr>
                                                            <td>{{ $chalet->name}}</td>
                                                            <td>{{ $chalet->description }}</td>
                                                            <td>{{ $chalet->price }}</td>
                                                            <td>{{ $chalet->country}}</td>
                                                            <td>{{ $chalet->housenr}}</td>
                                                            <td>{{ $chalet->street }}</td>
                                                            <td>{{ $chalet->place}}</td>
                                                            <td><a style="color: orange; font-size: 20px;" href="{{ route('chalets.edit',$chalet->id)}}"><i class="fas fa-edit"></i></a></td>
                                                            <td>
                                                                <form action="{{ route('chalets.destroy',$chalet->id)}}" method="post">
                                                                    @csrf @method('DELETE')
                                                                    <button style=" color: red; font-size: 20px; margin: 5px; float: left;" onclick="return confirm('Weet je het zeker dat je deze chalet wil verwijderen?');" type="submit"><i class="fas fa-trash-alt"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{ $chaletData->links() }}
                                        </div>

                                        <div class="container-fluid">
                                            <h1>Vakantieparken <a href="{{ URL::to('holidayparks/create') }}"  ><i class="fa fa-plus" aria-hidden="true"></i></a></h1>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive table--no-card m-b-30">
                                                        <table class="table table-borderless table-striped table-earning">
                                                            <thead>
                                                                <tr>
                                                                    <th>Parknaam</th>
                                                                    <th>Beschrijving</th>
                                                                    <th>Bewerk</th>
                                                                    <th>Verwijderen</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($holidayData as $holiday)
                                                                <tr>
                                                                    <td>{{ $holiday->holidaypark_name}}</td>
                                                                    <td>{{ $holiday->description }}</td>
                                                                    <td><a style=" font-size: 20px; color:orange; padding: 5px;" href="{{ route('holidayparks.edit',$holiday->id)}}"><i class="fas fa-edit"></i></a> </td>
                                                                    <td>
                                                                        <form action="{{ route('holidayparks.destroy',$holiday->id)}}" method="post">
                                                                            @csrf @method('DELETE')
                                                                            <button style="color: red; margin: 5px; font-size: 20px; float: left;" onclick="return confirm('Weet je het zeker dat je dit vakantiepark wil verwijderen?');" type="submit"><i class="fas fa-trash-alt"></i></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{ $holidayData->links() }}
                                                </div>
                              <hr>
                             <div class="container-fluid">
                            <h1>Boekingen</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>Voornaam</th>
                                                    <th>Achternaam</th>
                                                    <th>E-mail</th>
                                                    <th>telefoonnummer</th>
                                                    <th>Check-in tijd</th>
                                                    <th>Check-uit tijd</th>
                                                    <th>Aankomst</th>
                                                    <th>Vertrek</th>
                                                    <th>Aantal personen</th>
                                                    <th>Huisdieren</th>
                                                    <th>Prijs</th>
                                                    <th>Chalet</th>
                                                    <th>Bewerk</th>
                                                    <th>Verwijderen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bookingData as $data)
                                                <tr>
                                                    <td>{{ $data->firstname}}</td>
                                                    <td>{{ $data->lastname }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->telephone_number}}</td>
                                                    <td>11 uur</td>
                                                    <td>12 uur</td>
                                                    <td>{{ Carbon\Carbon::parse($data->arrival)->format('d-m-Y') }}</td>
                                                    <td>{{ Carbon\Carbon::parse($data->departure)->format('d-m-Y') }}</td>
                                                    <td>{{ $data->people }}</td>
                                                    <td>{{ $data->pets }}</td>
                                                    <td>{{ $data->price }}</td>
                                                    <td>{{ $data->chalet }}</td>
                                                    <td><a style="color: orange; font-size: 20px;" href="{{ route('bookings.edit',$data->id)}}"><i class="fas fa-edit"></i></a></td>
                                                    <td><a style="color: red;font-size: 20px;" onclick="return confirm('Weet je het zeker dat je deze boeking wil verwijderen?');" href="{{ url('booking/delete?booking=' . $data->id) }}"><i class="fas fa-trash-alt"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>         
                                    </div>
                                    {{ $bookingData->links() }}
                                </div>
                            <div class="container-fluid">
                            <h1>Berichten</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>Voornaam</th>
                                                    <th>Achternaam</th>
                                                    <th>E-mail</th>
                                                    <th>telefoonnummer</th>
                                                    <th>Bericht</th>
                                                    <th>Verwijderen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($messageData as $message)
                                                <tr>
                                                    <td>{{ $message->firstname}}</td>
                                                    <td>{{ $message->lastname }}</td>
                                                    <td>{{ $message->email }}</td>
                                                    <td>{{ $message->phonenumber}}</td>
                                                    <td style=" td.width: 50px;">{{ $message->message }}</td>
                                                    <td><a style="color: red; font-size: 20px;" onclick="return confirm('Weet je het zeker dat je dit bericht wil verwijderen?');" href="{{ url('contact/delete?message=' . $message->id) }}"><i class="fas fa-trash-alt"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>         
                                    </div>
                                    {{ $messageData->links() }}
                                </div>
                                
</body>
<script>
    //id meegeven aan hidden type in form zodat je hem in de backend kunt gebruiken

    function hiddenValue(hiddenid) {
        document.getElementById("hiddenvalue").value = hiddenid;
    }
</script>

</html>
<!-- end document-->
@endsection