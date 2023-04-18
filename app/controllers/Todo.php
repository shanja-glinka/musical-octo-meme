<?

namespace Controllers;


class Todo extends \System\Controllers
{

    public function __construct()
    {
        parent::__construct();
        $this->responce->setContentType('json');
    }



    public function TaskList($taskState = null)
    {
        $taskModel = $this->loadTaskModel();

        
        return $this->responce->send($taskModel->getTasks($taskState));
    }

    public function Task($taskId)
    {
        $taskModel = $this->loadTaskModel($taskId);


        return $this->responce->send($taskModel->getTask($taskId));
    }

    public function NewTask()
    {
        $this->request->throwIfValueNotExist('text');


        $taskText = $this->request->val('text');
        $taskState = $this->request->val('state');

        $taskModel = $this->loadTaskModel();
        $newTaskId = $taskModel->newTask($taskText, $taskState);


        return $this->responce->send(array('id' => $newTaskId));
    }

    public function UpdateTask($taskId)
    {
        $taskText = $this->request->val('text');
        $taskState = $this->request->val('state');

        $taskModel = $this->loadTaskModel($taskId);


        return $this->responce->send($taskModel->updateTask($taskId, $taskText, $taskState));
    }

    public function RemoveTask($taskId)
    {
        $taskModel = $this->loadTaskModel($taskId);

        return $this->responce->send(array('removed' => $taskModel->removeTask($taskId)));
    }


    private function loadTaskModel($taskId = null)
    {
        $taskModel = new \Models\TodoModel();

        if ($taskId !== null && !$taskModel->isTaskExists($taskId))
            throw new \Exception("Task '$taskId' not found", 404);


        return $taskModel;
    }
}
