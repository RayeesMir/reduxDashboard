<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reduxpress Login</title>

<link href="{!!URL::asset('css/bootstrap.min.css')!!}" rel="stylesheet">
<link href="{!!URL::asset('css/datepicker3.css')!!}" rel="stylesheet">
<link href="{!!URL::asset('css/styles.css')!!}" rel="stylesheet">

<!--[if lt IE 9]>
<script src="{!!URL::asset('js/html5shiv.js')!!}"></script>
<script src="{!!URL::asset('js/respond.min.js')!!}"></script>
<![endif]-->

</head>
<body id="login-page">
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<img src="images/smalllogo.png" alt="logo" class="img-responsive">
				<div class="panel-heading">LOG IN</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<a href="" class="btn btn-primary">Login</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="{!!URL::asset('js/jquery-1.11.1.min.js')!!}"></script>
	<script src="{!!URL::asset('js/bootstrap.min.js')!!}"></script>
	<script src="{!!URL::asset('js/chart.min.js')!!}"></script>
	<script src="{!!URL::asset('js/chart-data.js')!!}"></script>
	<script src="{!!URL::asset('js/easypiechart.js')!!}"></script>
	<script src="{!!URL::asset('js/easypiechart-data.js')!!}"></script>
	<script src="{!!URL::asset('js/bootstrap-datepicker.js')!!}"></script>
	<script type="text/javascript">
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
</body>

</html>
