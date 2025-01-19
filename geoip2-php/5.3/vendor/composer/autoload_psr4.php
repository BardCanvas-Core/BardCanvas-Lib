<?php



$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
'MaxMind\\Db\\' => array($vendorDir . '/maxmind-db/reader/src/MaxMind/Db'),
'MaxMind\\' => array($vendorDir . '/maxmind/web-service-common/src'),
'GeoIp2\\' => array($baseDir . '/src'),
'Composer\\CaBundle\\' => array($vendorDir . '/composer/ca-bundle/src'),
);
