<?php
namespace ToDos\Models;

class ToDosTasksModel
{
	public $db;

	public function __construct(\PDO $db)
	{
		$this->db = $db;
	}

	public function getToDosTasks() : array
	{
		$query = $this->db->prepare("SELECT `id`, `task`, `priority`,`completed`, `todoList` FROM `todos_tasks`");
		$query->execute();
		return $query->fetchAll();
	}

	public function addToDo($task, $priority, $list) : bool
	{
		$query = $this->db->prepare("INSERT INTO `todos_tasks` (`task`, `priority`, `todoList`) VALUES (:task, :priority, :list);");
		return $query->execute(['task'=>$task, 'priority'=>$priority, 'list'=>$list]);
	}

	public function completeToDo(int $id) : bool
	{
		$query = $this->db->prepare("UPDATE `todos_tasks` SET `completed` = 1 WHERE `id` = :id;");
		return $query->execute(['id'=>$id]);
	}

	public function deleteToDo(int $id) : bool
	{
		$query = $this->db->prepare("DELETE FROM `todos_tasks` WHERE `id` = :id;");
		return $query->execute(['id'=>$id]);
	}
}