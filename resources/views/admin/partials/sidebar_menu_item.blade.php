@foreach($nav_items as $nav_item)
    <li>
        <a href="">{{ $nav_item->title }}</a>
        @if($nav_item->children->isNotEmpty())
            <ul>
                @include('admin.partials.sidebar_menu_item', ['nav_items' => $nav_item->children, 'level' => $level + 1])
            </ul>
        @endif
    </li>
@endforeach
