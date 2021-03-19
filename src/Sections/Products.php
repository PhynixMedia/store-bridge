<?php

namespace Phynixmedia\Store\Sections;

use Phynixmedia\Store\Core\App;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\ProductResponseParser;


/**
 * Class Orders
 * @package Phynixmedia\Store
 */
class Products extends App
{

    /**
     * Products constructor.
     */
    public function __construct(string $authorizer)
    {
        parent::__construct( $authorizer);
    }

    public function all(array $params, int $pager = 0)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_ALL_PRODUCTS, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function get(array $params, int $pager = 0)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_SINGLE_PRODUCT, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function search(array $params, int $pager = 0)
    {
        try {
            $response = $this->rest->post(StoreConstants::SEARCH_PRODUCTS, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * This finds latest, sales, new arrival
     * based on which parameter was passed in
     * latest, sales, newarrival
     */
    public function find(array $params, int $pager = 0){
        try {
            $response = $this->rest->post(StoreConstants::FIND_PRODUCTS_BY_CONDITION, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * set views with viewer's ip if data is passed
     * else, returned products viewed previously by user
     */
    public function viewed(array $params, int $pager = 0){
        try {
            $response = $this->rest->post(StoreConstants::SEARCH_VIEWED_PRODUCTS, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * This fetch related records to the records selected
     * when user click to view product details
     */
    public function related(array $params, int $pager = 0){
        try {
            $response = $this->rest->post(StoreConstants::SEARCH_RELATED_PRODUCTS, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * This return all available product brands
     */
    public function brands(array $params, int $pager = 0){
        try {
            $response = $this->rest->post(StoreConstants::SEARCH_PRODUCTS_BRAND, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Call with Ajax, to serach for proucts based on the brand
     */
    public function searchByBrands(array $params, int $pager = 0){
        try {
            $response = $this->rest->post(StoreConstants::SEARCH_PRODUCTS_BY_BRAND, $params, $pager);
            return (new ProductResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
