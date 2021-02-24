<?php

namespace Phynixmedia\Store;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Exceptions\StoreUnableToConnectException;
use Phynixmedia\Store\Exceptions\UnexpectedStatusCodeException;
use Psr\Http\Message\ResponseInterface;

class StoreRest
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public static function setHeaders(){

        return [
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MmI1OGI4Zi00OTQzLTRhOWMtYmI0Yi1iYjRiNDFlYzZmYmQiLCJqdGkiOiJkYjljZDMzMGM5ZjgyYjA0NDg2MTFlNmJlYmZjMTNhMjFlMGFkMzYwNmNlYmE4MzFiNWVlOGIyOWYwMjZkNGMzOTJhNDI4ODQ2ODdjNTllMCIsImlhdCI6MTYxMzc2OTE3OCwibmJmIjoxNjEzNzY5MTc4LCJleHAiOjE2MTQyMDExNzgsInN1YiI6IiIsInNjb3BlcyI6W119.J5aIhXpR71v1EE1cRFuAizE7VZNbOpr_i7h8nbPA6k5G2hbju-BKatvFUX9bnoahl3W3VITHYrAXPSuZimrTTKWp0nx264jRWu24X0J37tQKotjLksBUpANKrfah8vEPdNyeq9Wt3CYN_5Ww4BkSfSGk0eSenis3VaoRUvm-8Crm9NITVXbrQy2PyLBbPmkNQK4h1CRNqwOvjXlRwynxPfkQg4BUXQjamhSepaNPb7Hk7h2CfJsaXVfHnJpG1pbvi6r4palfmKhU5v8tSXaIngdqSYvZO1exSqaSzLnDNToC6jcn1xKmFc01UZsZ2B5jmpTJpJixfwTLDVmg2-GA7Fdf_dwEdphl-pqlm85nCime0QTOlRSKV3hehKl5olMNe6eboOtpmLPfxO1DC_p7_wk1uwREqJdlQtsl8SEGTszdP9z_Y__B8nOxfYlgc8aIGD3Xl8y9PUzL1CBBQRnAgcIBHdHAF5BjbPKLzZW89E-KtlWZi6mWp2ReH9gMQt_ONnmVbJHS8ACN1fR_PpoIDtMOqBUOXgLNWv3bGsZMvvru4QW_bVvPKrHXCiJhUeEbR-vbSkos_5h2-Ss1gJtqLX7-0-ESjkx4BVpG7QRK2CMQXmvvHUzRDM2wGLFsyb8jyUaqy2CfMFd5z31Xf41l52Sj0y8hmAQebu80WiEdC1Y'
        ];
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
            return $this->client->get(StoreConstants::API_END_POINT . $path);
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
            // var_dump(StoreConstants::API_END_POINT .$path);
            return $this->client->post(StoreConstants::API_END_POINT . $path, 
            [
                "headers" => self::setHeaders(), 
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