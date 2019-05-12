<?php

namespace ToDos\Models;

class ToDosListsModel
{
	public $db;

	public function __construct(\PDO $db)
	{
		$this->db =$db;
	}

	public function getToDosLists() :array
	{
		$query = $this->db->prepare("SELECT `id`, `list_name` FROM `todos_lists`");
		$query->execute();
		return $query->fetchAll();
	}

	public function addToDoList($listName) : bool
	{
		$query = $this->db->prepare("INSERT INTO `todos_lists` (`list_name`) VALUES (:listName);");
		return $query->execute(['listName'=>$listName]);
	}
}
