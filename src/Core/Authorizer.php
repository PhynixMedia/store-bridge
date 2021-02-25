<?php

namespace Phynixmedia\Store\Core;

use Phynixmedia\Store\Responses\Parsers\ResponseParser;

class Authorizer
{
    protected $rest;

    private $tokenData;

    public function __construct(array $config){

        $this->rest = new StoreRest('');
        $this->requestAuth($config);
    }

    public function getToken()
    {
        return (object) $this->tokenData;
    }

    private function requestAuth(array $config): self
    {

         $this->tokenData = self::auth($params = [
            'client_id'         => $config['publish'] ?? '',
            'client_secret'     => $config['secret'] ?? '',
            'grant_type'        => 'client_credentials',
            'scope' => ''
        ]);

         return $this;
    }

    private function auth(array $params): object
    {
        try {

            $response = $this->rest->post(StoreConstants::API_OAUTH2_POINT, $params);
            return (new ResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            //      return (object) ['error' => $e->getMessage()];
            return (object)['error' => 'something happened'];
        }
    }
}
