@extends('templates.dev_layout')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<div class="container" style="margin-top: 75px;">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="margin-bottom: 0;">
                                @foreach ($errors->all() as $error)
                                <li style="list-style-type: none;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br/> 
                    @endif

                    @if ($alert = Session::get('alertSuccess'))
                        <div class="alert alert-success">
                            <p>{{ $alert }}</p>
                        </div>
                    @endif

                    @if ($alert = Session::get('alertDanger'))
                        <div class="alert alert-danger">
                            <p>{{ $alert }}</p>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as {{ Auth::user()->name }}!

                    <br><br>

                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                 
                        </tr>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i') }}</td>
                            <td><a href="{{ url('account/edit?account=' . $user->id) }}" style="color:gold; cursor: pointer;">Wijzigen</a></td>
                            <td><a onclick="hiddenValue({{ $user->id }})" style="color: red; cursor: pointer;" data-toggle="modal" data-target="#myModal">Verwijderen</a></td>
                        </tr>
                    @endforeach

                    </table>

                    <a href="{{ url('/register') }}">Register new account</a>

                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
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

<script>

    //id meegeven aan hidden type in form zodat je hem in de backend kunt gebruiken

    function hiddenValue(hiddenid){
        document.getElementById("hiddenvalue").value = hiddenid;
    }

</script>

@endsection