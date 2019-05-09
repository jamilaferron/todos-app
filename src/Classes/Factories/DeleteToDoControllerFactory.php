<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\DeleteToDoController;

class DeleteToDoControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$toDosModel = $container->get('ToDosModel');
		return new DeleteToDoController($toDosModel);
	}
}