<?php

namespace ToDos\Controllers;

use ToDos\Models\ToDosModel;

class DeleteToDoController
{
	public $toDosModel;

	public function __construct(ToDosModel $toDosModel)
	{
		$this->toDosModel = $toDosModel;
	}

	function __invoke($request, $response, $args)
	{

		$data = $request->getParsedBody();
		$this->toDosModel->deleteToDo($data['id']);
		return $response->withRedirect('/');
	}
}