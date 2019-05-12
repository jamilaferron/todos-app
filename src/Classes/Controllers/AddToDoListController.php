<?php

namespace ToDos\Controllers;

use ToDos\Models\ToDosListsModel;

class AddToDoListController
{
	public $toDosListsModel;

	public function __construct(ToDosListsModel $toDosListsModel)
	{
		$this->toDosListsModel = $toDosListsModel;
	}

	function __invoke($request, $response, $args)
	{

		$data = $request->getParsedBody();
		if ($data['list_name'] === "")
		{
			return $response->withRedirect('/');
		}else {
			$this->toDosListsModel->addToDoList($data['list_name']);
			return $response->withRedirect('/');
		}
	}
}