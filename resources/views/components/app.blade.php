<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __(' Gestion de scolarité') }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <!-- Fonts
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    -->
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('lib/gritter/css/jquery.gritter.css') }}" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('lib/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css') }}" />

    <!-- *******************************************************************************
        section pour les import css
        **************************************************************************** -->
    @yield('stylecss')

</head>

<body>
    <section id="container" >

        <!-- *******************************************************************************
      inclure le navbar
        **************************************************************************** -->
        @include('partials.Navbar')

        <!-- *******************************************************************************
        inclure le sidebare
        **************************************************************************** -->

        @include('partials.Sidebare')

        <!-- *******************************************************************************
        inclure le contenu de la page
        **************************************************************************** -->
        <section id="main-content">
            <section class="wrapper">
                @yield('content')
            </section>
        </section>

        <!-- *******************************************************************************
        inclure le pied de page
        **************************************************************************** -->
        <footer class="site-footer">


        </footer>


    </section>

    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('lib/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/jquery.sparkline.js') }}"></script>
    <!--common script for all pages-->
  <script src="{{ asset('lib/common-scripts.js') }}"></script>

    <script type="text/javascript" src="{{ asset('lib/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/gritter-conf.js') }}"></script>

    
    <!-- *******************************************************************************
        la section des import javascript
        **************************************************************************** -->

        @yield('styleJs')
    
</body>

</html>
