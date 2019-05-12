<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\AddToDoListController;

class AddToDoListControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$toDosModel = $container->get('ToDosListsModel');
		return new AddToDoListController($toDosModel);
	}
}