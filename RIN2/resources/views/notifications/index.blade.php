<!-- resources/views/users/index.blade.php -->

@extends('layouts.dashboard')

@section('title', 'Notification List')

@section('content')
<div class="panel">
	<div class="row">
        @foreach($notifications as $notification)
		<div class="col-sm-4 col-xs-4">
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
                <strong> {{ $notification->expiration }}</strong>
		    </div>
		</div>
        @endforeach
	</div>
</div>

@endsection
