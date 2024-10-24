<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

/**
 * Class containing methods related to user authentication.
 */
class AuthController extends Controller
{
    /**
     * @var Post
     */
    protected Post $post;

    /**
     * PostController constructor.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Show the login form.
     *
     * @return Factory|View|Application
     */
    public function showLoginForm(): Factory|View|Application
    {
        $home_post_id = $this->post->where('is_home', 1)->value('id');
        return view('admin.login', ['home_post_id' => $home_post_id]);
    }

    /**
     * Logs the user into the application.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Logs the user out of the application.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
