<?php
namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Models\ToDosListsModel;

class ToDosListsModelFactory
{
	function __invoke(ContainerInterface $container)
	{
		$db = $container->get('dbConnection');
		return new ToDosListsModel($db);
	}
}