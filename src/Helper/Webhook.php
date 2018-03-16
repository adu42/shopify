<?php

namespace Ado\Shopify\Helper;

class Webhook extends Hmac
{
    public function verify($header, $body)
    {
        return $header === base64_encode($this->hashRaw($body));
    }
}