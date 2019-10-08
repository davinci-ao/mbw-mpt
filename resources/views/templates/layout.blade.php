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
    <link rel="shortcut icon" type="image/png" href="favicon/favicon.png"/>

    <!-- Link to JS -->

    <!-- Google fonts -->

    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- FONTAWESOME -->

    <script src="https://kit.fontawesome.com/a1912e8d76.js" crossorigin="anonymous"></script>

</head>

<body>

<div id="menu">
  <v-app id="inspire" class="header-menu">
    <div>
      <v-toolbar class="header-menu">
        <v-toolbar-title class="header-title" href="{{ url('home') }}">Mooiplekjetexel.nl</v-toolbar-title>
  
        <div class="flex-grow-1"></div>
  
        <v-toolbar-items>
          <v-btn text href="{{ url('home') }}">Home</v-btn>
          <v-btn text href="{{ url('chalets') }}">Chalets</v-btn>
          <v-btn text href="{{ url('contact') }}">Contact</v-btn>
          @if (Auth::check())
          <v-btn text href="{{ url('account') }}"><i class="far fa-user-circle"></i></v-btn>         
          <v-btn text href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i></v-btn>
          @endif

        </v-toolbar-items>
      </v-toolbar>
    </div>
  </v-app>
</div>

<div id="slider">
  <v-app id="inspire">
    <v-carousel>
      <v-carousel-item
        v-for="(item,i) in items"
        :key="i"
        :src="item.src"
      ></v-carousel-item>
    </v-carousel>
  </v-app>
</div>

<!-- CONTENT -->


@yield('content')



<!-- FOOTER -->

<div id="footer">
  <v-app id="inspire">
    <v-footer
      color="main-color lighten-1"
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
          class="main-color lighten-2 py-4 text-center white--text"
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



</body>
</html>