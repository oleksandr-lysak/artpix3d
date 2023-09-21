<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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


$router->get('employees',  ['uses' => 'EmployeeController@index']);
$router->get('machines', 'MachineController@index');
$router->post('assign', 'WorkHistoryController@assignMachine');
$router->post('unassign', 'WorkHistoryController@unassignMachine');
$router->get('employee/info/{id}', 'EmployeeController@info');
$router->get('machine/info/{id}', 'MachineController@info');
$router->get('employee/history/{id}', 'EmployeeController@history');
$router->get('machine/history/{id}', 'MachineController@history');
