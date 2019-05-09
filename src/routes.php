<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'ToDosController');
	$app->get('/addToDo', 'AddToDoController');
//	$app->post('/addToDo', );
};
