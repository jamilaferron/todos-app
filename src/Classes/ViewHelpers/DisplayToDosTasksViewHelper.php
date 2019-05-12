<?php
namespace ToDos\ViewHelpers;

class DisplayToDosTasksViewHelper
{

	static public function displayToDoLists($id, $toDosLists)
	{
		$result = '';
		foreach ($toDosLists as $list)
		{
			if ($list['id'] == $id) {
				$result .= '<div class="row list-name d-flex align-items-center pl-3 active">
							<form action="">
								<input type="text" class="bg-transparent border-0 activeList-input" id="activeList'.$list['id'].'" value="'.$list['list_name'].'">
							</form>
							<form action="/" method="post" class="d-none">
								<input type="hidden" class="bg-transparent border-0" name="listId" value="'.$list['id'].'">
								<input type="submit" value="Submit" id="activeList'.$list['id'].'_submit" class="activeList d-none">
							</form>
						</div>';
			} else {
				$result .= '<div class="row list-name d-flex align-items-center pl-3">
							<form action="">
								<input type="text" class="bg-transparent border-0 activeList-input" id="activeList'.$list['id'].'" value="'.$list['list_name'].'">
							</form>
							<form action="/" method="post" class="d-none">
								<input type="hidden" class="bg-transparent border-0" name="listId" value="'.$list['id'].'">
								<input type="submit" value="Submit" id="activeList'.$list['id'].'_submit" class="activeList d-none">
							</form>
						</div>';
			}



		}
		return ($result);
	}

	static public function displayToDosTasks($task)
	{
		$result = '';


		if($task['completed'] == 0)
		{
			$result .= '<div class="row w-100 ml-0 mt-2">
				<div class="col-1 pb-2">
					<form action="/completeToDo" method="post">
						<input type="checkbox" id="completeTask-input">
						<input type="hidden" name="id" value="' . $task['id'] . '">
						<input type="submit" value="Submit" id="completeTask_submit" class="d-none">
					</form>
				</div>
				<div class="col-11 border-bottom border-secondary pb-2 pl-0 d-flex justify-content-between "><div>';
				switch ($task['priority']) {
					case 0:
					$result .= '<span class="d-inline"></span>';
					break;
					case 1:
					$result .= '<span class="d-inline">!</span>';
					break;
					case 2:
					$result .= '<span class="d-inline">!!</span>';
					break;
					case 3:
					$result .= '<span class="d-inline">!!!</span>';
					break;
					};

					$result .= '<form action="/editToDo" method="post" class="d-inline">
						<input type="text" id="editTask-input'.$task['id'].'" class="bg-transparent border-0 editTask-input" name="task" value="' . $task['task'] .'">
						<input type="hidden" value="'.$task['id'].'" name="id">
						<input type="hidden" value="'.$task['id'].'" name="ListId">
						<input type="submit" value="Submit" id="editTask_submit'.$task['id'].'" class="d-none">
					</form>
					</div>
					<button class="d-none editInfo" id="editInfo'.$task['id'].'" data-toggle="modal" data-target="#editTaskModal'.$task['id'].'"><i class="fas fa-info"></i></button>
				</div>
				
			</div>';

		}

		return ($result);
	}

	static public function displayEditTaskModal($lists, $tasks) {
		$result = '';
		foreach ($tasks as $task)
		{
			if($task['completed'] == 0)
			{
				$result .= '<div class="modal fade" id="editTaskModal'.$task['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
										<button class="close" type="button" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<form method="POST" action="/editToDo" class="edit-form">
										<div class="modal-body">
										<input type="text" value="'.$task['task'].'" name="task" class="bg-transparent border-0">
											<div class="btn-group btn-group-toggle" data-toggle="buttons">';


				switch ($task['priority']) {
					case "0":
						$result .= '<label class="btn btn-secondary active">
											    <input type="radio" name="priority" id="priority0" autocomplete="off" checked> None
											  </label>
											  <label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority1" autocomplete="off"> !
											  </label>
											  <label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority2" autocomplete="off"> !!
											  </label>
											  <label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority3" autocomplete="off"> !!!
											  </label>';
						break;
					case "1":
						$result .= '<label class="btn btn-secondary ">
											    <input type="radio" name="priority" id="priority0" autocomplete="off"> None
											  </label>
											  <label class="btn btn-secondary active">
											    <input type="radio" name="priority" id="priority1" autocomplete="off" checked> !
											  </label>
											  <label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority2" autocomplete="off"> !!
											  </label>
											  <label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority3" autocomplete="off"> !!!
											  </label>';
						break;
					case "2":
						$result .= '<label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority0" autocomplete="off" > None
											  </label>
											  <label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority1" autocomplete="off"> !
											  </label>
											  <label class="btn btn-secondary active">
											    <input type="radio" name="priority" id="priority2" autocomplete="off" checked> !!
											  </label>
											  <label class="btn btn-secondary ">
											    <input type="radio" name="priority" id="priority3" autocomplete="off"> !!!
											  </label>';
						break;
					case "3":
						$result .= '<label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority0" autocomplete="off"> None
											  </label>
											  <label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority1" autocomplete="off"> !
											  </label>
											  <label class="btn btn-secondary">
											    <input type="radio" name="priority" id="priority2" autocomplete="off"> !!
											  </label>
											  <label class="btn btn-secondary active">
											    <input type="radio" name="priority" id="priority3" autocomplete="off" checked> !!!
											  </label>';
						break;
				}


											$result .= '</div>
											<div class="form-group">
											    <label for="exampleFormControlSelect1">Change List</label>
											    <select class="form-control" id="exampleFormControlSelect1">';

											      foreach ($lists as $list)
											      {
											      	if ($list['id'] === $task['todoList'])
											        {
												        $result .= '<option value="'.$list['id'].'" selected>'.$list['list_name'].'</option>';
											        }else{

											        }$result .= '<option value="'.$list['id'].'">'.$list['list_name'].'</option>';


											      }
											    $result.= '</select>
											  </div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
											<form action="dashboard.php" method="POST">
												<input type="hidden" name="paragraphId" value="'. $task['id'] .'">
												<input class="btn btn-primary text-uppercase font-weight-bold" type="submit" value="Edit" name="edit_submit">
											</form>
										</div>
									</form>
								</div>
							</div>
						</div>';
			}


		}
		return $result;
	}

	static public function displayToDosList($list, $toDosTasks)
	{
		$result = '';

		$result .= '<div class="row">
				<div class="fixed-top pr-3 pl-3 mt-4  ">
					<div class="list-header-wrapper border-bottom border-secondary d-flex justify-content-between">
						<h2 class=" list-header">'.$list['list_name'].'</h2>
						<button class="bg-transparent border-0" id="addTask-button"><i class="fas fa-plus"></i></button>
					</div>
				</div>
			</div><div class="row list-tasks-wrapper pr-3 pt-3" id="list-tasks">';

			foreach ($toDosTasks as $task)
				if ($list['id'] === $task['todoList'])
				{
					$result .= self::displayToDosTasks($task);
				}
			$result .= '<div class="row w-100 ml-0 mt-2">
							<div class="col-1 pb-2"></div>
								<div class="col-11 border-bottom border-secondary pb-2 pl-0">
									<form action="/addToDo" method="post">
										<input type="text" id="addTask-input" name="task" class="bg-transparent border-0">
										<input type="hidden" value="0" name="priority">
										<input type="hidden" value="'.$list['id'].'" name="listId">
										<input type="submit" value="Submit" id="addTask_submit" class="d-none">
									</form>
								</div>
							</div>
						<div>';

		return ($result);
	}
}
