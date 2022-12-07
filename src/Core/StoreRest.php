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
            return $this->client->get(StoreConstants::getHost() . $path . self::pager($paginate));
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
    public function post(string $path, $params = [], int $paginate = 0): ?ResponseInterface
    {

        try
        {
            return $this->client->post(StoreConstants::getHost() . $path . '/router' .  self::pager($paginate),
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

    /**
     * @param string $path
     * @param array $params
     * @return ResponseInterface|null
     * @throws UnexpectedStatusCodeException
     */
    public function put(string $path, $params = [], int $paginate = 0): ?ResponseInterface
    {

        try
        {
            return $this->client->put(StoreConstants::getHost() . '/router' . $path . self::pager($paginate),
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

    private static function pager(int $paginate = 0){

        $pager = '';
        if($paginate > 0)
        {
            $pager = '?page='.$paginate;
        }
        return $pager;
    }
}
