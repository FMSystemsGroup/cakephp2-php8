<?php
/**
 * lib/Cake/Console/cake.php initialize
 */
const APP_DIR = 'app';
const WEBROOT_DIR = 'webroot';

$dirPath =explode(DS,$filename);
$root = '';
foreach ($dirPath as $folder){

if ($folder == APP_DIR)
	break;
	$root .= $folder . DS;

}

define('ROOT', $root);

const WWW_ROOT = ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS;
define('APP', ROOT . DS . APP_DIR . DS);
/**
 * This only needs to be changed if the "cake" directory is located
 * outside of the distributed structure.
 * Full path to the directory containing "cake". Do not add trailing directory separator
 */
const CAKE_CORE_INCLUDE_PATH = ROOT . DS . APP_DIR . '/Vendor/vendor/cakephp/cakephp/lib';
if (!defined('CAKE_CORE_INCLUDE_PATH')) {
	define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'lib');
}

const CORE_PATH = CAKE_CORE_INCLUDE_PATH . DS;

require_once APP.'Vendor/vendor/autoload.php';

$vendorPath = ROOT . DS . APP_DIR . DS . 'Vendor/vendor' . DS . 'cakephp' . DS . 'cakephp' . DS . 'lib';

$dispatcher =   'Cake' . DS . 'Console' . DS . 'ShellDispatcher.php';

require_once($vendorPath. DS . $dispatcher);

new ShellDispatcher([$_SERVER['argv'][0], '-working', APP_DIR]);

unset($dispatcher);