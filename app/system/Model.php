<?

namespace System;

use Exception;

abstract class Model
{

    protected $tableName;
    protected $connection;

    public function __construct($tableName, &$connection = null)
    {
        $this->tableName = $tableName;
        $this->connection = ($connection === null ? new \System\Connection() : $connection);
    }



    protected function find1By($filter = '', $values = array())
    {
        return $this->connection->fetch1Row($this->select($filter, $values));
    }

    protected function findBy($filter = '', $values = array())
    {
        return $this->connection->fetchRows($this->select($filter, $values));
    }

    protected function count($filter = '', $values = array())
    {
        return $this->connection->count($this->tableName, $filter, $values);
    }

    protected function insert($filedsAndValues, $fields = '', $replace = false)
    {
        return $this->connection->insert($this->tableName, $filedsAndValues, $fields, $replace);
    }

    protected function update($filedsAndValues, $fields = '', $filter = '', $values = array())
    {
        return $this->connection->update($this->tableName, $filedsAndValues, $fields, $filter, $values);
    }

    protected function delete($filter = '', $values = array())
    {
        return $this->connection->delete($this->tableName, $filter, $values);
    }



    private function select($filter = '', $values = array())
    {
        return $this->connection->select($this->tableName, '*', $filter, $values);
    }
}
