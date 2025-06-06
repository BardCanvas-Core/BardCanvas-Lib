<?php

declare(strict_types=1);

namespace MaxMind\Db\Reader;

class Util
{



public static function read($stream, int $offset, int $numberOfBytes): string
{
if ($numberOfBytes === 0) {
return '';
}
if (fseek($stream, $offset) === 0) {
$value = fread($stream, $numberOfBytes);




if ($value !== false && ftell($stream) - $offset === $numberOfBytes) {
return $value;
}
}

throw new InvalidDatabaseException(
'The MaxMind DB file contains bad data'
);
}
}
