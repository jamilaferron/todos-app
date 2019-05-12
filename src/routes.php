<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'ToDosController');



	$app->post('/addToDo', 'AddToDoTaskController');
	$app->post('/addToDoList', 'AddToDoListController');

	$app->post('/completeToDo', 'CompleteToDoTaskController');
	$app->post('/deleteToDo', 'DeleteToDoTaskController');
};
