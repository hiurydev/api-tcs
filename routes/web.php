<?php

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
    return [
        'api' => 'hiuryzinho',
        'version' => '0.1'
    ];
});

$router->post('/api/login', 'Auth\Api\LoginController@login');

$router->group(['middleware' => 'user_auth'], function () use ($router) {
    $router->post('/api/logout', 'Auth\Api\LoginController@logout');
});


$router->post('/api/register', 'Auth\Api\RegisterController@register');

$router->group(['prefix' => '/api', 'middleware' => 'user_auth'], function () use ($router)  {

    $router->get('/alunos', 'AlunoController@index');
    $router->get('/alunos/{id}', 'AlunoController@show');
    $router->post('/alunos', 'AlunoController@store');
    $router->post('/alunos/{id}', 'AlunoController@update');
    $router->delete('/alunos/{id}', 'AlunoController@destroy');

});
