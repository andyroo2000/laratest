<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Andrew's Super-Cool Blog</title>
	<link rel="stylesheet" href="/css/all.css"/>
</head>

@include('partials/nav-bar')

<body>
	<div class="container">
		@include('flash::message')
		@yield('content')
	</div>

	<script src="/js/all.js"></script>

	<script>
		$('div.alert').not('alert_important').delay(3000).slideUp(300);
//		$('#flash-overlay-modal').modal();
	</script>

	@yield('footer')
</body>
</html>