@php
    $current_uri_exploded = explode('/', Illuminate\Support\Facades\Request::path());
    $id_from_uri = null;
    if($current_uri_exploded[0] === 'post') {
        $id_from_uri = $current_uri_exploded[2];
    }
@endphp
<nav class="container">
    <ul>
        <li>
            <a href="/" title="{{ __('Home') }}" class="menu-item">{{ __('Home') }}</a>
        </li>
        @foreach($parentPosts as $post)
            <li>
                <a href="{{ route('post.show', ['slug' => $post->title_slug, 'id' => $post->id]) }}" title="{{ $post->title }}"
                   class="menu-item @if((int)$id_from_uri === $post->id) active @endif">{{ $post->title }}</a>
                @if($post->children->isNotEmpty())
                    <ul>
                        @include('partials.menu_item', ['posts' => $post->children, 'id_from_uri' => $id_from_uri])
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
