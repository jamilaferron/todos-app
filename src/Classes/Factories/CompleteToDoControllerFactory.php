<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\CompleteToDoController;

class CompleteToDoControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$toDosModel = $container->get('ToDosModel');
		return new CompleteToDoController($toDosModel);
	}
}