@foreach($nav_items as $nav_item)
    <li>
        <a href="{{ route('post.show', ['slug' => $nav_item->title_slug, 'id' => $nav_item->id]) }}"
           title="{{ $nav_item->title }}" id="menu-item-{{ $nav_item->id }}"
           class="menu-item @if($id_from_uri === $nav_item->id) active @endif">
            {{ $nav_item->title }}
            @if($nav_item->children->isNotEmpty())
                ›
            @endif
        </a>
        @if($nav_item->children->isNotEmpty())
            <ul class="sublevel sublevel-{{ $level }}">
                @include('partials.menu_item', ['nav_items' => $nav_item->children, 'id_from_uri' => $id_from_uri, 'level' => $level + 1])
            </ul>
        @endif
    </li>
@endforeach
