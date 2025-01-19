<?php















function mmdb_autoload($class)
{







$namespace_map = ['MaxMind\\Db\\' => __DIR__ . '/src/MaxMind/Db/'];

foreach ($namespace_map as $prefix => $dir) {

$path = str_replace($prefix, $dir, $class);


$path = str_replace('\\', '/', $path);


$path = $path . '.php';


if (file_exists($path)) {
include $path;
}
}
}

spl_autoload_register('mmdb_autoload');
