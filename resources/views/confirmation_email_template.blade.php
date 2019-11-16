<b>Naam:</b> {{ $data['firstname'] }} {{$data['lastname']}}
<br>
<b>Email:</b> {{ $data['email'] }}
<br>
<b>Telefoon:</b> {{$data['telephone_number']}}

<br>

<p>
<b>Aankomst</b> {{$data['arrival']}} om {{ $data['check_in'] }} <br>
<b>Vetrek</b> {{$data['departure']}} om {{$data['check_out']}}  <br>
<br>
  U heeft geresveerd voor {{$data['people']}} personen en {{$data['pets']}} huisdieren. <br>
  De totaalprijs is {{$data['price']}} voor chalet {{$data['chalet']}} <br>

</p>
