<?php

namespace Phynixmedia\Store;

use Phynixmedia\Store\Core\Store;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Requests\CustomerRequest;
use Phynixmedia\Store\Responses\Parsers\CustomerResponseParser;
use Phynixmedia\Store\Requests\Formatters\CustomerRequestFormatter;
use Phynixmedia\Store\Requests\CustomerContactRequest;

/**
 * Class Orders
 * @package Phynixmedia\Store
 */
class Customer extends Store
{
    /**
     * Customer constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function create(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::CREATE_CUSTOMER, $params);
            return (new CustomerResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function saveAddress(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::CREATE_CUSTOMER_ADDRESS, $params);
            return (new CustomerResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function auth(array $params)
    {
        try {

            $response = $this->rest->post(StoreConstants::AUTH_USER_LOGIN, $params);
            return (new CustomerResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function reset(array $params)
    {
        try {
            $response = $this->rest->post($this->setPath(StoreConstants::RESET_CUSTOMER_PASSWORD, $params));
            return (new CustomerResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}