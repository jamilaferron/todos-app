<?php

namespace ToDos\Controllers;

use Slim\Views\PhpRenderer;
use ToDos\Models\ToDosModel;

class AddToDoController
{
	public $renderer;
	public $toDosModel;

	public function __construct(PhpRenderer $renderer, ToDosModel $toDosModel)
	{
		$this->renderer = $renderer;
		$this->toDosModel = $toDosModel;
	}

	function __invoke($request, $response, $args)
	{
		$this->renderer->render($response, 'addToDo.phtml', $args);

		$data = $request->getParsedBody();
		$this->toDosModel->addToDo($data['task'], $data['priority']);
	}
}