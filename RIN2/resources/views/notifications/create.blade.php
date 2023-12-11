@extends('layouts.dashboard')
@section('title', 'Create New Notification')

@section('content')
<div class="col-sm-12">
    <form method="POST" action="{{ route('notifications.store') }}">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group ">
                    <label>Type</label>
                    <select class="form-control @error('type') is-invalid @enderror" name="type">
                        <option value="">Select</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Invoices">Invoices</option>
                        <option value="System">System</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group ">
                    <label>Notification Content</label>
                    <input class="form-control  @error('short_text') is-invalid @enderror" name="short_text" 
                    placeholder="Enter text" value="{{ old('short_text')}}">
                    @error('short_text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </div>

            <div class="col-lg-6">
                <div class="form-group ">
                    <label for="expiration">Expiration</label>
                    <input class="form-control @error('expiration') is-invalid @enderror" type="datetime-local" 
                    name="expiration" id="expiration"  value="{{ old('expiration')}}">
                    @error('expiration')
                        <span class="invalid-feedback m-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group ">
                    <label>Select Users</label>
                    <select class="form-control @error('user_id') is-invalid @enderror " name="user_id" id="destination">
                        <option value="all">Select ALL</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
            </div>
        </div>
    </form>
</div>
@endsection