<?php

declare(strict_types=1);

namespace MaxMind\WebService\Http;






class RequestFactory
{







private $ch;

public function __destruct()
{
if (!empty($this->ch)) {
curl_close($this->ch);
}
}




private function getCurlHandle()
{
if (empty($this->ch)) {
$this->ch = curl_init();
}

return $this->ch;
}

public function request(string $url, array $options): Request
{
$options['curlHandle'] = $this->getCurlHandle();

return new CurlRequest($url, $options);
}
}
