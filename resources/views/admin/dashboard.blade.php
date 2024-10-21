@extends('admin.layout')

@section('title', env('SITE_TITLE') . ' - ' . __('Login'))

@section('content')

    <div class="dashboard">
        <h1>{{ env('SITE_TITLE') }}</h1>
        <h2>{{ __('Administration') }}</h2>

        @include('admin.navigation')

        <div class="content">
            <h3>{{ __('Dashboard') }}</h3>
            <p>{{ __('Welcome to the administration area.') }}</p>
        </div>
    </div>

@endsection
