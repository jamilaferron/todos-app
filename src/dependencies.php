<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    // db connection
	$container['dbConnection'] = function ($c) {
		$settings = $c->get('settings')['db'];
		$db = new PDO($settings['host'] . $settings['dbName'], $settings['userName']);
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
		return $db;
	};

    $container['ToDosController'] = new \ToDos\Factories\ToDosControllerFactory();
	$container['AddToDoTaskController'] = new \ToDos\Factories\AddToDoTaskControllerFactory();
	$container['AddToDoListController'] = new \ToDos\Factories\AddToDoListControllerFactory();
	$container['ToDosTasksModel'] = new \ToDos\Factories\ToDosTasksModelFactory();
	$container['ToDosListsModel'] = new \ToDos\Factories\ToDosListsModelFactory();

	$container['CompleteToDoTaskController'] = new \ToDos\Factories\CompleteToDoTaskControllerFactory();
	$container['DeleteToDoTaskController'] = new \ToDos\Factories\DeleteToDoTaskControllerFactory();
};
