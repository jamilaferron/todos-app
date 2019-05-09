<?php

namespace ToDos\Controllers;

use ToDos\Models\ToDosModel;

class AddToDoController
{
	public $renderer;
	public $toDosModel;

	public function __construct(ToDosModel $toDosModel)
	{
		$this->toDosModel = $toDosModel;
	}

	function __invoke($request, $response, $args)
	{

		$data = $request->getParsedBody();
		$this->toDosModel->addToDo($data['task'], $data['priority']);
		return $response->withRedirect('/');
	}
}