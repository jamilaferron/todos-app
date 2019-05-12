<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\DeleteToDoTaskController;

class DeleteToDoTaskControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$toDosModel = $container->get('ToDosTasksModel');
		return new DeleteToDoTaskController($toDosModel);
	}
}