<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Get home.
$router->get('/', [
    'as' => 'home',
    'uses' => 'PostController@showHome'
]);

// Show a single post.
$router->get('/post/{slug}/{id}', [
    'as' => 'post.show',
    'uses' => 'PostController@showPost'
]);
