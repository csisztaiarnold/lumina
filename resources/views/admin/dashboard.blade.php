@extends('admin.layout')

@section('title', env('SITE_TITLE') . ' - ' . __('Login'))

@section('content')

    <div class="dashboard">
        <div class="content">
            <h3>{{ __('Dashboard') }}</h3>
            <p>{{ __('Welcome to the administration area.') }}</p>
        </div>
    </div>

@endsection
