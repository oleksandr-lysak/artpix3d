<?php

use Illuminate\Support\Facades\Route;

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


Route::group(function () {
    Route::get('employees',  'EmployeeController@index');
    Route::get('employee/info/{id}', 'EmployeeController@info');
    Route::get('employee/history/{id}', 'EmployeeController@history');
});

Route::group(function () {
    Route::get('machines', 'MachineController@index');
    Route::get('machine/info/{id}', 'MachineController@info');
    Route::get('machine/history/{id}', 'MachineController@history');
});

Route::group(function () {
    Route::post('assign/{employeeId}/{machineId}', 'WorkHistoryController@assignMachine');
    Route::post('unassign/{employeeId}/{machineId}', 'WorkHistoryController@unassignMachine');
});





