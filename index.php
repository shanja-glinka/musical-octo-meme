<?

define('AppDirectory', str_replace('\\', '/', __DIR__) . '/app');
define('AssetsDirectory', str_replace('\\', '/', __DIR__) . '/assets');

// @include_once('error_output.php');

try {
    require_once AppDirectory . '/system/App.php';
    require_once AppDirectory . '/system/Config.php';

    $routes = require AssetsDirectory . '/data/routes.php';

    $config = new System\Config;
    $app = new System\App($config);

    $app($routes);
} catch (Exception $e) {

    $responce = new System\Responce();
    $responce->setHtmlCode($e->getCode());
    $responce->setContentType('json');
    $responce->send($e->getMessage());
}
