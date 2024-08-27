<?php
// use App\Http\Controllers\TodoController;

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->get('/todo', 'TodoController::class@index');

// $router->group(['prefix' => 'todo'], function () use ($router) {
//     $router->get('/index', 'TodoController@index');
//     $router->get('/{id}}', 'TodoController@show');
//     $router->post('/create', 'TodoController@store');
//     $router->put('/update/{id}', 'TodoController@update');
//     $router->delete('/update/{id}', 'TodoController@destroy');
// });

$router->get('/todo', 'TodoController@index');
$router->get('/todo/{id}', 'TodoController@show');
$router->post('/todo', 'TodoController@store');
$router->put('/todo/{id}', 'TodoController@update');
$router->delete('/todo/{id}', 'TodoController@destroy');
