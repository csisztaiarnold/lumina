@extends('layout')

@section('title', env('SITE_TITLE') . ' - ' . $post->title)

@section('header')

@endsection

@section('content')
    <div class="feeds">

        <h2>{{ $post->title }}</h2>

        @if(count($feed) > 0)

            {{ $feed->links('partials.custom_pagination') }}

            @foreach($feed as $feed_item)
                <article class="feed-item">
                    <h3>
                        <a href="{{ route('post.show', ['slug' => $feed_item->title_slug, 'id' => $feed_item->id]) }}">{{ $feed_item->title }}</a>
                    </h3>
                    <div
                        class="created_at">{{ $feed_item->created_at->locale(app()->getLocale())->isoFormat('LL') }}</div>
                    <div class="introduction">{!! $feed_item->introduction !!}</div>
                    <div class="read_more"><a
                            href="{{ route('post.show', ['slug' => $feed_item->title_slug, 'id' => $feed_item->id]) }}">{{ __('Read more › ') }}</a>
                    </div>
                </article>
            @endforeach

            {{ $feed->links('partials.custom_pagination') }}

        @else
            <div class="message notification">
                {{ __('No posts yet.') }}
            </div>
        @endif

    </div>
@endsection

