@extends('templates.layout')

@section('content')

<!-- @foreach ($chaletData as $chalet) -->

<!-- <div id="calendar">
  <v-app id="inspire">
    <v-row class="fill-height">
      <v-col align-center>
        <v-sheet height="64" max-width= "850">
          <v-toolbar flat color="white" max-width= "850">
            <v-btn outlined class="mr-4" @click="setToday">
              Vandaag
            </v-btn>
            <v-btn fab text small @click="prev">
              <v-icon small>mdi-chevron-left</v-icon>
            </v-btn>
            <v-btn fab text small @click="next">
              <v-icon small>mdi-chevron-right</v-icon>
            </v-btn>
            <v-toolbar-title>@{{ title }}</v-toolbar-title>
            <div class="flex-grow-1"></div>
            <v-menu bottom right>
              <template v-slot:activator="{ on }">
                <v-btn
                  outlined
                  v-on="on"
                >
                  <span>@{{ typeToLabel[type] }}</span>
                  <v-icon right>mdi-menu-down</v-icon>
                </v-btn>
              </template>
              <v-list>
                <v-list-item @click="type = 'day'">
                  <v-list-item-title>Dag</v-list-item-title>
                </v-list-item>
                <v-list-item @click="type = 'week'">
                  <v-list-item-title>Week</v-list-item-title>
                </v-list-item>
                <v-list-item @click="type = 'month'">
                  <v-list-item-title>Maand</v-list-item-title>
                </v-list-item>
              </v-list>
            </v-menu>
          </v-toolbar>
        </v-sheet>
        <v-sheet height="500" max-width="850">
          <v-calendar
            ref="calendar"
            v-model="focus"
            color="primary"
            :events="events"
            :event-color="getEventColor"
            :event-margin-bottom="3"
            :now="today"
            :type="type"
            locale="nl"
            format="24hr"
            @click:event="showEvent"
            @click:more="viewDay"
            @click:date="viewDay"
            @change="updateRange"
          ></v-calendar>
          <v-menu
            v-model="selectedOpen"
            :close-on-content-click="false"
            :activator="selectedElement"
            full-width
            offset-x
          >
            <v-card
              color="grey lighten-4"
              min-width="350px"
              flat
            >
              <v-toolbar
                :color="selectedEvent.color"
                dark
              >
                <v-btn icon>
                  <v-icon>mdi-pencil</v-icon>
                </v-btn>
                <v-toolbar-title v-html="selectedEvent.name"></v-toolbar-title>
                <div class="flex-grow-1"></div>
                <v-btn icon>
                  <v-icon>mdi-heart</v-icon>
                </v-btn>
                <v-btn icon>
                  <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
              </v-toolbar>
              <v-card-text>
                <span v-html="selectedEvent.details"></span>
              </v-card-text>
              <v-card-actions>
                <v-btn
                  text
                  color="secondary"
                  @click="selectedOpen = false"
                >
                  Cancel
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-menu>
        </v-sheet>
      </v-col>
    </v-row>
  </v-app>
</div> -->
<!-- @endforeach -->

<h4>Chalet Data:</h4>

<!-- only show create button when logged in -->

@if (Auth::check())
  <a class="btn btn-primary" href="{{ URL::to('chalets/create') }}">voeg Chalet toe</a>
  <hr>
@endif

@foreach ($chaletData as $chalet)
  
  <td>Chaletnaam: {{ $chalet->name }}</td><br>
  <td>Beschijving: {{ $chalet->description}}</td><br> 
  <td>Prijs: {{ $chalet->price}}</td><br>
  <td>Land: {{ $chalet->country}}</td><br>
  <td>Huisnummer: {{ $chalet->housenr }}{{ $chalet->addition }}</td><br>
  <td>Straat: {{ $chalet->street}}</td><br>
  <td>Plaats: {{ $chalet->place}}</td><br>
  <td>lengtegraad: {{ $chalet->longitude}}</td><br>
  <td>breedtegraad: {{ $chalet->latitude}}</td><br>
    <?php
   $name = $chalet->name;
   $country = $chalet->country;
   $housenr = $chalet->housenr;
   $street = $chalet->street;
   $place = $chalet->place;

   ?>

  <!-- only show edit button when logged in -->
  @if (Auth::check())
    <a href="{{ route('chalets.edit',$chalet->id)}}" class="btn btn-primary">Edit</a>
  @endif  

  <!-- only show delete button when logged in -->

  @if (Auth::check())
    <form action="{{ route('chalets.destroy',$chalet->id)}}" method="post">
      @csrf
      @method('DELETE') 
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>
    <hr>
  @endif

@endforeach


 <main style="text-align: center;" >

  <div style="width: 720px">
  <iframe width="720" height="600" src="https://maps.google.com/maps?width=720&height=600&hl=nl&q=<?=$street?>%20<?=$housenr?>%2C%20<?=$place?>%2C%20<?=$country?>s+(<?=$name?>)&ie=UTF8&t=&z=18&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
  </iframe></div><br />
 </main>
  
 
@endsection



