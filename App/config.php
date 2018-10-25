<?php
namespace App;
class Config extends Base{

    static function returnConfig()
    {
    	$a=parse_ini_file('config.ini');
    	// echo '<pre>';
    	// var_dump($a);exit;
        return parse_ini_file("config.ini");
    }


}
