@extends('templates.layout')

@section('title', 'Chalets')
@section('content')
@if ($alert = Session::get('alert'))
        <div class="alert alert-success">
            <p>{{ $alert }}</p>
        </div>
    @endif
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

<h1>Chalets</h1>

@if (Auth::check())
   <a class="btn btn-primary add-btn-chalets" href="{{ URL::to('chalets/create') }}">Voeg chalet toe</a>
@endif

@foreach ($chaletData as $chalet)

  <div class="card w-100 chalet-card">
    <div class="card-body">
      <div class="chalet-text">
        <h5 class="card-title chalet-title">Chaletnaam: {{ $chalet->name }}</h5>
        <p class="card-text">Beschrijving: {{ $chalet->description}}</p>
        <p class="card-text">Prijs: {{ $chalet->price}}</p>
        <p class="card-text">Straat: {{ $chalet->street}}</p>
        <p class="card-text">Nummer: {{ $chalet->housenr}}</p>
        <p class="card-text">Plaats: {{ $chalet->place}}</p>
        <p class="card-text">Land: {{ $chalet->country}}</p>
        <a href="{{ url('bookings/create?chalet=' . $chalet->id) }}" class="btn btn-primary" style="margin-top: 10px;">Boeken</a>
      </div>

      <?php
    $name = $chalet->name;
    $country = $chalet->country;
    $housenr = $chalet->housenr;
    $street  = $chalet->street;
    $place = $chalet->place;
  ?>

      <div class="maps">
        <iframe width="100%" height="350" src="https://maps.google.com/maps?width=720&height=600&hl=nl&q=<?=$street ?? ''?>%20<?=$housenr ?? ''?>%2C%20<?=$place ?? ''?>%2C%20<?=$country ?? ''?>s+(<?=$name ?? ''?>)&ie=UTF8&t=&z=18&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe>
      </div>

        <!-- Code voor het Google maps kaartje -->   


  <!-- only show edit button when logged in -->

    <div class="chalet-buttons">

      @if (Auth::check())
        <a href="{{ route('chalets.edit',$chalet->id)}}" class="btn btn-primary chalet-edit-btn">Edit</a>
      @endif  

  <!-- only show delete button when logged in -->

      @if (Auth::check())
        <form action="{{ route('chalets.destroy',$chalet->id)}}" method="post">
          @csrf
          @method('DELETE') 
          <button class="btn btn-danger chalet-delete-btn" type="submit">Delete</button>
        </form>
      @endif
      </div>

    </div>
  </div>

@endforeach
@endsection



