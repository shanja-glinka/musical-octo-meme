<?

namespace System;

final class Connection extends \System\Utils\CustomPDO
{
    private $pdo;
    private $config;

    public function __construct($config = null)
    {
        $this->config = (!is_object($config) ? new \System\Config : $config);

        $this->useConnect();
    }

    public function useConnect()
    {
        $this->connect($this->config['connection']);
    }

    private function connect($connection)
    {
        if (!$connection['host'] or !$connection['database'])
            return $this;
            
        $this->setConnect($connection['host'], $connection['database'], $connection['username'], $connection['password'], $connection['charset']);
        $this->open();
        return $this;
    }
}
