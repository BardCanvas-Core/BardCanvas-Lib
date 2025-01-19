<?php

declare(strict_types=1);

namespace MaxMind\WebService\Http;






interface Request
{
public function __construct(string $url, array $options);

public function post(string $body): array;

public function get(): array;
}
