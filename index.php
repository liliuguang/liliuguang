<?php

require "vendor/autoload.php";

use App\Config;


/**
 * index->router->container,根据router的get参数，
 * 通过container实现control类并用反射类得到control的构造函数进行依赖注入
 */

$route = New \App\Route(function () {
	// echo '<pre>';
	// var_dump(Config::returnConfig());exit;
    return Config::returnConfig();
});
echo '<pre>';
print_r($route);exit;
// echo '<pre>';
// var_dump($route->useDistribute());exit;
echo $route->useDistribute();



