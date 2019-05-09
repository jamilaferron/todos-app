<?php
 namespace ToDos\Models;

 class ToDosModel
 {
	public $db;

	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}

	public function getToDos() : array
	{
		$query = $this->db->prepare("SELECT `id`, `task`, `priority` FROM `todos_table`");
		$query->execute();
		return $query->fetchAll();
	}

	public function addToDo($task, $priority) : bool
	{
		$query = $this->db->prepare("INSERT INTO `todos_table` (`task`, `priority`) VALUES (:task, :priority);");
		return $query->execute(['task'=>$task, 'priority'=>$priority]);

	}
 }