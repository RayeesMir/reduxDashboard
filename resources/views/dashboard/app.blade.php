<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reduxpress Dashboard</title>

  <!-- Using Assets Class In blade To Include Css and Javascript -->

<link rel="stylesheet" href="{!! URL::asset('css/bootstrap.min.css') !!}">
<link rel="stylesheet" href="{!! URL::asset('css/styles.css') !!}">
     
      <!--  Including Fonts and icons     -->

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

      <!--End of Icons Block-->

<!-- Including Javascript in  -->

<script src="{!! URL::asset('js/lumino.glyphs.js') !!}"></script>

<!--[if lt IE 9]>
<script src="{!! URL::asset('js/lumino.glyphs.js') !!}"></script>
<script src="{!! URL::asset('js/lumino.glyphs.js') !!}"></script>
<![endif]-->
@yield('other_style')
</head>
<body>
    @include('dashboard.dashboardtemplate') 
    <div class="col-sm-9 col-sm-offset-2 col-lg-offset-2">
      @yield('maincontent')
    </div>
    
  
  
  <!--<script src="{!! asset('js/jquery-1.11.1.min.js') !!}"></script>
  <script src="{!! asset('js/bootstrap.min.js') !!}"></script> -->  
<script src="{!! URL::asset('js/chart.min.js') !!}"></script>  
<script src="{!! URL::asset('js/chart-data.js') !!}"></script>  
<script src="{!! URL::asset('js/easypiechart.js') !!}"></script>
<script src="{!! URL::asset('js/easypiechart-data.js') !!}"></script>
<script src="{!! URL::asset('js/bootstrap-datepicker.js') !!}"></script>
<script src="{!! URL::asset('js/jquery-1.11.1.min.js') !!}"></script> 
<script src="{!! URL::asset('js/bootstrap.js') !!}"></script> 
<script src="{!! URL::asset('js/bootstrap-table.js') !!}"></script> 
<script src="{!! URL::asset('js/main.js') !!}"></script>   
  
  <script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
            $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
  </script> 
  @yield('other_scripts')
</body>

</html>
