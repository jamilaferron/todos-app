<?php

namespace ToDos\Controllers;

use Slim\Views\PhpRenderer;
use ToDos\Models\ToDosModel;

class ToDosController
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
		$args['toDos'] = $this->toDosModel->getToDos();
		$this->renderer->render($response, 'index.phtml', $args);
	}
}