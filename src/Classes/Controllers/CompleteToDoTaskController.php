<?php

namespace ToDos\Controllers;

use ToDos\Models\ToDosTasksModel;

class CompleteToDoTaskController
{
	public $toDosTasksModel;

	public function __construct(ToDosTasksModel $toDosTasksModel)
	{
		$this->toDosTasksModel = $toDosTasksModel;
	}

	function __invoke($request, $response, $args)
	{

		$data = $request->getParsedBody();
		$this->toDosTasksModel->completeToDo($data['id']);
		return $response->withRedirect('/');
	}
}