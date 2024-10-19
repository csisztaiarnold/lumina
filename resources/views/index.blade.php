@extends('layout')

@section('title', env('SITE_TITLE') . ' - ' . $post->title)

@section('header')

@endsection

@section('content')
    <article>
        <h2>{{ $post->title }}</h2>
        @if($post->subtitle)
            <h3>{{ $post->subtitle }}</h3>
        @endif
        <div class="content">{!! $post->content !!}</div>
    </article>
@endsection

