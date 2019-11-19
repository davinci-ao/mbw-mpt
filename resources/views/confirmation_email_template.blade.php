<b>Naam:</b> {{ $data['firstname'] }} {{$data['lastname']}}
<br>
<b>Email:</b> {{ $data['email'] }}
<br>
<b>Telefoon:</b> {{$data['telephone_number']}}

<br>

<p>
<b>Aankomst</b> {{ Carbon\Carbon::parse($data['arrival'])->format('d-m-Y') }} om {{ $data['check_in'] }} <br>
<b>Vetrek</b> {{ Carbon\Carbon::parse($data['departure'])->format('d-m-Y') }} om {{ $data['check_out'] }}  <br>
<br>
  U heeft geresveerd voor {{$data['people']}} personen en {{$data['pets']}} huisdieren. <br>
  De totaalprijs is €{{$data['price']}} voor chalet {{$data['chalet']}} <br>

</p>
