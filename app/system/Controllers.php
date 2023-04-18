<?

namespace System;

use Exception;

abstract class Controllers
{

    protected $request;
    protected $responce;
    protected $cache;
    protected $cookie;
    protected $auth;

    protected $view = null;

    public function __construct()
    {
        $this->request = new Request;
        $this->responce = new Responce();
    }



    protected function setView($viewMethodName, $args = array())
    {
        $this->installMethodNamespace($viewMethodName, 'Views\\');
        $this->view = Utils\Methods::installMethod($viewMethodName, $args);

        return $this;
    }

    protected function renderView($action, $params = array())
    {
        if (!$this->view)
            throw new \RuntimeException(
                'Controller View was not installed'
            );

        return Utils\Methods::callMethod($this->view, $action, array($params));
    }

    protected function callModel($modelMethodName, $args = array())
    {
        $this->installMethodNamespace($modelMethodName, 'Models\\');
        return Utils\Methods::installMethod($modelMethodName, $args);
    }

    protected function callModelMethod($model, $modelMethodName, $args = array())
    {
        return Utils\Methods::callMethod($model, $modelMethodName, $args);
    }
    

    
    protected function callMethod($modelName, $methodName, $args = array())
    {
        if ($methodName == null)
            return false;

        $model = $this->callModel($modelName);
        $callResult = $this->callModelMethod($model, $methodName, $args);

        return $callResult;
    }



    private function installMethodNamespace(&$methodName, $namespace)
    {
        if (strpos($methodName, $namespace) === false)
            $methodName = $namespace . $methodName;
    }
}
