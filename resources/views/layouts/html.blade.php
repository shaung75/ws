<!DOCTYPE html>
<html lang="en"> 
  <head>
    <title>{{isset($title) ? $title . ' | ' : ''}}White &amp; Sentance</title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="CRM for White &amp; Sentance"
    />
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media" />
    <link rel="shortcut icon" href="favicon.ico" />
    <script defer src="/assets/plugins/fontawesome/js/all.min.js"></script>
    <link id="theme-style" rel="stylesheet" href="/assets/css/portal.css" />
  </head>

	<body class="app {{$bodyClass ?? ''}}">

    @yield('header')  	

    @yield('body')

    @auth
 
      <!-- Javascript -->          
      <script src="/assets/plugins/popper.min.js"></script>
      <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

      <!-- Charts JS -->
      <script src="/assets/plugins/chart.js/chart.min.js"></script> 
      <script src="/assets/js/index-charts.js"></script> 
      
      <!-- Page Specific JS -->
      <script src="/assets/js/app.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

      <script>
        $('.datePick').datepicker({});
      </script>

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaZwaFP3kfe3w5AG7MgYcgV12PT-Q4JFg&callback=initMap&v=weekly" defer></script>
    @endauth

	</body>
</html> 