@foreach($posts as $post)
    <li>
        <a href="{{ route('post.show', ['slug' => $post->title_slug, 'id' => $post->id]) }}" title="{{ $post->title }}"
           class="menu-item @if($id_from_uri === $post->id) active @endif">{{ $post->title }}</a>
        @if($post->children->isNotEmpty())
            <ul>
                @include('partials.menu_item', ['posts' => $post->children, 'id_from_uri' => $id_from_uri])
            </ul>
        @endif
    </li>
@endforeach
