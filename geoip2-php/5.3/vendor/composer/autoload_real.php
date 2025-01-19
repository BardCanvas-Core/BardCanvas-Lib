<?php



class ComposerAutoloaderInit872ee5c766b4c3718e8fb3360bd0d68d
{
private static $loader;

public static function loadClassLoader($class)
{
if ('Composer\Autoload\ClassLoader' === $class) {
require __DIR__ . '/ClassLoader.php';
}
}

public static function getLoader()
{
if (null !== self::$loader) {
return self::$loader;
}

spl_autoload_register(array('ComposerAutoloaderInit872ee5c766b4c3718e8fb3360bd0d68d', 'loadClassLoader'), true, true);
self::$loader = $loader = new \Composer\Autoload\ClassLoader();
spl_autoload_unregister(array('ComposerAutoloaderInit872ee5c766b4c3718e8fb3360bd0d68d', 'loadClassLoader'));

$useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
if ($useStaticLoader) {
require_once __DIR__ . '/autoload_static.php';

call_user_func(\Composer\Autoload\ComposerStaticInit872ee5c766b4c3718e8fb3360bd0d68d::getInitializer($loader));
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

$loader->register(true);

return $loader;
}
}
