<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\AddToDoController;

class AddToDoControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$renderer = $container->get('renderer');
		return new AddToDoController($renderer);
	}
}