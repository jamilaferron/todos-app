<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\AddToDoTaskController;

class AddToDoTaskControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$toDosModel = $container->get('ToDosTasksModel');
		return new AddToDoTaskController($toDosModel);
	}
}