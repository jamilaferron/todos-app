<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\ToDosController;

class ToDosControllerFactory
{
	function __invoke(ContainerInterface $container)
	{
		$renderer = $container->get('renderer');
		$toDosModel = $container->get('ToDosModel');
		return new ToDosController($renderer, $toDosModel);
	}
}