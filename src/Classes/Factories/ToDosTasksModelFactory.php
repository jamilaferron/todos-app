<?php
namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Models\ToDosTasksModel;

class ToDosTasksModelFactory
{
	function __invoke(ContainerInterface $container)
	{
		$db = $container->get('dbConnection');
		return new ToDosTasksModel($db);
	}
}