<?php
/*
function autoload($class){
    require_once './' . $class . '.php';
}
*/

spl_autoload_register(function($class){
    require_once 'class/' .'class.'. $class . '.php';
});