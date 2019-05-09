<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\ToDosController;

class ToDosControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$renderer = $container->get('renderer');
		return new ToDosController($renderer);
	}
}