<?php

namespace ToDos\Controllers;

use Slim\Views\PhpRenderer;

class AddToDoController
{
	public $renderer;

	public function __construct(PhpRenderer $renderer)
	{
		$this->renderer = $renderer;
	}

	function __invoke($request, $response, $args)
	{
		$this->renderer->render($response, 'addToDo.phtml', $args);
	}
}