<?php



namespace Composer\Autoload;

class ComposerStaticInit872ee5c766b4c3718e8fb3360bd0d68d
{
public static $prefixLengthsPsr4 = array (
'M' => 
array (
'MaxMind\\Db\\' => 11,
'MaxMind\\' => 8,
),
'G' => 
array (
'GeoIp2\\' => 7,
),
'C' => 
array (
'Composer\\CaBundle\\' => 18,
),
);

public static $prefixDirsPsr4 = array (
'MaxMind\\Db\\' => 
array (
0 => __DIR__ . '/..' . '/maxmind-db/reader/src/MaxMind/Db',
),
'MaxMind\\' => 
array (
0 => __DIR__ . '/..' . '/maxmind/web-service-common/src',
),
'GeoIp2\\' => 
array (
0 => __DIR__ . '/../..' . '/src',
),
'Composer\\CaBundle\\' => 
array (
0 => __DIR__ . '/..' . '/composer/ca-bundle/src',
),
);

public static function getInitializer(ClassLoader $loader)
{
return \Closure::bind(function () use ($loader) {
$loader->prefixLengthsPsr4 = ComposerStaticInit872ee5c766b4c3718e8fb3360bd0d68d::$prefixLengthsPsr4;
$loader->prefixDirsPsr4 = ComposerStaticInit872ee5c766b4c3718e8fb3360bd0d68d::$prefixDirsPsr4;

}, null, ClassLoader::class);
}
}
