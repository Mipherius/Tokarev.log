<?php

spl_autoload_register(function(string $className){
    require_once __DIR__ . '/' . str_replace('\\', '/', $className . '.php');
    });

$route = $_GET['route'] ?? '';
$routes = require __DIR__.'/src/config/routes.php';


$IsRouteFound = false;
foreach($routes as $pattern => $conAndAct){
    preg_match($pattern, $route, $matches);
    if(!empty($matches)){
        $IsRouteFound = true;
        break;
    }
}

if(!$IsRouteFound){
    echo 'Страница не найдена';
    return;
}

$conName = $conAndAct[0];
$actName = $conAndAct[1];
unset($matches[0]);


$controller = new $conName;
$controller->$actName(...$matches);