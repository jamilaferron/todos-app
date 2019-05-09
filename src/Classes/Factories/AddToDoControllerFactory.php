<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\AddToDoController;

class AddToDoControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$toDosModel = $container->get('ToDosModel');
		return new AddToDoController($toDosModel);
	}
}