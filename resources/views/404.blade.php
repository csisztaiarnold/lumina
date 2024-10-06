@extends('layout')

@section('title', 'Home Page')

@section('header')
    <h1>{{ __('Something went wrong') }}</h1>
@endsection

@section('content')
    <div class="404_error">
        {{ __('It seems that this post does not exist.') }}<br />
        {{ __('Sorry.') }}<br />
    </div>
@endsection

