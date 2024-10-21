@extends('admin.layout')

@section('title', env('SITE_TITLE') . ' - ' . __('Login'))

@section('content')

    <div class="login">
        <h1>{{ env('SITE_TITLE') }}</h1>
        <h2>{{ __('Administration') }}</h2>

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <div class="email">
                <label for="email"><span class="material-symbols-outlined">mail</span> Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="password">
                <label for="password"><span class="material-symbols-outlined">key</span> Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit">Login <span class="material-symbols-outlined">arrow_right_alt</span></button>
            </div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection

