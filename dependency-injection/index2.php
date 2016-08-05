<?php
require_once 'vendor/autoload.php';

$class = '\Apps\Controller\\' . ucfirst($argv[1]);
if (!class_exists($class)) {
    throw new \Exception('Not Found', 404);
}

$container = new \Symfony\Component\DependencyInjection\ContainerBuilder();
$container->register('Client', \GuzzleHttp\Client::class);
$container->register('Crawler', \Symfony\Component\DomCrawler\Crawler::class);
$container
    ->register('Conference', \Apps\Conference\PhpAsia2016v1::class)
    ->addArgument(new \Symfony\Component\DependencyInjection\Reference('Client'))
    ->addArgument(new \Symfony\Component\DependencyInjection\Reference('Crawler'));
$controller = new $class($container);

$action = lcfirst($argv[2]);
if (!method_exists($controller, $action)) {
    throw new \Exception('Not Found', 404);
}

var_dump($controller->$action());
