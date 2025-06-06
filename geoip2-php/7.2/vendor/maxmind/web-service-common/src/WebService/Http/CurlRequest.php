<?php

declare(strict_types=1);

namespace MaxMind\WebService\Http;

use MaxMind\Exception\HttpException;






class CurlRequest implements Request
{



private $ch;




private $url;




private $options;

public function __construct(string $url, array $options)
{
$this->url = $url;
$this->options = $options;
$this->ch = $options['curlHandle'];
}




public function post(string $body): array
{
$curl = $this->createCurl();

curl_setopt($curl, \CURLOPT_POST, true);
curl_setopt($curl, \CURLOPT_POSTFIELDS, $body);

return $this->execute($curl);
}

public function get(): array
{
$curl = $this->createCurl();

curl_setopt($curl, \CURLOPT_HTTPGET, true);

return $this->execute($curl);
}




private function createCurl()
{
curl_reset($this->ch);

$opts = [];
$opts[\CURLOPT_URL] = $this->url;

if (!empty($this->options['caBundle'])) {
$opts[\CURLOPT_CAINFO] = $this->options['caBundle'];
}

$opts[\CURLOPT_ENCODING] = '';
$opts[\CURLOPT_SSL_VERIFYHOST] = 2;
$opts[\CURLOPT_FOLLOWLOCATION] = false;
$opts[\CURLOPT_SSL_VERIFYPEER] = true;
$opts[\CURLOPT_RETURNTRANSFER] = true;

$opts[\CURLOPT_HTTPHEADER] = $this->options['headers'];
$opts[\CURLOPT_USERAGENT] = $this->options['userAgent'];
$opts[\CURLOPT_PROXY] = $this->options['proxy'];



$connectTimeout = $this->options['connectTimeout'];
if (\defined('CURLOPT_CONNECTTIMEOUT_MS')) {
$opts[\CURLOPT_CONNECTTIMEOUT_MS] = ceil($connectTimeout * 1000);
} else {
$opts[\CURLOPT_CONNECTTIMEOUT] = ceil($connectTimeout);
}

$timeout = $this->options['timeout'];
if (\defined('CURLOPT_TIMEOUT_MS')) {
$opts[\CURLOPT_TIMEOUT_MS] = ceil($timeout * 1000);
} else {
$opts[\CURLOPT_TIMEOUT] = ceil($timeout);
}

curl_setopt_array($this->ch, $opts);

return $this->ch;
}






private function execute($curl): array
{
$body = curl_exec($curl);
if ($errno = curl_errno($curl)) {
$errorMessage = curl_error($curl);

throw new HttpException(
"cURL error ({$errno}): {$errorMessage}",
0,
$this->url
);
}

$statusCode = curl_getinfo($curl, \CURLINFO_HTTP_CODE);
$contentType = curl_getinfo($curl, \CURLINFO_CONTENT_TYPE);

return [
$statusCode,




($contentType === false ? null : $contentType),
$body,
];
}
}
