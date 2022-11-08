<?php

namespace Phynixmedia\Store\Sections;

use Phynixmedia\Store\Core\App;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Requests\CustomerRequest;
use Phynixmedia\Store\Responses\Parsers\CustomerResponseParser;
use Phynixmedia\Store\Requests\Formatters\CustomerRequestFormatter;
use Phynixmedia\Store\Requests\CustomerContactRequest;

/**
 * Class Orders
 * @package Phynixmedia\Store
 */
class Customer extends App
{
    /**
     * Customer constructor.
     */
    public function __construct(string $authorizer)
    {
        parent::__construct( $authorizer);
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

    public function setAddress(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::CREATE_CUSTOMER_ADDRESS, $params);
            return (new CustomerResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function find(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::FIND_CUSTOMER, $params);
            return (new CustomerResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function voucher(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_USER_VOUCHER_HISTORY, $params);
            return (new CustomerResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
