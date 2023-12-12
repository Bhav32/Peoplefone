@extends('layouts.plane')

@section('body')
 <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url ('') }}"><i class="fa fa-home fa-fw"></i> PeopleFone | RIN2</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <span class="badge badge-danger">{{ $UnreadNotificationsCount }}</span> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    @if(isset($notifications) && count($notifications) > 0)
                        @foreach($notifications as $notification)
                        <li class="alert alert-{{ $getBadgeClassByType($notification->type) }}" style="margin-bottom:0px;">
                            <a href="#">
                                <div class="row">
                                    <span> {{ $notification->text }} </span>
                                </div>
                               <div style="margin: 10px 0; height: 3px;">
                                    <span class="pull-left badge badge-{{ $getBadgeClassByType($notification->type) }}">
                                        {{ $notification->type }}
                                    </span>
                                    <span class="pull-right text-muted small"> {{ $notification->time_ago }}</span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    @else
                    <h4 class="text-center">No Notifications to show</h4>
                    @endif
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="{{ route('notifications.index') }}">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ route('user.edit', ['user' => Auth::user()]) }}"><i class="fa fa-gear fa-fw"></i> User Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        Admin Dashboard
                        <!--<div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>-->
                    </li>
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-envelope fa-fw"></i> Notification<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="{{ request()->is('notifications/create') ? 'active' : '' }}">
                                <a href="{{ route('notifications.create') }}"><i class="fa fa-envelope fa-fw"></i> New Notification</a>
                            </li>
                            <li class="{{ request()->is('notifications') ? 'active' : '' }}">
                                <a href="{{ route('notifications.index') }}"><i class="fa fa-list fa-fw"></i>Notification List</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="{{ request()->is('user') ? 'active' : '' }}">
                                <a href="{{ route('user.index') }}"><i class="fa fa-user fa-fw"></i>User List</a>
                            </li>
                            <li class="{{ request()->is('user/*/edit') ? 'active' : '' }}">
                                <a href="{{ route('user.edit', ['user' => Auth::user()]) }}"><i class="fa fa-gear fa-fw"></i>User Settings</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
            <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">@yield('title')</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">  
            @yield('content')
        </div>
        <!-- /#page-wrapper -->
    </div>
</div>
@stop

