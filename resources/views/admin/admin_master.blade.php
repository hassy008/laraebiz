<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>@yield('title')</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="{{asset('public/admin/')}}/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="{{asset('public/admin/')}}/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="{{asset('public/admin/')}}/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="{{asset('public/admin/')}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="{{asset('public/admin/')}}/css/style.css" rel="stylesheet" />
   <link href="{{asset('public/admin/')}}/css/style-responsive.css" rel="stylesheet" />
   <link href="{{asset('public/admin/')}}/css/style-default.css" rel="stylesheet" id="style_color" />
   <link href="{{asset('public/admin/')}}/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="{{asset('public/admin/')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

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
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">

  
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
      @include('admin.includes.header')
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        @include('admin.includes.sidebar')
      </div>
      <!-- END SIDEBAR -->
  

      <!-- BEGIN PAGE -->  
      <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid"> 
            @yield('mainContent')
        </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Metro Lab Dashboard.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="{{asset('public/admin/')}}/js/jquery-1.8.3.min.js"></script>
   <script src="{{asset('public/admin/')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="{{asset('public/admin/')}}/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="{{asset('public/admin/')}}/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <script src="{{asset('public/admin/')}}/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="{{asset('public/admin/')}}/assets/bootstrap/js/bootstrap.min.js"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="{{asset('public/admin/')}}/js/excanvas.js"></script>
   <script src="{{asset('public/admin/')}}/js/respond.js"></script>
   <![endif]-->

   <script src="{{asset('public/admin/')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="{{asset('public/admin/')}}/js/jquery.sparkline.js" type="text/javascript"></script>
   <script src="{{asset('public/admin/')}}/assets/chart-master/Chart.js"></script>
   <script src="{{asset('public/admin/')}}/js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="{{asset('public/admin/')}}/js/common-scripts.js"></script>

   <!--script for this page only-->

   <script src="{{asset('public/admin/')}}/js/easy-pie-chart.js"></script>
   <script src="{{asset('public/admin/')}}/js/sparkline-chart.js"></script>
   <script src="{{asset('public/admin/')}}/js/home-page-calender.js"></script>
   <script src="{{asset('public/admin/')}}/js/home-chartjs.js"></script>



   <script src="{{asset('public/admin/')}}/ckeditor/ckeditor.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>