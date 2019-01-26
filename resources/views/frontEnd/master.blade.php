<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/frontEnd/') }}/images/favicon.png">
    <link href="{{ asset('public/frontEnd/css') }}/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('public/frontEnd/css') }}/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('public/frontEnd/css') }}/prettyPhoto.css" rel="stylesheet">
    <link href="{{ asset('public/frontEnd/css') }}/price-range.css" rel="stylesheet">
    <link href="{{ asset('public/frontEnd/css') }}/animate.css" rel="stylesheet">
	<link href="{{ asset('public/frontEnd/css') }}/main.css" rel="stylesheet">
	<link href="{{ asset('public/frontEnd/css') }}/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('public/frontEnd/') }}/js/html5shiv.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('public/frontEnd/') }}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('public/frontEnd/') }}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('public/frontEnd/') }}/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('public/frontEnd/') }}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('public/frontEnd/') }}/images/ico/apple-touch-icon-57-precomposed.png">

   <!--for delete query begin -->
   <script type="text/javascript">
      function checkDelete(){
         chk=confirm('Are You Sure To Delete??');
         if (chk) {
            return true;
         } else{
            return false;
         }
      }
   </script>

<!--for delete query end -->

    
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		@include('frontEnd.includes.header')	
	</header><!--/header-->
	
	<section>
	    @yield('mainContent')
	</section>
	
	<footer id="footer"><!--Footer-->
		@include('frontEnd.includes.footer')
	</footer><!--/Footer-->
	

  
    <script src="{{ asset('public/frontEnd/') }}/js/jquery.js"></script>
	<script src="{{ asset('public/frontEnd/') }}/js/bootstrap.min.js"></script>
	<script src="{{ asset('public/frontEnd/') }}/js/jquery.scrollUp.min.js"></script>
	<script src="{{ asset('public/frontEnd/') }}/js/price-range.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/jquery.prettyPhoto.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/main.js"></script>
</body>
</html>