<?php

namespace Phynixmedia\Store\Traits;

use Phynixmedia\Store\Core\StoreConstants;

trait ResponseTrait
{
    public function responseError(string $code, string $body, string $message)
    {
        $response = new \StdClass;

        $response->code = $code;
        $response->message = $message;

        if (StoreConstants::TEST_MODE) {
            $response->body = $body;
        }

        return json_encode($response);
    }


}