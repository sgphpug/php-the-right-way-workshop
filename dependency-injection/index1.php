<?php
require_once 'vendor/autoload.php';
$class = '\Apps\Controller\\' . ucfirst($argv[1]);
if (!class_exists($class)) {
    throw new \Exception('Not Found', 404);
}

$reflector = new \ReflectionClass($class);
$dependencies = [];
foreach ($reflector->getConstructor()->getParameters() as $parameter) {
    $parameterClass = $parameter->getClass()->getName();
    $dependencies[] = new $parameterClass();
}
$controller = $reflector->newInstanceArgs($dependencies);

$action = lcfirst($argv[2]);
if (!method_exists($controller, $action)) {
    throw new \Exception('Not Found', 404);
}

var_dump($controller->$action());
