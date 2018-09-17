<?php

$router->post("courses", "Courses@store");
$router->get("courses", "Courses@index");



$router->group(['middleware' => ['api','cors']], function ($router) {
    $router->post('auth/register', 'Auth\RegisterController@create');
 });
