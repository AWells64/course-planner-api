<?php

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
 });



	
