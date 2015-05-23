<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Andrew's Super-Cool Blog</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		@include('flash::message')
		@yield('content')
	</div>

	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<script>
		$('div.alert').not('alert_important').delay(3000).slideUp(300);
//		$('#flash-overlay-modal').modal();
	</script>

	@yield('footer')
</body>
</html>