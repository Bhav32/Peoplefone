@extends('layouts.home')
@section('title','Dashboard')

@section('content')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-3">
                <div class="alert alert-info">
                        <h3><i class="fa fa-bell fa-fw"></i> New Notifications</h3>
                        <hr/>
                        <a href="{{ route('notifications.create') }}" class="btn btn-primary">Click here to open</a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="alert alert-info">
                        <h3><i class="fa fa-bell fa-fw"></i> Notification List</h3>
                        <hr/>
                        <a href="{{ route('notifications.index') }}" class="btn btn-primary">Click here to open</a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="alert alert-info">
                        <h3><i class="fa fa-user fa-fw"></i> User List</h3>
                        <hr/>
                        <a href="{{ route('user.index') }}" class="btn btn-primary">Click here to open</a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="alert alert-info">
                        <h3><i class="fa fa-gear fa-fw"></i> User Settings</h3>
                        <hr/>
                        <a href="{{ route('user.edit', ['user' => Auth::user()]) }}" class="btn btn-primary">Click here to open</a>
                </div>
            </div>
        </div>
    </div>
@stop
