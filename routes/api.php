<?php

$router->group(["prefix" => "courses"], function ($router) {
	$router->post("", "Courses@store");
	$router->get("", "Courses@index");


    $router->get("{course}", "Courses@show");
    $router->put("{course}", "Courses@update");
    $router->delete("{course}", "Courses@destroy");
});



	