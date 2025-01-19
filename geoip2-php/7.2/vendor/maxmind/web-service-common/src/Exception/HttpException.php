<?php

declare(strict_types=1);

namespace MaxMind\Exception;




class HttpException extends WebServiceException
{





private $uri;







public function __construct(
string $message,
int $httpStatus,
string $uri,
\Exception $previous = null
) {
$this->uri = $uri;
parent::__construct($message, $httpStatus, $previous);
}

public function getUri(): string
{
return $this->uri;
}

public function getStatusCode(): int
{
return $this->getCode();
}
}
