<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Response;
use App\Http\Controllers\JobController;

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

// $router->get('/', function () use ($router) {
//     return response()->json(['name' => 'Abigail', 'state' => 'CA']);

// });

// $router->get('job', function ()  {
//     return view('job');
// });

$router->get('job', 'JobController@show');

$router->post('job', 'JobController@create');
