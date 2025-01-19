<?php

declare(strict_types=1);

namespace MaxMind\Exception;




class InvalidRequestException extends HttpException
{





private $error;








public function __construct(
string $message,
string $error,
int $httpStatus,
string $uri,
\Exception $previous = null
) {
$this->error = $error;
parent::__construct($message, $httpStatus, $uri, $previous);
}

public function getErrorCode(): string
{
return $this->error;
}
}
