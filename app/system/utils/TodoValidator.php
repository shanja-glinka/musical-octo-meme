<?

namespace System\Utils;

class TodoValidator
{
    public static function textValidate($taskText)
    {
        if (!is_string($taskText))
            return $taskText;

        $textLength = mb_strlen($taskText);

        if ($textLength == 0)
            throw new \Exception("'text' variable required", 400);

        if ($textLength > 1000)
            throw new \Exception('String length must not exceed 1000 characters', 400);

        return $taskText;
    }

    public static function stateValidate($taskState)
    {
        if ($taskState === null)
            return $taskState;


        if (is_numeric($taskState) && !in_array($taskState, array(0, 1, 2))) {

            throw new \Exception("Wrong task state. Parameter 'state' mast be array(0, 1, 2)", 400);
        }

        if (in_array($taskState, array('inwork', 'finished')))
            $taskState = array_search($taskState, array('inwork', 'finished'));

        if (is_string($taskState))
            throw new \Exception("Wrong task state. Instead of '$taskState' use 'inwork' or 'finished", 400);


        return $taskState;
    }
}
