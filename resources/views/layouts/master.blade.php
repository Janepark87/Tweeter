<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Let’s hear what dogs are talking about. Join Bowwow today.">
    <meta name="author" content="JanePark Jeonghyeon Park">
    <meta name="Distribution" content="Wowbow - See what’s happening in the world right now" />
    <meta name="Copyright" content="Copyright JanePark Bowwow 2018." />

    <title>Tweeter</title>

    {{-- Favicon --}}
    <link rel="icon" href="/img/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
    <link rel="icon" sizes="192x192" href="/img/icon.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/android-icon-192x192.png">

    {{-- Bootstrap core CSS --}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom styles for this template --}}
    <link href="/css/offcanvas.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />

  </head>

  <body class="bg-light">

    @include('layouts.nav')

    <main role="main" class="container">
            @yield('editprofile')

        <div class="row">
            @yield('sign')

            <div class="col-12 col-md-4 d-flex flex-column">
                <div class="">
                    @yield('main-sideprofile')
                    @yield('sideInprofile')
                </div>

                <div class="">
                    @yield('userprofilelist')
                </div>
            </div>

            <div class="col-12 col-md-8">
                @yield('content')
            </div>
        </div>
    </main>


    <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/js/jquery-slim.min.js"><\/script>')</script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/holder.min.js"></script>
    <script src="/js/offcanvas.js"></script>

  </body>
</html>
