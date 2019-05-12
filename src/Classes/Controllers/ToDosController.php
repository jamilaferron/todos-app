<?php

namespace ToDos\Controllers;

use Slim\Views\PhpRenderer;
use ToDos\Models\ToDosListsModel;
use ToDos\Models\ToDosTasksModel;

class ToDosController
{
	public $renderer;
	public $toDosTasksModel;
	public $toDosListsModel;

	public function __construct(PhpRenderer $renderer, ToDosTasksModel $toDosTasksModel, ToDosListsModel $toDosListsModel)
	{
		$this->renderer = $renderer;
		$this->toDosTasksModel = $toDosTasksModel;
		$this->toDosListsModel = $toDosListsModel;
	}

	function __invoke($request, $response, $args)
	{
		$data = $request->getParsedBody();

		$args['toDosTasks'] = $this->toDosTasksModel->getToDosTasks();
		$args['toDosLists'] = $this->toDosListsModel->getToDosLists();

		if (isset($data['listId']))
		{
			$id = $data['listId'] - 1;
			$args['id'] = $args['toDosLists'][$id];
		}else{
			$args['id'] = $args['toDosLists'][0];
		}

		$this->renderer->render($response, 'index.phtml', $args);
	}
}