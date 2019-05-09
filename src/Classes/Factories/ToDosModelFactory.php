<?php
namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Models\ToDosModel;

class ToDosModelFactory
{
	function __invoke(ContainerInterface $container)
	{
		$db = $container->get('dbConnection');
		return new ToDosModel($db);
	}
}