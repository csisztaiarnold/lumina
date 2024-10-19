@php
    $current_uri_exploded = explode('/', Illuminate\Support\Facades\Request::path());
    $id_from_uri = null;
    if ($current_uri_exploded[0] === 'post') {
        $id_from_uri = $current_uri_exploded[2];
    }
@endphp
<nav class="container">
    <ul>
        @foreach($parentPosts as $nav_item)
            <li>
                <a href="{{ route('post.show', ['slug' => $nav_item->title_slug, 'id' => $nav_item->id]) }}"
                   title="{{ $nav_item->title }}"
                   id="menu-item-{{ $nav_item->id }}"
                   class="menu-item @if((int)$id_from_uri === $nav_item->id || (is_null($id_from_uri) && $nav_item->id == $home_post_id)) active @endif">
                    {{ $nav_item->title }}
                </a>
                @if($nav_item->children->isNotEmpty())
                    <ul class="sublevel sublevel-1">
                        @include('partials.menu_item', ['nav_items' => $nav_item->children, 'id_from_uri' => $id_from_uri, 'level' => 2])
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
