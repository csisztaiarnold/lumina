@extends('admin.layout')

@section('title', env('SITE_TITLE') . ' - ' . __('Login'))

@section('content')

    <h3><span class="material-symbols-outlined">docs</span> {{ __('Posts') }}</h3>

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
                    <td>{{ $post->title }}</td>
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
