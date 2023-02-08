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
    return $router->app->version();
});
// Création du groupr api : http://localhost:8000/api/
$router->group(['prefix' => 'api'], function () use ($router) {

//authentification ajouter les lignes ci-dessous
    
    //inscription
    // api/register
    $router->post('register', 'AuthController@register');
    // api/login
    $router->post('login', 'AuthController@login');
    // api/logout
    $router->post('logout', 'AuthController@logout');
    // api/refresh
    $router->post('refresh', 'AuthController@refresh');
    // api/me
    $router->post('me', 'AuthController@me');
    // Toutes les tâches
    $router->get('taches',  ['uses' => 'TacheController@showAllTasks']);

    // Détail d'une tâche
    $router->get('taches/{id}', ['uses' => 'TacheController@showOneTask']);

    // Ajout d'une tâche
    $router->post('taches', ['uses' => 'TacheController@create']);

    // Suppression d'une tâche
    $router->delete('taches/{id}', ['uses' => 'TacheController@delete']);

    // Modification d'une tâche
    $router->put('taches/{id}', ['uses' => 'TacheController@update']);

    // Fermeture ou Ouverture d'une tâche
     $router->put('taches/{id}/complet', ['uses' => 'TacheController@completed']);
});