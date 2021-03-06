<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite1c73d08b6d341275ab8d69d1355d4d1
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        // var_dump($class);exit;
        if ('Composer\Autoload\ClassLoader' === $class) {
            // var_dump(__DIR__);exit;
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        // var_dump(self::$loader);exit;
        if (null !== self::$loader) {
            return self::$loader;
        }
        //**
        //
        //注册的是函数public function
        spl_autoload_register(array('ComposerAutoloaderInite1c73d08b6d341275ab8d69d1355d4d1', 'loadClassLoader'), true, true);

        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        // echo '<pre>';
        // var_dump($loader);exit;
        spl_autoload_unregister(array('ComposerAutoloaderInite1c73d08b6d341275ab8d69d1355d4d1', 'loadClassLoader'));

        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION');
        // var_dump($useStaticLoader);exit;
        if ($useStaticLoader) {
            require_once __DIR__ . '/autoload_static.php';

            call_user_func(\Composer\Autoload\ComposerStaticInite1c73d08b6d341275ab8d69d1355d4d1::getInitializer($loader));
        } else {
            $map = require __DIR__ . '/autoload_namespaces.php';
            foreach ($map as $namespace => $path) {
                $loader->set($namespace, $path);
            }

            $map = require __DIR__ . '/autoload_psr4.php';
            foreach ($map as $namespace => $path) {
                $loader->setPsr4($namespace, $path);
            }

            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }
        // echo '<pre>';
        // var_dump($loader);exit;
        $loader->register(true);

        return $loader;
    }
}
