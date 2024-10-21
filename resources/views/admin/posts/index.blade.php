@extends('admin.layout')

@section('title', env('SITE_TITLE') . ' - ' . __('Login'))

@section('content')
    <div class="posts-container">
        <div class="sidebar">
            @include('admin.partials.sidebar', ['posts' => $posts])
        </div>
        <div class="post">
            Posts
        </div>
    </div>
@endsection
