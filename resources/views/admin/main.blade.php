<main class="container">
    @if (Illuminate\Support\Facades\Request::segment(1) !== 'login')
        <h1>{{ env('SITE_TITLE') }}</h1>
        <h2>{{ __('Administration') }}</h2>

        @include('admin.navigation')
    @endif

    @yield('content')
</main>
