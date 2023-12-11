<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>PeopleFone | RIN2</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset('assets/stylesheets/styles.css') }}" />
	<style>
		.invalid-feedback{
			color:red;
			position: absolute;
			margin: 5px;
		}
		.is-invalid{
			border: 1px solid red;
		}
		.form-group{
			margin-bottom: 30px;
		}
	</style>
</head>
<body>
	@yield('body')

	<script src="{{ asset('assets/scripts/frontend.js') }}" type="text/javascript"></script>
</body>
</html>