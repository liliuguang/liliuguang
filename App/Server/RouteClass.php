<?php
namespace App\Server;

use App\Base;

use App\Container;

class RouteClass extends Base{
    /**
     * @var 中间件类
     */
    public $pipe;
    /**
     * @var 容器类
     */
    public $container;
    public function __construct()
    {
        parent::__construct();
        $this->pipe = new PipelineClass();
        echo '<pre>';
        print_r($this->pipe);exit;
    }
    //分发请求到控制器,但是必须先实例化容器,由容器检测控制器的依赖并注入
    public function distribute(array $path){
        // echo '<pre>';
        // var_dump($_SERVER);var_dump($path);exit;
        // echo '<pre>';var_dump($path[$_SERVER['PATH_INFO']]);exit;
        if ($prototype  =   $path[$_SERVER['PATH_INFO']]){
            //中间件,执行到容器前检测路由
            $this->pipe->load($_SERVER['PATH_INFO']);
            
            $routeInfo = ['dir'=>$prototype[0],'cls'=>$prototype[1],'func'=>$prototype[2]];
            #通过路由来的请求只可以实例化到控制器
            $this->container = new Container('\App\Controller\\'.$routeInfo['dir'].'\\'.$routeInfo['cls']);
            return $this->container->builder($routeInfo);
        }else{
            return var_export($_SERVER['PATH_INFO'])." Request Not found in ".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. __CLASS__;
            // return var_export($_SERVER['PATH_INFO'])." Request Not found in ".'-'. __CLASS__;
        }
    }
}