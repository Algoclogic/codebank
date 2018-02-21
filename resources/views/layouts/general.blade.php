<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CodeBank') }}</title>

    @include('layouts.header')

  </head>

  <body class="nav-md" style="background-color: #37518c !important">
    <div class="container body">
      <div class="main_container">
        
        <!-- page content -->

        @yield('content')
        
        <!-- /page content -->

        @include('layouts.footer')
      </div>
    </div>    
	
  </body>
</html>