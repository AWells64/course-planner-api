<?php

$router->group(["prefix" => "courses"], function ($router) {
	$router->post("", "Courses@store");
	$router->get("", "Courses@index");

    $router->put("{course}", "Courses@update");
    $router->delete("{course}", "Courses@destroy");
});



