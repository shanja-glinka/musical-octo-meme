<?

namespace Models;

use \Exception;

final class TodoModel extends \System\Model
{
    public function __construct(&$connection = null)
    {
        parent::__construct('Todo', $connection);
    }

    public function isTaskExists($id)
    {
        return ($this->count('ID=?d', array($id)) > 0);
    }

    public function getTask($id, $state = null)
    {
        return $this->find1By('ID=?d', array($id));
    }

    public function getTasks($state = null)
    {
        $state = \System\Utils\TodoValidator::stateValidate($state);

        return $this->findBy(($state === null ? '' : 'State=?d'), array($state));
    }


    public function newTask($text, $state)
    {
        $text = \System\Utils\TodoValidator::textValidate($text);
        $state = \System\Utils\TodoValidator::stateValidate($state);

        if (!is_numeric($state))
            $state = null;

        $values = array('Text' => $text, 'State' => $state);
        $fields = ('Text' . ($state === null ? '' : ',State'));

        return $this->insert($values, $fields);
    }


    public function removeTask($id)
    {
        return $this->delete('ID=?d', array($id));
    }

    public function updateTask($id, $text, $state)
    {
        $text = \System\Utils\TodoValidator::textValidate($text);
        $state = \System\Utils\TodoValidator::stateValidate($state);

        if ($text === null && $state === null)
            throw new \Exception("'text' or 'state' variable required", 400);

        $values = array('Text' => $text, 'State' => $state);
        $fields = ('Text' . ($state === null ? '' : ',State'));

        $updateCount = $this->update($values, $fields, 'ID=?d', array($id));

        return $this->getTask($id);
    }
}
