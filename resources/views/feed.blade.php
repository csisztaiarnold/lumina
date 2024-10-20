@extends('layout')

@section('title', env('SITE_TITLE') . ' - ' . $post->title)

@section('header')

@endsection

@section('content')
    <article>
        <h2>{{ $post->title }}</h2>

        <div class="feeds">
            @if(count($feed) > 0)
                <div class="pagination">
                    {{ $feed->links('partials.custom_pagination') }}
                </div>

                @foreach($feed as $feed_item)
                    <h3>{{ $feed_item->title }}</h3>
                    <div class="content">{!! $feed_item->content !!}</div>
                @endforeach

                <div class="pagination">
                    {{ $feed->links('partials.custom_pagination') }}
                </div>
            @endif
        </div>
    </article>
@endsection

