<?php
function dmp($var, $deep = false, $asStr = false){
    $arr = debug_backtrace(0,1);
    if($deep){
        ini_set('xdebug.var_display_max_depth', '10000');
        ini_set('xdebug.var_display_max_data', '10000');
        ini_set('xdebug.var_display_max_children', '10000');
    }

    echo '<div style="clear:both; position: relative; z-index: 100000000000000000; background-color: #eee">';
    echo '<pre>';
    echo '<b>File: </b>' . str_replace($_SERVER['DOCUMENT_ROOT'], "", $arr[0]['file']) . '<br>';
    echo '<b>Line: </b>' . $arr[0]['line'] . '<br>';
// 		echo '<b>Var: </b>' . write($var) . '<br>';
    if($asStr !== true)
        var_dump($var);
    else
        var_dump($var, $asStr);
// 		debug_zval_dump($var);
    echo '</pre>';
    echo '<div style="clear:both">&nbsp;</div>';
    echo '</div>';
}


// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// Ensure the current directory is pointing to the front controller's directory
chdir(__DIR__);

// Load our paths config file
// This is the line that might need to be changed, depending on your folder structure.
$pathsConfig = FCPATH . '../app/Config/Paths.php';
// ^^^ Change this if you move your application folder
require realpath($pathsConfig) ?: $pathsConfig;

$paths = new Config\Paths();

// Location of the framework bootstrap file.
$bootstrap = rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';
$app       = require realpath($bootstrap) ?: $bootstrap;

/*
 *---------------------------------------------------------------
 * LAUNCH THE APPLICATION
 *---------------------------------------------------------------
 * Now that everything is setup, it's time to actually fire
 * up the engines and make this app do its thang.
 */
$app->run();
