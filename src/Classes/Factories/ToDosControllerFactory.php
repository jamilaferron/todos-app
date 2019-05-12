<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\ToDosController;

class ToDosControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$renderer = $container->get('renderer');
		$toDosTasksModel = $container->get('ToDosTasksModel');
		$toDosListsModel = $container->get('ToDosListsModel');
		return new ToDosController($renderer, $toDosTasksModel, $toDosListsModel);
	}
}