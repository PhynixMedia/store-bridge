<?php

namespace Phynixmedia\Store\Core;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Phynixmedia\Store\Exceptions\StoreUnableToConnectException;
use Phynixmedia\Store\Exceptions\UnexpectedStatusCodeException;
use Psr\Http\Message\ResponseInterface;

class StoreRest
{

    protected $client;

    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
        $this->client = new Client();
    }

    public static function setHeaders(string $token = NULL): array
    {

        $header = [
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ];
        if($token){
            $header['Authorization'] =  'Bearer ' . $token;
        }

        return $header;
    }

    /**
     * @param string $path
     * @return ResponseInterface|null
     * @throws UnexpectedStatusCodeException
     */
    public function get(string $path): ?ResponseInterface
    {
        try
        {

            return $this->client->get(StoreConstants::API_BASE_URL . $path);
        }catch(\GuzzleHttp\Exception\ClientException $e)
        {
            throw new UnexpectedStatusCodeException($e->getResponse());
        }catch(\GuzzleHttp\Exception\ConnectException $e)
        {
            throw new StoreUnableToConnectException(new Response());
        }catch(\Exception $e){
            throw new UnexpectedStatusCodeException($e->getResponse());
        }
    }

    /**
     * @param string $path
     * @param array $params
     * @return ResponseInterface|null
     * @throws UnexpectedStatusCodeException
     */
    public function post(string $path, $params = []): ?ResponseInterface
    {

        try
        {

            return $this->client->post(StoreConstants::API_BASE_URL . $path,
            [
                "headers" => self::setHeaders($this->token),
                "body" => json_encode($params)
            ]);

        }catch(\GuzzleHttp\Exception\ClientException $e)
        {
            throw new StoreUnableToConnectException($e->getResponse());
        }catch(\GuzzleHttp\Exception\ConnectException $e)
        {
            throw new StoreUnableToConnectException(new Response());
        }catch(\Exception $e){
            throw new UnexpectedStatusCodeException($e->getResponse());
        }
    }
}
