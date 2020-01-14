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

    <!-- Vuetify CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
    <link rel="shortcut icon" type="image/png" href="/favicon/favicon.png"/>

    <!-- Link to JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Google fonts -->

    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- FONTAWESOME -->

    <script src="https://kit.fontawesome.com/a1912e8d76.js" crossorigin="anonymous"></script>

    <!-- CUSTOM JS INCLUDES FROM PAGE -->
    @yield('head_js')

    <title>@yield('title', 'Mooiplekjetexel.nl')</title>

</head>

<body>

<div id="menu">
  <v-app id="inspire" class="header-menu">
    <div>
      <v-toolbar class="header-menu" style="color: white; text-decoration: none;">
        <v-toolbar-title class="header-title"><a  href="{{ url('home') }}">Mooiplekjetexel.nl</a></v-toolbar-title>
  
        <div class="flex-grow-1"></div>
  
        <v-toolbar-items style="color: black; text-decoration: none;">
          <v-btn text class="menu-items ce_menu" href="{{ url('home') }}">Home</v-btn>
          <v-btn text class="menu-items ce_menu" href="{{ url('holidayparks') }}">Vakantieparken</v-btn>
          <v-btn text class="menu-items ce_menu" href="{{ url('contact') }}">Contact</v-btn>
          @if (Auth::check())
          <v-btn text href="{{ url('admin') }}">{{ Auth::user()->name }} &nbsp;<i class="far fa-user-circle"></i></v-btn>         
          <v-btn text href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i></v-btn>
          @endif

        </v-toolbar-items>
      </v-toolbar>
    </div>
  </v-app>
</div>


<!-- CONTENT -->
<div class="content_container custom-padding-top">

@yield('content')

</div>
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
        <v-btn class="my-2 primary" href="/home" rounded white--text>Home</v-btn>
        <v-btn class="my-2 primary" href="/holidayparks" rounded>Vakantieparken</v-btn>
        <v-btn class="my-2 primary" href="/contact" rounded>Contact</v-btn>
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

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script>
  function checkSubmit(btn){
    btn.disabled = true;
    btn.form.submit();
  }
</script>
@yield('bottom_js')

</body>
</html>

