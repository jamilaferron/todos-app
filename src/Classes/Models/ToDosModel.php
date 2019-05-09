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
		$query = $this->db->prepare("SELECT `id`, `task`, `priority`,`completed` FROM `todos_table`");
		$query->execute();
		return $query->fetchAll();
	}

	public function addToDo($task, $priority) : bool
	{
		$query = $this->db->prepare("INSERT INTO `todos_table` (`task`, `priority`) VALUES (:task, :priority);");
		return $query->execute(['task'=>$task, 'priority'=>$priority]);

	}

	public function completeToDo(int $id) : bool
	{
		$query = $this->db->prepare("UPDATE `todos_table` SET `completed` = 1 WHERE `id` = :id;");
		return $query->execute(['id'=>$id]);
	}

	 public function deleteToDo(int $id) : bool
	 {
		 $query = $this->db->prepare("DELETE FROM `todos_table` WHERE `id` = :id;");
		 return $query->execute(['id'=>$id]);
	 }
 }