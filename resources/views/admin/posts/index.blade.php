@extends('admin.layout')

@section('title', env('SITE_TITLE') . ' - ' . __('Posts'))

@section('content')

    <h3><span class="material-symbols-outlined">docs</span> {{ __('Posts') }}</h3>

    <div class="breadcrumbs">
        <div class="breadcrumb_item">
            <a href="{{ route('admin.posts.index', ['id' => 0]) }}" title="{{ __('Root') }}"> {{ __('Root') }}</a>
        </div>
        @foreach($hierarchy as $parent)
            <div class="breadcrumb_item">
                <span class="material-symbols-outlined">chevron_right</span>
                <a href="{{ route('admin.posts.index', ['id' => $parent->id]) }}" title="{{ $parent->title }}">{{ $parent->title }}</a>
            </div>
        @endforeach
        @if($current_post)
        <div class="breadcrumb_item">
            <span class="material-symbols-outlined">chevron_right</span>
            <a href="{{ route('admin.posts.index', ['id' => $current_post->parent_id]) }}" title="{{ $current_post->title }}">{{ $current_post->title }}</a>
        </div>
        @endif
    </div>

    <div class="posts">
        @if(count($posts) > 0)
        <table class="posts-list">
            <thead>
                <tr>
                    <th class="id">{{ __('ID') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th colspan="3" class="actions">{{ __('Actions') }}</th>
                </tr>
            </thead>
            @foreach($posts as $post)
                <tr>
                    <td class="id">{{ $post->id }}</td>
                    <td>{{ $post->title }} @if($post->children_count > 0)({{ $post->children_count }} {{ $post->children_count > 1 ? __('children posts') : __('child post') }})@endif</td>
                    <td class="subcontent">
                        <a href="{{ route('admin.posts.index', ['id' => $post->id]) }}" }} title="{{ __('Subcontent') }}"><span class="material-symbols-outlined">subdirectory_arrow_right</span></a>
                    </td>
                    <td class="edit">
                        <a href="{{ route('admin.posts.index', ['id' => $post->id]) }}" }} title="{{ __('Edit Post') }}"><span class="material-symbols-outlined">edit</span></a>
                    </td>
                    <td class="edit">
                        <a href="{{ route('admin.posts.index', ['id' => $post->id]) }}" }} title="{{ __('Delete') }}"><span class="material-symbols-outlined">delete</span></a>
                    </td>
                </tr>
            @endforeach
        </table>
        @else
        <div class="message notification">
            {{ __('No posts yet.') }}
        </div>
        @endif
    </div>

@endsection
