<?php

namespace MaxMind\WebService\Http;






class RequestFactory
{







private $ch;

public function __construct()
{
$this->ch = curl_init();
}

public function __destruct()
{
curl_close($this->ch);
}







public function request($url, $options)
{
$options['curlHandle'] = $this->ch;

return new CurlRequest($url, $options);
}
}
