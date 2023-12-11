<!-- resources/views/users/index.blade.php -->

@extends('layouts.dashboard')

@section('title', 'User List')

@section('content')
    
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Unread Notifications</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->unread_notifications  }}</td>
                    <td><a href="">Impersonate</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
