@extends('layouts.dashboard')
@section('title', 'User Settings')

@section('content')
<div class="col-sm-12">
<form method="POST" action="{{ route('user.update', $user) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" placeholder="Enter your full name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <label>Notification Setting</label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="notification_switch" value="1" {{ $user->notification_switch ? 'checked' : '' }}> Read Notifications
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone No</label>
                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" value="{{ $user->phone_number }}" name="phone_number" placeholder="Enter your phone number">
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </div>
        </div>
    </form>
</div>


@endsection