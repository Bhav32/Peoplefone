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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
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
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{{ asset('assets/scripts/frontend.js') }}" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

	<script>
		function markAsRead(notification) {
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			
			$.ajax({
				url: '/mark-as-read',
				type: 'POST',
				dataType: 'json',
				data: notification, 
				headers: {
					'X-CSRF-TOKEN': csrfToken
				},
				success: function (data) {
					console.log(data);
					alert('Notification marked as read!');
					var unreadCount = parseInt($('#unread-notifications-count').text());
                	$('#unread-notifications-count').text(--unreadCount);
					$("#notification-"+notification['id']).css('display', 'none');
					if(unreadCount == 0){
						$("#end-notification").text('No Notification to show');
					}
				},
				error: function (error) {
					console.log(error.responseJSON.message);
					alert('Error: '+error.responseJSON.message);
				}
			});
		}
	</script>

</body>
</html>