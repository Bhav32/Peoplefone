<!-- resources/views/users/index.blade.php -->

@extends('layouts.home')

@section('title', 'Notification List')

@section('content')
<div class="panel">
	<div class="row">
		
		@if(isset($notifications) && count($notifications) > 0)
        @foreach($notifications as $notification)
		<div class="col-sm-3 col-xs-3">
		    <div class="alert alert-{{ $getBadgeClassByType($notification->type) }}">
		        <h4> 
					<span class="badge badge-{{ $getBadgeClassByType($notification->type) }}"> 
						{{ ucwords($notification->type) }}
					</span> 
				</h4>
                <p>
                    {{ $notification->text }}
		        </p>
		        <hr class="message-inner-separator">
                
					<strong>Expiration:</strong> {{ $notification->expiration }}
				
				<span class="pull-right">
					<a href=""><i class="fa fa-edit fa-fw fa-2"></i></a>
					<a href="javascript:void(0);" onclick="confirmDelete({{ $notification->id }})">
						<i class="fa fa-trash fa-fw fa-2"></i>
					</a>
				</span>
		    </div>
		</div>
        @endforeach
		@else
			<h4 class="text-center">No Notifications to show</h4>
        @endif
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function confirmDelete(notificationId) {
        if (confirm('Are you sure you want to delete this notification?')) {
			axios.delete(`{{ url('notifications') }}/${notificationId}`)
                .then(response => {
                    window.location.reload(); // Refresh the page or update the UI as needed
                })
                .catch(error => {
                    // Handle error, e.g., show an error message
                    console.error('Error deleting notification:', error);
                });
        }
    }
</script>
@endsection
