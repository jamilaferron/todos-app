<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\CompleteToDoTaskController;

class CompleteToDoTaskControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$toDosModel = $container->get('ToDosTasksModel');
		return new CompleteToDoTaskController($toDosModel);
	}
}