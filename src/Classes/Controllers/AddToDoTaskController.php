<?php

namespace ToDos\Controllers;

use ToDos\Models\ToDosTasksModel;

class AddToDoTaskController
{
	public $toDosTasksModel;

	public function __construct(ToDosTasksModel $toDosTasksModel)
	{
		$this->toDosTasksModel = $toDosTasksModel;
	}

	function __invoke($request, $response, $args)
	{

		$data = $request->getParsedBody();
		if ($data['task'] === "")
		{
			return $response->withRedirect('/');
		}else {
			$this->toDosTasksModel->addToDo($data['task'], $data['priority'], $data['list']);
			return $response->withRedirect('/');
		}
	}
}