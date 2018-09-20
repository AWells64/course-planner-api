<?php

$router->group(['middleware' => ['auth:api','cors'], "prefix" => "courses"], function ($router) {
    $router->post("{course}/save", "Courses@storeToUser");
    $router->get("fetch", "Courses@indexFromUser");
    $router->delete("{course}/remove", "Courses@destroyFromUser");
    $router->patch("{course}/complete", "Courses@markComplete");
 });


$router->group(["prefix" => "courses"], function ($router) {
	$router->post("", "Courses@store");
	$router->get("", "Courses@index");
    $router->get("{course}", "Courses@show");
    $router->put("{course}", "Courses@update");
    $router->patch("{course}", "Courses@markComplete");
    $router->delete("{course}", "Courses@destroy");
});

$router->group(['middleware' => ['api','cors']], function ($router) {
    $router->post('auth/register', 'Auth\RegisterController@create');
    $router->post('auth/login', 'Auth\LoginController@apiLogin');
 });
    
 
 