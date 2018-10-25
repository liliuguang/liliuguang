<?php
namespace App\Server;

use App\Base;
use App;

class PipelineClass extends Base
{
    protected $middleware;
    protected $group;
    /**
     * 
     *初始化中间件
     * @param  elements 路由组
     * @param  unit 触发 的中间件类 
     */
    /**
     * 
     * 初始化中间件
     * @param elements 路由组 $[name] [<description>]
     * @param unit 触发 的中间件类 $[name] [<description>]
     */
    public function __construct()
    {
        $this->middleware = [
            'group1' => [
                'elements' => [ //路由组
                    '/', '/index'
                ],
                'unit' => [ //触发的中间件类
                    'Test'
                ]
            ]
        ];
    }

    public function load($routePath)
    {
        echo '<pre>';
        // var_dump($routePath);
        foreach ($this->middleware as $key => $value)
        {
            // var_dump($key);var_dump($value);
            if (in_array($routePath,$value['elements']))
            {
                // var_dump($routePath);var_dump($value['elements']);exit;
                // var_dump($value['unit']);exit;
                array_walk($value['unit'],function ($className,$key){
                    // var_dump($className);var_dump($this->next($className));exit;
                    if ($this->next($className) == false)
                    {
                        die();
                    };
                });
            }
        }
    }
    public function next($className)
    {
        $r = new \ReflectionClass("App\\Server\\Middle\\" . $className ."MiddleClass");
        var_dump($r);exit;
        $modle = $r->newInstance();
        // var_dump($modle);exit;
        // var_dump($modle->relay);exit;
        return $modle->relay();
    }
}