@php
    $nav = \App\Models\Post::where('is_published', '1')
        ->where('parent_id', 0)
        ->with('children')
        ->get();
@endphp

<ul class="sidebar-menu">
    @foreach($nav as $nav_item)
        <li>
            <a href="">{{ $nav_item->title }}</a>
            @if($nav_item->children->isNotEmpty())
                <ul>
                    @include('admin.partials.sidebar_menu_item', ['nav_items' => $nav_item->children, 'level' => 2])
                </ul>
            @endif
        </li>
    @endforeach
</ul>

