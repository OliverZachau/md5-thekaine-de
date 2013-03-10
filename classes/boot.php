<?php
/**
 * User: Oliver "kaine" Zachau
 * Date: 04.07.12
 * Time: 14:52
 *
 */


include "config/Config.php";
define('ROOT_DIR', realpath(__DIR__ . '/..'));

set_include_path(ROOT_DIR . PATH_SEPARATOR . get_include_path());


function __autoload($class_name)
{
    if (file_exists(ROOT_DIR . '/classes/' . $class_name . '.php')) {
        include ROOT_DIR . '/classes/' . $class_name . '.php';
    } elseif (file_exists(ROOT_DIR . "/classes/parser/$class_name.php")) {
        include ROOT_DIR . "/classes/parser/$class_name.php";
    }
}