<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    <!-- WARNING: this will impact performance. remove when deploying to production -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>Mooiplekjetexel.nl</title>

    <!-- Vuetify CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">

    <!-- Link to JS -->

    <!-- BOOTSTRAP -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- FONTAWESOME -->

    <script src="https://kit.fontawesome.com/a1912e8d76.js" crossorigin="anonymous"></script>

    <!-- Name of the page -->

    <title>@yield('title', 'Mooiplekjetexel.nl')</title>

</head>

<body>

<div id="menu">
  <v-app id="inspire">
    <div>
      <v-toolbar>
        <v-toolbar-title>Mooiplekjetexel.nl</v-toolbar-title>
   
        <div class="flex-grow-1"></div>
  
        <v-toolbar-items>
          @if (Auth::check())
          <div class="dropdown" style="padding-top: 13px;">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acties
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ url('home') }}">Home</a>
              <a class="dropdown-item" href="{{ url('contact/list') }}">Berichten</a>
              <a class="dropdown-item" href="{{ url('#') }}">Actie log</a>
            </div>
          </div>
            <v-btn text href="{{ url('account') }}">Account &nbsp;<i class="far fa-user-circle"></i></v-btn>  
            <v-btn text href="{{ url('logout') }}">Uitloggen &nbsp;<i class="fas fa-sign-out-alt"></i></v-btn>   
          @else
            <v-btn text href="{{ url('home') }}">Home</v-btn>
            <v-btn text href="{{ url('chalets') }}">Chalets</v-btn>
            <v-btn text href="{{ url('contact') }}">Contact</v-btn>
          @endif
        </v-toolbar-items>

      </v-toolbar>
    </div>
  </v-app>
</div>


<!-- CONTENT -->


@yield('content')



<!-- FOOTER -->

<div id="footer">
  <v-app id="inspire">
    <v-footer
      color="primary lighten-1"
      padless
    >
      <v-row
        justify="center"
        no-gutters
      >
        <v-btn
          v-for="link in links"
          :key="link"
          color="white"
          text
          rounded
          class="my-2"
        >
          @{{ link }}
        </v-btn>
<!--         <v-card-text>
          <v-btn
            v-for="icon in icons"
            :key="icon"
            class="mx-4 white--text"
            icon
          >
            <v-icon size="24px" color="white">@{{ icon }}</v-icon>
          </v-btn>
        </v-card-text> -->
        <v-col
          class="primary lighten-2 py-4 text-center white--text"
          cols="12"
        >
          @{{ new Date().getFullYear() }} — <strong>Mooiplekjetexel.nl</strong>
        </v-col>
      </v-row>
    </v-footer>
  </v-app>
</div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>